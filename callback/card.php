<?php

require_once('../data/config.php');

if(isset($_GET['status'])) {
	$code = $_GET['code'];
	$serial = $_GET['serial'];
	$thucnhan = $_GET['amount'];
	$tranid = $_GET['request_id'];
	

	$callback_sign = md5($sign.$_GET['code'].$_GET['serial']);
	if($_GET['callback_sign'] == $callback_sign) { 

		if ($_GET['status'] == 1) {
		    
		    $row = $NTA->get_row("SELECT * FROM `cards` WHERE `code` = '".$tranid."' AND `seri`='".$serial."' ORDER BY username desc "); 
		    
		    $user = $row['username'];

				// status = 1 ==> thẻ đúng + Cộng tiền cho khách bằng  $_GET['amount'] tại đây
        // up thẻ thành công
        $NTA->update("cards",[
            'status'=>'thanhcong'
        ],"`status`='xuly' AND 'seri' = '$serial'");
        //cộng tiền cho khách
        $NTA->update("users",[
            'money'=>$thucnhan,
            'total_nap'=>$thucnhan
        ],"`username`='$user'");
        // log thẻ
        $NTA->insert("log",[
            'content'=>'Nạp Card Thành Công, Thực Nhận '.$thucnhan,
            'createdate'=>$NTA->alltime(),
            'username'=>$user
        ]);
        
		} else {

			//test call back
			// $thucnhan = $thucnhan + 1000000;
			// mysqli_query($connect, "UPDATE `user` SET `tien` = tien + $thucnhan WHERE id = '$tranid'");

         $NTA->update("card",[
             'status'=>'thatbai'
         ],"`status` = 'xuly' AND `seri` = '$serial'");
		}


	}

}
