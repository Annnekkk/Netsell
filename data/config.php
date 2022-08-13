<?php
error_reporting(0);
date_default_timezone_set('Asia/Ho_Chi_Minh');
session_start();
define('SERVERNAME', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DATABASE', 'clone');

class NTA
{
    private $ketnoi;
    function connect()
    {
        if (!$this->ketnoi) {
            $this->ketnoi = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE) or die('ERROR CONNECT !');
            mysqli_query($this->ketnoi, "set names 'utf8'");
        }
    }
    function dis_connect()
    {
        if ($this->ketnoi) {
            mysqli_close($this->ketnoi);
        }
    }
    function query($sql)
    {
        $this->connect();
        $row = $this->ketnoi->query($sql);
        return $row;
    }
    function get_list($sql)
    {
        $this->connect();
        $result = mysqli_query($this->ketnoi, $sql);
        if (!$result) {
            die('Lỗi kết nối database ');
        }
        $return = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $return[] = $row;
        }
        mysqli_free_result($result);
        return $return;
    }
    function allsp($table, $where)
    {
        $this->connect();
        return mysqli_fetch_assoc($this->ketnoi->query("SELECT COUNT(*) FROM `" . $table . "` WHERE " . $where))['COUNT(*)'];
    }
    function getip()
    {
        $url = "https://ipinfo.io";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($ch);
        curl_close($ch);
        return json_decode($data,True);
    }
    function num_rows($sql)
    {
        $this->connect();
        $result = mysqli_query($this->ketnoi, $sql);
        if (!$result)
        {
            die ('Lỗi kết nối database 2');
        }
        $row = mysqli_num_rows($result);
        mysqli_free_result($result);
        if ($row)
        {
            return $row;
        }
        return false;
    }
    function delete($table, $where)
    {
        $this->connect();
        $sql = "DELETE FROM $table WHERE $where";
        return mysqli_query($this->ketnoi, $sql);
    }
    function insert($table, $data)
    {
        $this->connect();
        $field_list = '';
        $value_list = '';
        foreach ($data as $key => $value)
        {
            $field_list .= ",$key";
            $value_list .= ",'".mysqli_real_escape_string($this->ketnoi, $value)."'";
        }
        $sql = 'INSERT INTO '.$table. '('.trim($field_list, ',').') VALUES ('.trim($value_list, ',').')';
 
        return mysqli_query($this->ketnoi, $sql);
    }
    function update($table, $data, $where)
    {
        $this->connect();
        $sql = '';
        foreach ($data as $key => $value)
        {
            $sql .= "$key = '".mysqli_real_escape_string($this->ketnoi, $value)."',";
        }
        $sql = 'UPDATE '.$table. ' SET '.trim($sql, ',').' WHERE '.$where;
        return mysqli_query($this->ketnoi, $sql);
    }
    function get_row($sql)
    {
        $this->connect();
        $result = mysqli_query($this->ketnoi, $sql);
        if (!$result)
        {
            die ('Lỗi kết nối database 2');
        }
        $row = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        if ($row)
        {
            return $row;
        }
        return false;
    }
    function cong($table, $data, $sotien, $where)
    {
        $this->connect();
        $row = $this->ketnoi->query("UPDATE `$table` SET `$data` = `$data` + '$sotien' WHERE $where ");
        return $row;
    }
    function tru($table, $data, $sotien, $where)
    {
        $this->connect();
        $row = $this->ketnoi->query("UPDATE `$table` SET `$data` = `$data` - '$sotien' WHERE $where ");
        return $row;
    }
    public function rand($so){

    return substr(str_shuffle("QWERTYUIOPASDFGHJKLZXCVBNM0123456789"), 0, $so);
    }
    public function alltime(){
        return date("Y-m-d H:i:s");
    }
    public function upload_imgur($images)
    {
        $file     = file_get_contents($images);
        $dataPost = array(
            'image' => base64_encode($file)
        );
        $ch       = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.imgur.com/3/image.json');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_POST, 1);
        $header[] = 'Authorization: Client-ID ded0cb9504e4124';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataPost);
        $data = curl_exec($ch);
        curl_close($ch);
        $return = json_decode($data,True);
        return $return['data']['link'];
        
    }
}
$NTA = new NTA;

