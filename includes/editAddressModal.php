<!-- Modal starts here -->
<div id="editAddress" role="dialog" class="modal fade">
  <div class="modal-dialog">
    
    <!-- Modal content-->
    <div class="modal-content">
        
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-edit"></span> Edit <u><?=$user['uaddress'] ?></u></h4>
        </div>

        <div class="modal-body">
          <form role="form" class="form-inline" method="post">
            <input type="text" name="uid" value="<?=$user['uid'] ?>" hidden>

            <div class="form-group">
                <label>Address: </label> <input type="text" class="form-control" name="address" value="<?=$user['uaddress'] ?>" placeholder="Street Address">
            </div>
            <br><br>
            <div class="form-group">
              <input type="submit" name="editad" value="Edit Address Now" class="btn btn-info">
            </div>

          </form>
        </div>
    </div>
      
  </div>
</div>

<?php

extract($_POST);
if (isset($editad)) {
  $run = mysqli_query($link, "UPDATE od_users SET uaddress='$address' WHERE uid='$uid' ");
  if($run) {
    echo "<script>window.open('acc.php?profile&ch=Update Successfully','_self')</script> ";
  }
  else{
    echo "<script>window.open('acc.php?profile&ch=Somethig Going Wrong','_self')</script> ";
  }
}

?>