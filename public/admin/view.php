<?php require_once('../config.php'); ?>

<div class="row mb-2">
    <div class="col-sm-6">

    </div><!-- /.col -->
</div><!-- /.row -->


            <!-- /.card-header -->
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                              
                                <th>Loại</th>
                                  <th>||</th>
                                <th>note</th>
                                
                            </tr>
                        </thead>
                        <tbody>

                            <?php

  $result = mysqli_query($ketnoi,"SELECT * FROM `taikhoan` WHERE `username` IS NULL");

?>
                            <?php
while($row = mysqli_fetch_assoc($result))
{
?>

                            <tr>
                                <td><?=$row['code'];?></td>
                                <td>||</td>
                                <td><?=$row['note'];?></td>
                               
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.card-body -->
 



