<?php
require_once("../../data/config.php");

if(isset($_POST['ulog']) && isset($_POST['plog']))
{
    $username = check_string($_POST['ulog']);
    $password = check_string($_POST['plog']);
    $password = md5($password);
    $query = $NTA->query("SELECT * FROM users WHERE username = '$username' ")->fetch_array();
    if ($username == "" || $password =="") 
    {
        die(out("error",$lang['msg6']));
    }
    else if(empty($query))
    {
        die(out("error",$lang['msg7']));
    }
    if($password != $query['password'])
    {
        die(out("error",$lang['msg8']));
    }
    else
    {
        $NTA->query("UPDATE `users` SET ip = '$ip_client' WHERE username = '$username' ");
        $_SESSION['username'] = $username;
        //GHI NHẬT KÝ HOẠT ĐỘNG
        $NTA->query("INSERT INTO `log` SET `content` = 'Thực hiện đăng nhập vào hệ thống ! ', `createdate` = now(), `username` = '$username' ");
        die(out("success","Đăng Nhập Thành Công"));
    }
}
