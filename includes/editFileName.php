
 <div id="editTitle" class="cover">
   <div class="end">&times;</div>
   <div class="popup-content">
    <div class="title"> Edit Title </div>
      <form role="form" class="form-inline" method="post">
        <input type="text" name="fid" id="fid" value="" hidden>
        <div class="form-group">
          <label>File Name:</label> <input type="text" class="form-control" name="docname" >
        </div>
        <br><br>
        <div class="form-group">
          <input type="submit" name="fileName" value="Save" class="btn btn-info">
        </div>
      </form>
    </div>
 </div>

<?php
if (isset($_POST['fileName'])) {
  $docname = $_POST['docname'];
  $fid = $_POST['fid'];
  $query = mysqli_query($link, "UPDATE files SET title='$docname' WHERE fileid='$fid' " ); 
  if ($query) {
    echo "<script>window.open('acc.php?document&msg=File name has been Changed.','_self')</script>";
  }
  else{
    echo "<script>window.open('acc.php?docume&msg=Something went wrong with your internet connection.','_self')</script>";
  }

}

?>