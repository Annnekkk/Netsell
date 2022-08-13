<?php include('head.php');?>
<?php include('nav.php');?>

<?php
if (isset($_GET['delete'])) 
{
    $delete = $_GET['delete'];

    
    $create = $NTA->delete("chuyenmuc_clone","`id` = $delete");

    if ($create)
    {
      echo '<script type="text/javascript">swal.fire("Thành Công","Xóa thành công","success");setTimeout(function(){ location.href = "loai_chuyen_muc.php" },500);</script>'; 
    }
    else
    {
      echo '<script type="text/javascript">swal.fire("Lỗi","Lỗi máy chủ","error");setTimeout(function(){ location.href = "loai_chuyen_muc.php" },1000);</script>'; 
    }
}
?>

<?php
if (isset($_POST["submit"]))
{
    if($NTA->num_rows("SELECT * FROM `chuyenmuc_clone` WHERE `code` = '".$_POST['code']."'")>0){
        die('<script type="text/javascript">swal.fire("Thất Bại","Chuyên mục này đã tồn tại trên hệ thống","error");
        setTimeout(function(){ location.href = "" },1000);</script>');
    }
$create = $NTA->insert("chuyenmuc_clone",[
    'code'=>$_POST['code'],
    'name'=>$_POST['name'],
    'display'=>$_POST['display'],
    'createdate'=>$NTA->alltime()
]);
 

  if($create)
  {
    echo '<script type="text/javascript">swal.fire("Thành Công","Thêm Thành Công","success");
            setTimeout(function(){ location.href = "" },1000);</script>';
  }
  else
  {
    echo '<script type="text/javascript">swal.fire("Lỗi","Lỗi máy chủ","error");</script>'; 
  }
}

?>


<div class="row mb-2">
    <div class="col-sm-6">
    </div><!-- /.col -->
</div><!-- /.row -->

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">NHÓM TÀI KHOẢN</h3>
                <div class="text-right">
                    <a type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default"
                        class="btn btn-info">TẠO CHUYÊN MỤC</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px">ID</th>
                                <th>CODE</th>
                                <th>TÊN LOẠI</th>
                                 <th>DISPLAY</th>
                                 <th>THỜI GIAN TẠO</th>
                                <th>THAO TÁC</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

    $result = $NTA->get_list("SELECT * FROM `chuyenmuc_clone` ORDER BY id desc ");
    if ($result){
        foreach ($result as $row){

   
?>
                            <tr>
                                <td><?=$row['id'];?></td>
                                <td><?=$row['code'];?></td>
                                <td><?=$row['name'];?></td>
                                    <td><?php
                          if ($row['display'] == 'hide')
                          {
                            echo '<span class="badge bg-danger">ẨN</span>';
                          }
                          if ($row['display'] == 'show')
                          {
                            echo '<span class="badge bg-success">HIỂN THỊ</span>';
                          }
                        ?>
                                </td>
                                <td><span class="badge bg-dark"><?=$row['createdate']?></span></td>
                                <td>
                                    <a href="edit_loai_chuyen_muc.php?id=<?=$row['id'];?>" class="btn btn-default">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <a href="loai_chuyen_muc.php?delete=<?=$row['id'];?>" class="btn btn-default">
                                        <i class="fas fa-trash"></i> Delete
                                    </a>
                                </td>
                            </tr>
                            <?php }}?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
                VUI LÒNG THAO TÁC CẨN THẬN
            </div>
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row (main row) -->

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">TẠO CHUYÊN MỤC</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" action="" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">TÊN CHUYÊN MỤC :</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">CODE LOẠI SẢN PHẨM:</label>
                        <input type="text" class="form-control" name="code">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Display</label>
                        <select class="custom-select" name="display">
                            <option value="show">show</option>
                            <option value="hide">hide</option>
                        </select>
                    </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">ĐÓNG</button>
                <button type="submit" name="submit" class="btn btn-primary">TẠO NGAY</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php include('foot.php');?>