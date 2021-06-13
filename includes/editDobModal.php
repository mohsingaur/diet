<!-- Modal starts here -->
<div id="editDob" role="dialog" class="modal fade">
  <div class="modal-dialog">
    
    <!-- Modal content-->
    <div class="modal-content">
        
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="fa fa-edit"></span> Edit Address <u><?php echo $user['udob']; ?> </u></h4>
        </div>

        <div class="modal-body">

          <form role="form" class="form-inline" method="post">

            <input type="text" name="uid" value="<?=$user['uid']; ?>" hidden>

            <div class="form-group">
                <label for="dob">Date of Birth: </label>
                <input type="date" id="dob" name="dob" class="form-control">
            </div>
            <br><br>
            <div class="form-group">
              <input type="submit" name="editdob" value="Edit DOB Now" class="btn btn-info">
            </div>

          </form>
        </div>
    </div>
      
  </div>
</div>


<?php

extract($_POST);
if (isset($editdob)) {
  $run = mysqli_query($link, "UPDATE od_users SET udob='$dob' WHERE uid='$uid' ");
  if($run) {
    echo "<script>window.open('acc.php?profile&ch=Update Successfully','_self')</script> ";
  }
  else{
    echo "<script>window.open('acc.php?profile&ch=Somethig Going Wrong','_self')</script> ";
  }
}

?>