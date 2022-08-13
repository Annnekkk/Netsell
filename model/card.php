<?php
require_once('../data/config.php');

if (isset($_POST['loaithe']) && isset($_POST['menhgia']) && isset($_POST['seri']) && isset($_POST['pin']) && isset($my_username)){
    $type = check_string($_POST['loaithe']);
    $amount = check_string($_POST['menhgia']);
    $serial = check_string($_POST['seri']);
    $pin = check_string($_POST['pin']);
    $code = random('qwertyuiopasdfghjklzxcvbnm1234567890QWERTYUIOPASDFGHJKLZXCVBNM', 12);

    $thucnhan=$amount-$amount*$naptien['ck_nap']/100;
   
	
	 $check = $NTA->query("SELECT * FROM `cards` WHERE `pin` = '$pin' AND `seri` = '$serial'");
	 $check = mysqli_num_rows($check);
    if (empty($my_username)){
        die(out("error","Vui lòng đăng nhập để tiếp tục"));
    }
    
   
    
    
     if (strlen($serial) < 5 || strlen($pin) < 5)
     {
         
         die(out("error","Serial hoặc mã thẻ không đúng định dạng"));
     }elseif($check >= 1){
			die(out("error","thẻ đã tồn tại trên hệ thống"));
	 	}
     else
     {
        
        $dataPost = array();
        $dataPost['partner_id'] = $partner_id;
        $dataPost['request_id'] = $code;
        $dataPost['telco'] = $type;
        $dataPost['amount'] = $amount;
        $dataPost['serial'] = $serial;
        $dataPost['code'] = $pin;
        $dataPost['command'] = 'charging';
        $sign = creatSign($sign, $dataPost);
        $dataPost['sign'] = $sign;

        $dataPost = http_build_query($dataPost);



        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $nguon_nap);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataPost);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 300); //THÊM DÒNG NÀY SẼ TĂNG THỜI GIAN GỬI THẺ ĐƯỢC ỔN ĐỊNH
        $resultRaw = curl_exec($ch);
        curl_close($ch);
        $obj = json_decode($resultRaw);
        
        if($obj->status == 99){

            $err = $obj->message;
            
          $create = $NTA->insert("cards",[
              'code'=>$code,
              'seri'=>$serial,
              'pin'=>$pin,
              'loaithe'=>$type,
              'menhgia'=>$amount,
              'thucnhan'=>$thucnhan,
              'username'=>$user['username'],
              'status'=>'xuly',
              'note'=>'',
              'createdate'=>$NTA->alltime()
          ]);
                die(out("success","gửi thẻ thành công"));

    
        } else {

            $err = $obj->message;
           
                die(out("error","$err"));
        }        
        
     }

    
}else{
    die(out("error","Có Lỗi Xảy Ra khi gửi thẻ"));
}
