<!-- Modal starts here -->
<div id="editTel" role="dialog" class="modal fade">
  <div class="modal-dialog">
    
    <!-- Modal content-->
    <div class="modal-content">
        
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-edit"></span> Edit <u> <?php echo $user['umobile']; ?> </u> </h4>
        </div>

        <div class="modal-body">

          <form role="form" class="form-inline" method="post">
            <input type="text" name="uid" value="<?php echo $user['uid']; ?>" hidden>

            <div class="form-group">
                <label>Mobile Number: </label> <input type="tel" class="form-control" name="mobile" value="<?php echo $user['umobile']; ?>" placeholder="Mobile Number">
            </div>
            <br><br>
            <div class="form-group">
              <input type="submit" name="editmob" value="Edit Mobile Number Now" class="btn btn-info">
            </div>

          </form>
        </div>
    </div>
      
  </div>
</div>

<?php

extract($_POST);
if (isset($editmob)) {
   $run = mysqli_query($link, "UPDATE od_users SET umobile='$mobile' WHERE uid='$uid' ");
  if($run) {
    echo "<script>window.open('acc.php?profile&ch=Update Successfully','_self')</script> ";
  }
  else{
    echo "<script>window.open('acc.php?profile&ch=Somethig Going Wrong','_self')</script> ";
  }
}

?>