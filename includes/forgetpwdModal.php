<div id="forgot" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content col-md-6 col-md-offset-3">

			<div class="modal-header"> <!-- Modal Header Starts -->
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<i class="fa fa-lock"></i> <b>Forget Password</b>

			</div> <!-- Modal header ends -->

			<div class="modal-body" style="margin: 10px;"> <!-- Modal body starts -->
				<div class="row">
					<div class="col-md-12">

						<div id="error"></div>

						<div class="form-horizontal" role="form">
					
							<div class="form-group">
    							<label class="sr-only" for="name"></label>
    							<div class="input-group">
      								<div class="input-group-addon"><i class="fa fa-user"></i></div>
      								<input type="text" class="form-control" id="uname" name="uname" placeholder="User Name" required>
                				</div>
            				</div>

            				<div class="form-group">
    							<label class="sr-only" for="mail"></label>
    							<div class="input-group">
      								<div class="input-group-addon"><i class="fa fa-envelope-o"></i></div>
      								<input type="text" class="form-control" id="mail" name="email" placeholder="Enter email" required>
                				</div>
            				</div>

            				<button type="button" class="btn btn-success col-md-offset-5" onclick="forgetPwd()">Forget Password</button>
						</div>

						<div id="res" style="margin-top: 10px;"></div>
					</div>
				</div>
				
			</div>  <!-- Modal body ends -->

		</div>
	</div>
	
</div>