<?php
require_once("../data/config.php");

$APIKey = $naptien['token_momo'];
$phone = $naptien['sdt_momo'];

$object = json_decode(file_get_contents("php://input"));
 
if (!empty($object)) {
    $signature = hash("sha256", $phone.$APIKey);
    
    if ($signature == $object->signature) {
    	$transactionId = $object->transactionId; #mã giao dịch momo
        $amount = $object->amount;               #số tiền bạn nhận được
        $sender = $object->sender;               #tên người gửi
        $senderId = $object->senderId;           #Id người gửi
        $content = $object->content;             #nội dung
        // check nếu nội dung chuyển tiền là true (hợp lệ)
        if (strpos($content, $naptien['noidung']) !== false) {
            // tách chuỗi lấy id người dùng
            $id = explode(" ", $content)[1];
            // lấy user người dùng
            $check_user = $NTA->get_row("SELECT * FROM `users` WHERE `id` = {$id}");
            $name = $check_user['username'];
            $money =$check_user['money'];
            $total_money = $check_user['total_nap'];
            
            // up lịch sử momo
            $NTA->insert("banks",[
                'ngan_hang'=>'momo',
                'ma_gd'=>$transactionId,
                'ten_nguoi_gui'=>$sender,
                'noidung_ck'=>$content,
                'thucnhan'=>$amount,
                'time'=>$NTA->alltime(),
                'username'=>$name,
                'status'=>'thanhcong'
            ]);
            // up lpog      
            $cash = format_cash($amount);
            $NTA->insert("log",[
                'content'=>"+ $cash - Lí do : Nạp MOMO Auto #$transactionId",
                'createdate'=>$NTA->alltime(),
                'username'=>$name
            ]);
            // cộng tiền user
            $NTA->update("users",[
                'money'=>$money + $amount,
                'total_nap'=>$total_money + $amount
            ],"`username` = '$name'");
            $return['msg'] = "Nạp tiền thành công!";
            $return['type'] = "success";
        }
    } else {
        $return['msg'] = "Sai chữ ký";
        $return['type'] = "error";
    }
} else {
    $return['msg'] = "Thiếu thông tin gửi lên";
    $return['type'] = "error";
}

echo json_encode($return);


?>