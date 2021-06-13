<!-- Modal starts here -->
<div id="editPic" role="dialog" class="modal fade">
  <div class="modal-dialog">
    
    <!-- Modal content-->
    <div class="modal-content">
        
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="fa fa-edit"></span> Edit <u> <?php echo $user['udp']; ?> </u></h4>
        </div>

        <div class="modal-body">

          <form role="form" class="form-inline" method="post" enctype="multipart/form-data">
            <input type="text" name="uid" value="<?php echo $user['uid']; ?>" hidden>

            <div class="form-group">
                <label>Image:</label> <input type="file" class="form-control" name="img" >
            </div>
            <br><br>
            <div class="form-group">
              <input type="submit" name="change" value="Upload Now" class="btn btn-info">
            </div>

          </form>
        </div>
    </div>
      
  </div>
</div>

<?php

if (isset($_POST['change'])) {
  echo $img_tmpname = $_FILES['img']['name'];
  $img_size = $_FILES['img']['size'];
  $img_tmp = $_FILES['img']['tmp_name'];
  $img_type = $_FILES['img']['type'];
  $id = $_POST['uid'];

  if ($img_tmpname==" ") {
    echo "<script>window.open('acc.php?profile&ch=Select image first.','_self')</script>";
    exit();
  }
  else{
    echo $img_name = rand().$img_tmpname;
    move_uploaded_file($img_tmp, "images/$img_name");
    $query = mysqli_query($link, "UPDATE od_users SET udp='$img_name', upicsize='$img_size', upictype='$img_type' WHERE uid='$id' " ); 
    if ($query) {
      echo "<script>window.open('acc.php?profile&ch=Profile Picture has been Changed.','_self')</script>";
    }
    else{
      echo "<script>window.open('acc.php?profile&ch=Something went wrong with your internet connection.','_self')</script>";
    }
  }
}

?>