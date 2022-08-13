<?php 
require_once('data/config.php');
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<?php
if(isset($_POST['submit'])){ 
  if (check_img('img') == true)
        {
  $tmp_name = $_FILES['img']['tmp_name'];
  
  $create = $NTA->upload_imgur($tmp_name);
  if ($create){
    print_r($create);
  }
}
  
 }

?>
<form action="" enctype="multipart/form-data" method="POST">
 Choose Image : <input name="img" size="35" type="file"/><br/>
 <input type="submit" name="submit" value="Upload"/>
</form>
</body>
</html>