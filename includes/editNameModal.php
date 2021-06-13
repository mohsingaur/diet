<!-- Modal starts here -->
<div id="editName" role="dialog" class="modal fade">
  <div class="modal-dialog">
    
    <!-- Modal content-->
    <div class="modal-content">
        
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-edit"></span> Edit <u> <?= $user['ufname']." ".$user['umname']." ".$user['ulname']; ?> </u> </h4>
        </div>

        <div class="modal-body">

          <form role="form" class="form-inline" method="post">
            <input type="text" name="uid" value="<?php echo $user['uid'] ?>" hidden>

            <div class="form-group">
                <input type="text" class="form-control" name="fn" value="<?=$user['ufname'] ?>" placeholder="First Name" size="12">
                <input type="text" class="form-control" name="mn" value="<?=$user['umname'] ?>" placeholder="Middle Name">
                <input type="text" class="form-control" name="ln" value="<?=$user['ulname'] ?>" placeholder="Last Name">
            </div>
            <br><br>
            <div class="form-group">
              <input type="submit" name="editname" value="Edit Name Now" class="btn btn-info">
            </div>

          </form>
        </div>
    </div>
      
  </div>
</div>

<?php

extract($_POST);
if (isset($editname)) {
  $run = mysqli_query($link, "UPDATE od_users SET ufname='$fn', umname = '$mn', ulname = '$ln'  WHERE uid='$uid' ");
  if($run) {
    echo "<script>window.open('acc.php?profile&ch=Update Successfully','_self')</script> ";
  }
  else{
    echo "<script>window.open('acc.php?profile&ch=Somethig Going Wrong','_self')</script> ";
  }
}

?>