$_SESSION['session_request'] = time();
$lang = $NTA->query("SELECT * FROM lang")->fetch_array();
$nap = $NTA->query("SELECT * FROM nap_auto")->fetch_array();
$id_tsr = $nap['id_tsr'];
$key_tsr = $nap['key_tsr'];
$id_momo = $nap['id_momo'];
$key_momo = $nap['key_momo'];
$noidung = $nap['noidung'];

$site = $NTA->query("SELECT * FROM setting")->fetch_array();
$site_favicon = $site['site_favicon'];
$site_tenweb = $site['site_tenweb'];
$site_mota = $site['site_mota'];
$site_tukhoa = $site['site_tukhoa'];
$site_baotri = $site['site_baotri'];
$site_image = $site['site_image'];
$site_logo = $site['site_logo'];
$site_domain = $site['site_domain'];



if (isset($_SESSION['username'])) {
    $my_username = $_SESSION['username'];
    $user = $NTA->query("SELECT * FROM users WHERE username = '$my_username' ")->fetch_array();
    if (empty($user['id'])) {
        session_start();
        session_destroy();
        header('location: /');
    }
    if ($user['money'] < 0) {
        $NTA->query("UPDATE users SET banned = 1 WHERE username = '$my_username' ");
        session_start();
        session_destroy();
        header('location: /');
        die();
    }
}
$naptien = $NTA->get_row("SELECT * FROM `nap_auto` WHERE `id`=1");
$nguon_nap = $naptien['nguon_nap'];
$ck_card=$naptien['ck_nap'];
$partner_id = $naptien['id_nap'];
$sign = $naptien['key_nap'];


function creatSign($partner_key, $params)
{
    $data = array();
    $data['request_id'] = $params['request_id'];
    $data['code'] = $params['code'];
    $data['partner_id'] = $params['partner_id'];
    $data['serial'] = $params['serial'];
    $data['telco'] = $params['telco'];
    $data['command'] = $params['command'];
    ksort($data);
    $sign = $partner_key;
    foreach ($data as $item) {
        $sign .= $item;
    }


    return md5($sign);
}

$ip_addres = $NTA->getip();
$ip_client = $ip_addres['ip'];
function check_img($img)
{
    $filename = $_FILES[$img]['name'];
    $ext = explode(".", $filename);
    $ext = end($ext);
    $valid_ext = array("png", "jpeg", "jpg", "PNG", "JPEG", "JPG", "gif", "GIF");
    if (in_array($ext, $valid_ext)) {
        return true;
    }
}
function check_zip($img)
{
    $filename = $_FILES[$img]['name'];
    $ext = explode(".", $filename);
    $ext = end($ext);
    $valid_ext = array("zip", "ZIP");
    if (in_array($ext, $valid_ext)) {
        return true;
    }
}
function display_banned($data)
{
    if ($data == 1) {
        $show = '<span class="badge bg-danger">Banned</span>';
    } else if ($data == 0) {
        $show = '<span class="badge bg-success">Hoạt động</span>';
    }
    return $show;
}
function out($status, $msg)
{
    return json_encode(array("status" => $status, "msg" => $msg));
}
function display($data)
{
    if ($data == 'hide') {
        $show = '<span class="badge bg-danger">ẨN</span>';
    } else if ($data == 'show') {
        $show = '<span class="badge bg-success">HIỂN THỊ</span>';
    }
    return $show;
}

