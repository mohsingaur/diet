<!-- Modal starts here -->
<div id="editModal" role="dialog" class="modal fade">
  <div class="modal-dialog">
    
    <!-- Modal content-->
    <div class="modal-content">
        
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-edit"></span> Edit <?=$user['ufname']." ".$user['umname']." ".$user['lname'] ?></h4>
        </div>

        <div class="modal-body">
          <form role="form" class="form-inline">
            <input type="text" name="id" value="<?=$user['uid'] ?>" hidden>

            <div class="form-group">
                <input type="text" name="fname" value="<?=$user['ufname'] ?>" placeholder="First Name">
                <input type="text" name="fname" value="<?$user['umname'] ?>" placeholder="Middle Name">
                <input type="text" name="fname" value="<?$user['ulname'] ?>" placeholder="Last Name">
            </div>
            <br><br>
            <div class="form-group">
              <input type="submit" name="edit" value="Edit Name Now" class="btn btn-info">
            </div>

          </form>
        </div>
    </div>
      
  </div>
</div>