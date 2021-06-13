<div id="login" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-header"> <!-- Modal Header Starts -->
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<i class="fa fa-lock"></i> <b>Login Now</b>

			</div> <!-- Modal header ends -->

			<div class="modal-body" style="margin: 10px;"> <!-- Modal body starts -->
				<div class="row">
					<div class="col-md-6">

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
    							<label class="sr-only" for="pwd"></label>
    							<div class="input-group">
      								<div class="input-group-addon"><i class="fa fa-lock"></i></div>
      								<input type="password" class="form-control" id="pwd" name="pwd" placeholder="Password" required>
                				</div>
            				</div>

            				<button type="button" class="btn btn-success col-md-offset-5" onclick="loginNow()">Login</button>
						</div>

						<div id="res" style="margin-top: 10px;"></div>
					</div>

					<div class="col-md-6">
						<button class="btn btn-warning">Login with Google</button>
						<div style="margin: 10px;"></div>
						<button class="btn btn-primary">Login with facebook</button>
					</div>
				</div>
				
			</div>  <!-- Modal body ends -->

			<div class="modal-footer"> <!-- Modal footer starts -->
				<a href="#" data-toggle='modal' data-dismiss="modal" data-target='#forgot'>Forgot Password</a><br>
				<a href="#" data-toggle='modal' data-dismiss="modal" data-target='#signup'>Sign Up</a>
			</div> <!-- Modal footer ends -->

		</div>
	</div>
	
</div>