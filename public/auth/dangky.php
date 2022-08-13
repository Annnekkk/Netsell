<?php
require_once("../../data/config.php");
if(isset($_POST['ureg']) && isset($_POST['ereg']) && isset($_POST['preg']))
{
    $username = check_string($_POST['ureg']);
    $email = check_string($_POST['ereg']);
    $password = check_string($_POST['preg']);
    $password = md5($password);

    $query_username = $NTA->query("SELECT * FROM users WHERE username = '$username' ");
    $query_email = $NTA->query("SELECT * FROM users WHERE email = '$email' ");
    $query_ip = $NTA->query("SELECT * FROM users WHERE ip = '$ip_address' ");
    $code = random('QWERTYUIOPASDFGHJKLZXCVBNM','12');
    if(check_username($username) == False)
    {
        $return['status'] = "error";
        $return['msg']   = "Username không hợp lệ!";
        die(json_encode($return));
    }
    if(check_email($email) == False)
    {
        
        $return['status'] = "error";
        $return['msg']   = "Vui lòng nhập email hợp lệ!";
        die(json_encode($return));
    }
    if ($username == "" || $email == "" || $password =="") 
    {
        $return['status'] = "error";
        $return['msg']   = "Vui lòng nhập đủ thông tin!";
        die(json_encode($return));
    }
    else if($query_username->num_rows != 0)
    {
        $return['status'] = "error";
        $return['msg']   = "Tài Khoản đã tồn tại trên hệ thống!";
        die(json_encode($return));
    }
    else if($query_email->num_rows != 0)
    {
        $return['status'] = "error";
        $return['msg']   = "email đã tồn tại trên hệ thông!";
        die(json_encode($return));
    }
    else if($query_ip->num_rows > 5)
    {
        $return['status'] = "error";
        $return['msg']   = "Mỗi IP chỉ được tạo tối đa 5 tài khoản!";
        die(json_encode($return));
    }
    else
    {
        $create=$NTA->insert("users",[
        'password' => $password,
        'username' => $username,
        'email' => $email,
        'code' => $code,
        'money' => 0,
        'ip' => $ip_address,
        'createdate'=>$NTA->alltime()
        ]);
        if ($create)
        {
            $_SESSION['username'] = $username;
            $return['status'] = "success";
            $return['msg']   = "Tạo Tài Khoản Thành công!";
            die(json_encode($return));
        }
    }
}else{
    $return['status'] = "error";
    $return['msg']   = "vui lòng điền đầy đủ thông tin!";
    die(json_encode($return));
}
