<!-- ############################### Comment Modal starts here ################################################# -->
<div id="comment" role="dialog" class="modal fade col-md-offset-2">
  <div class="modal-dialog txt-cnt">
    <!-- Modal content-->
    <div class="col-md-7">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-comment"></span> Write your Comment Here</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">

    <form class="form-horizontal" method="post">
        <div class="form-group sr-only">
          <label class="sr-only" for="uid"></label>
          <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-user"></i></div>
            <input type="text" class="form-control" id="comuid" name="uid" placeholder="User Id" value="<?=$_SESSION['uid']?>" required>
          </div>
        </div>
            
        <div class="form-group sr-only">
          <label class="sr-only" for="fid"></label>
          <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-lock"></i></div>
            <input type="text" class="form-control" id="comfid" name="fid" placeholder="file id" required>
          </div>
        </div>

        <div class="form-group">
          <label class="sr-only" for="txt"></label>
          <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-comment-o"></i></div>
            <textarea class="form-control" id="comtxt" name="txt" placeholder="Text goes here" required></textarea>
          </div>
        </div>

        <div id="com-res"></div>
            
        <button type="button" class="btn btn-primary" onclick="commentNow()" name="login">Post</button>
    </form>

        </div>
       </div>
      </div>
</div>
</div>
