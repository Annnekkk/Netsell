
<?php include('head.php');?>
<?php include('nav.php');?>

        <div class="row mb-2">
          <div class="col-sm-6">
          
          </div><!-- /.col -->
        </div><!-- /.row -->
<?php
if (isset($_GET['id'])) 
{
    $id = $_GET['id'];
}

$AADDCC = $NTA->get_list("SELECT * FROM `category` WHERE `id` = '".$id."' ");
if ($AADDCC){
foreach ($AADDCC as $row){


?>
<?php
if (isset($_POST["submit"]))
{
  $create = $NTA->update("category",[
    'title'=>$_POST['title'],
    'note'=>$_POST['note'],
    'badge'=>$_POST['badge'],
    'money'=>$_POST['money'],
    'pin'=>$_POST['pin'],
    'display'=>$_POST['display'],
    'code'=>$_POST['code']
    
  ],"`id` = $id");
  if($create)
  {
    echo '<script type="text/javascript">swal.fire("Thành Công","Save Thành Công","success");
            setTimeout(function(){ location.href = "chuyen-muc.php" },1000);</script>';
  }
  else
  {
    echo '<script type="text/javascript">swal.fire("Lỗi","Lỗi máy chủ","error");</script>'; 
  }
}

?>

<?php $check_taikhoanconlai = $NTA->allsp("taikhoan","`code` = '".$row['code']."' AND `username` IS NULL "); ?>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">EDIT CHUYÊN MỤC</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
               <form role="form" action="" method="POST">
                  <div class="form-group">
                    <label for="exampleInputEmail1">TÊN CHUYÊN MỤC:</label>
                    <input type="text" class="form-control" name="title"  value="<?=$row['title'];?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">MÃ CHUYÊN MỤC (Đang có <?=format_cash($check_taikhoanconlai);?> tài khoản chưa bán)</label>
                    <input type="text" class="form-control" name="code" value="<?=$row['code'];?>">
                  </div>
                  <div class="form-group">
                        <label for="exampleInputEmail1">LOẠI TÀI KHOẢN</label>
                        <select class="custom-select" name="pin">
                        <?php $hientai = $NTA->get_row("SELECT * FROM `chuyenmuc_clone` WHERE `code` = '".$row['pin']."'");?>
                        <option value="<?=$row['pin'];?>"><?=$hientai['name']?></option>
                            <?php $loai = $NTA->get_list("SELECT * FROM `chuyenmuc_clone`");
                            if ($loai){
                                foreach ($loai as $rowloai){
                            ?>
                            <option value="<?=$rowloai['code']?>"><?=$rowloai['name']?></option>
                            <?php }}?>
                        </select>
                    </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">HUY HIỆU</label>
                    <input type="text" class="form-control" name="badge" value="<?=$row['badge'];?>" placeholder="Nhập Badge nếu có, ví dụ, Sale" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Display</label>
                    <select class="custom-select" name="display">
                       <option value="<?=$row['display'];?>"><?=$row['display'];?></option> 
                          <option value="show">show</option>
                          <option value="hide">hide</option>
                        </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Giá:</label>
                    <input type="number" class="form-control" name="money"  value="<?=$row['money'];?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">NOTE:</label>
                    <textarea class="textarea" name="note" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?=$row['note'];?></textarea>
                  </div>

                  <button type="submit" name="submit" class="btn btn-primary">Lưu</button>
              </form>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <a href="chuyen-muc.php" class="btn btn-info">Về Danh Sách Chuyên Mục</a>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row (main row) -->
<?php }}?>        
<?php include('foot.php');?>