<?php 
require_once("../data/config.php");
if( isset($_POST['code']) && isset($_POST['loai']) && isset($_POST['soluong']) && isset($my_username) )
{
    $soluong = check_string($_POST['soluong']);
    $code = check_string($_POST['code']);
    $loai = check_string($_POST['loai']);
    if (!isset($my_username))
	{
        die(out("error",$lang['14']));
    }
    if ($soluong <= 0) 
	{
		die(out("error",$lang['15']));
    }
    if ($soluong > 10000) 
	{
		die(out("error",$lang['16']));
    }
    $query_taikhoan = $NTA->query("SELECT * FROM taikhoan WHERE `code` = '$code' AND `status` = 'live' AND `ID_BUY` is null ");
    $query_category = $NTA->query("SELECT * FROM category WHERE code = '$code' AND display = 'show' ");
    if ($NTA->num_rows("SELECT * FROM category WHERE code = '$code' AND display = 'show' ") <= 0)
	{
		die(out("error",$lang['17']));
    }
	if ($NTA->num_rows("SELECT * FROM category WHERE code = '$code' AND display = 'show' ") < $soluong)
	{
		die(out("error",$lang['18']));
    }
    $category_array = $query_category->fetch_array();
    $total_money = $category_array['money'] * $soluong;
    if ($user['level'] == "ctv"){
         $total_money = $total_money - $total_money * $site['ck_ctv'] / 100;
    }elseif($user['level'] == "daily"){
        $total_money = $total_money - $total_money * $site['ck_daily'] / 100;
    }else{
        $total_money = $total_money;
    }
   
    if ($user['money'] < $total_money)
	{
		die(out("error",$lang['19']));
    }
    else
    {
        if($category_array['pin'] == 'facebook' || $category_array['pin'] == 'clone' || $category_array['pin'] == 'via' )
        {
            $i = 0;
            while ($row = $query_taikhoan->fetch_assoc()) 
            {
                if($i < $soluong)
                {
                    $json = json_decode(curl_get("https://graph.facebook.com/".$row['id_fb']."/picture?redirect=false"), true);
                    if(empty($json['data']['height']) || empty($json['data']['width']))
                    {
                        $NTA->update("taikhoan",[
                            'status'=>'die'
                        ],"`username` IS NULL AND `id` = '".$row['id']."' AND `code` = '".$row['code']."' ");

                        $NTA->insert("log_die",[
                            'uid'=>$row['id_fb'],
                            'loai'=>$category_array['title'],
                            'createdate'=>$NTA->alltime()
                        ]);
                    }
                    else
                    {
                        $i++;
                    }
                }
            }
        }
        else
        {
            $i = $soluong;
        }
        if($i >= $soluong)
        {
            if ($user['money'] < 0)
            {
                $NTA->update("users","`banned` = 1 ","`username` = '".$user['username']."'");
                session_start();
                session_destroy();
                header('location: /');
                die(out("error","Phát hiện bất thường, tài khoản của bạn đã bị khóa"));
            }
            $ID_BUY = random('QWERTYUIOPASDFGHJKLZXCVBNM0123456789', 12);
            $NTA->tru("users","money",$total_money,"`username` =  '".$user['username']."'");// Trừ Tiền User

            $NTA->update("taikhoan",[
                'username'=>$user['username'],
                'ID_BUY'=>$ID_BUY,
                'createdate'=>$NTA->alltime()
            ],"`username` IS NULL AND `code` = '".$code."' AND `status` = 'live' LIMIT ".$soluong.""); // up chủ clone


           

            $NTA->insert("orders",[
                'username'=>$user['username'],
                'title'=>$category_array['title'],
                'soluong'=>$soluong,
                'type'=>$category_array['pin'],
                'money'=>$total_money,
                'ID_BUY'=>$ID_BUY,
                'createdate'=>$NTA->alltime()
            ]); // tạo đơn hàng

        
            $NTA->insert("log",[
                'content'=>"Mua $soluong tài khoản ".$category_array['title']." với giá ".format_cash($total_money)."đ. ",
                'createdate'=>$NTA->alltime(),
                'username'=>$user['username']
            ]); // uplog


            $content = 'Vừa mua '.$soluong.' tài khoản '.$category_array['title'].' với giá '.format_cash($total_money).'đ';
            $username = substr($user['username'], 0, 3).'*****';
            $NTA->insert("ls_mua",[
                'username'=>$username,
                'content'=>$content,
                'createdate'=>$NTA->alltime()
            ]);
           
            
            #SYSTEM CỘNG TÁC VIÊN
            // if($site['ck_ref'] > 0)
            // {
            //     if(isset($user['ref']))
            //     {
            //         $money_ref = $total_money * $site['ck_ref'] / 100;
            //         $ketnoi->query("UPDATE `users` SET 
            //         `money` =  `money` + '".$money_ref."'
            //         WHERE `username` =  '".$user['ref']."' ");
            //         $ketnoi->query("INSERT INTO `log` SET 
            //         `content`= 'Cộng ".format_cash($money_ref)."đ hoa hồng từ khách hàng ".$user['username']." ',
            //         `createdate` = now(),
            //         `username`= '".$user['ref']."' ");
            //     }
            // }

            $return['status'] = "success";
            $return['msg'] = "Thanh toán thành công $soluong ".$category_array['title']." với giá $total_money đ"; 
            $return['id']=$ID_BUY;
            die(json_encode($return));
        }
        else
        {
            die(out("error",$lang['20']));
        }
    }
}
?>