function TypeNick($data)
{
    $row = array(
        'clone',
        'via',
        'hotmail',
        'yahoo',
        'bm',
        'azure',
        'gmail',
        'aws',
        'zalo',
        'youtube',
        'traodoisub',
        'tuongtaccheo',
        'shopee',
        'yandex',
        'vps',
        'hosting',
        'tiki',
        'lazada',
        'rentcode',
        'textnow',
        'game',
        'garena',
        'riot'
    );

    return $row[$data];
}
function status($data)
{
    if ($data == 'xuly') {
        $show = '<span class="badge badge-info">Đang xử lý</span>';
    } else if ($data == 'hoantat') {
        $show = '<span class="badge badge-success">Hoàn tất</span>';
    } else if ($data == 'thatbai') {
        $show = '<span class="badge badge-danger">Thất bại</span>';
    } else {
        $show = '<span class="badge badge-warning">Khác</span>';
    }
    return $show;
}
function check_string($data)
{
    return str_replace(array('<', "'", '>', '?', '/', "\\", '--', 'eval(', '<php'), array('', '', '', '', '', '', '', '', ''), htmlspecialchars(addslashes(strip_tags($data))));
}
function XoaDauCach($text)
{
    return trim(preg_replace('/\s+/', ' ', $text));
}
function random($string, $int)
{
    return substr(str_shuffle($string), 0, $int);
}
function pheptru($int1, $int2)
{
    return $int1 - $int2;
}
function phepcong($int1, $int2)
{
    return $int1 + $int2;
}
function phepnhan($int1, $int2)
{
    return $int1 * $int2;
}
function phepchia($int1, $int2)
{
    return $int1 / $int2;
}
function show_type_value($value)
{
    if ($value == 'none') {
        $data = '';
    } else if ($value == 0) {
        $data = 'ID';
    } else if ($value == 1) {
        $data = 'PASS';
    } else if ($value == 2) {
        $data = '2FA';
    } else if ($value == 3) {
        $data = 'COOKIE';
    } else if ($value == 4) {
        $data = 'TOKEN';
    } else {
        $data = 'KHÁC';
    }
    return $data;
}
function format_cash($price)
{
    return str_replace(",", ".", number_format($price));
}
function curl_get($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $data = curl_exec($ch);

    curl_close($ch);
    return $data;
}
function getHeader()
{
    $headers = array();
    $copy_server = array(
        'CONTENT_TYPE'   => 'Content-Type',
        'CONTENT_LENGTH' => 'Content-Length',
        'CONTENT_MD5'    => 'Content-Md5',
    );
    foreach ($_SERVER as $key => $value) {
        if (substr($key, 0, 5) === 'HTTP_') {
            $key = substr($key, 5);
            if (!isset($copy_server[$key]) || !isset($_SERVER[$key])) {
                $key = str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', $key))));
                $headers[$key] = $value;
            }
        } elseif (isset($copy_server[$key])) {
            $headers[$copy_server[$key]] = $value;
        }
    }
    if (!isset($headers['Authorization'])) {
        if (isset($_SERVER['REDIRECT_HTTP_AUTHORIZATION'])) {
            $headers['Authorization'] = $_SERVER['REDIRECT_HTTP_AUTHORIZATION'];
        } elseif (isset($_SERVER['PHP_AUTH_USER'])) {
            $basic_pass = isset($_SERVER['PHP_AUTH_PW']) ? $_SERVER['PHP_AUTH_PW'] : '';
            $headers['Authorization'] = 'Basic ' . base64_encode($_SERVER['PHP_AUTH_USER'] . ':' . $basic_pass);
        } elseif (isset($_SERVER['PHP_AUTH_DIGEST'])) {
            $headers['Authorization'] = $_SERVER['PHP_AUTH_DIGEST'];
        }
    }
    return $headers;
}
$MEMO_PREFIX = $site['MEMO_PREFIX'];
function parse_order_id($des)
{
    global $MEMO_PREFIX;
    $re = '/' . $MEMO_PREFIX . '\d+/im';
    preg_match_all($re, $des, $matches, PREG_SET_ORDER, 0);
    if (count($matches) == 0)
        return null;
    // Print the entire match result
    $orderCode = $matches[0][0];
    $prefixLength = strlen($MEMO_PREFIX);
    $orderId = intval(substr($orderCode, $prefixLength));
    return $orderId;
}
function check_username($data)
{
    if (preg_match('/^[a-zA-Z0-9_-]{3,16}$/', $data, $matches)) {
        return True;
    } else {
        return False;
    }
}
function check_email($data)
{
    if (preg_match('/^.+@.+$/', $data, $matches)) {
        return True;
    } else {
        return False;
    }
}
function check_phone($data)
{
    if (preg_match('/^\+?(\d.*){3,}$/', $data, $matches)) {
        return True;
    } else {
        return False;
    }
}

/*MÃ NGUỒN ĐƯỢC PHÁT TRIỂN BỞI Phạm tài Nhân - LH ZALO 0325614226*/
