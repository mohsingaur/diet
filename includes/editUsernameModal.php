<!-- Modal starts here -->
<div id="editUname" role="dialog" class="modal fade">
  <div class="modal-dialog">
    
    <!-- Modal content-->
    <div class="modal-content">
        
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-edit"></span> Edit <u> <?php echo $user['username']; ?> </u></h4>
        </div>

        <div class="modal-body">

          <form role="form" class="form-inline" method="post">
            <input type="text" name="uid" value="<?php echo $user['uid']; ?>" hidden>

            <div class="form-group">
                <input type="text" class="form-control" name="un" value="<?php echo $user['username']; ?>" placeholder="User Name">
            </div>
            <br><br>
            <div class="form-group">
              <input type="submit" name="edituname" value="Edit UserName Now" class="btn btn-info">
            </div>

          </form>
        </div>
    </div>
      
  </div>
</div>


<?php

extract($_POST);
if (isset($edituname)) {
  $run = mysqli_query($link, "UPDATE od_users SET username='$un' WHERE uid='$uid' ");
  if($run) {
    echo "<script>window.open('acc.php?profile&ch=Update Successfully','_self')</script> ";
  }
  else{
    echo "<script>window.open('acc.php?profile&ch=Somethig Going Wrong','_self')</script> ";
  }
}

?>