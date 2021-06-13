<div id="signup" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-header"> <!-- Modal Header Starts -->
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<i class="fa fa-lock"></i> <b>Signin Now</b>

			</div> <!-- Modal header ends -->

			<div class="modal-body" style="margin: 10px;"> <!-- Modal body starts -->
				<div class="row">
					<div class="col-md-6">

						<div id="sign-err"></div>

						<div> 

						<form class="form-horizontal" role="form">
					
							<div class="form-group">
    							<label class="sr-only" for="un"></label>
    							<div class="input-group">
      								<div class="input-group-addon"><i class="fa fa-user"></i></div>
      								<input type="text" class="form-control" id="un" name="un" placeholder="User Name" onchange="checkUser(this.value)" required>
                				</div>
            				</div>

            				<div class="form-group">
    							<label class="sr-only" for="mail"></label>
    							<div class="input-group">
      								<div class="input-group-addon"><i class="fa fa-envelope-o"></i></div>
      								<input type="email" class="form-control" id="mail" name="email" placeholder="Email" required>
                				</div>
            				</div>

            				<div class="form-group">
    							<label class="sr-only" for="pass"></label>
    							<div class="input-group">
      								<div class="input-group-addon"><i class="fa fa-lock"></i></div>
      								<input type="password" class="form-control" id="pass" name="pass" placeholder="Password" required>
                				</div>
            				</div>

            				<div class="form-group">
    							<label class="sr-only" for="passs"></label>
    							<div class="input-group">
      								<div class="input-group-addon"><i class="fa fa-lock"></i></div>
      								<input type="password" class="form-control" id="passs" name="pass1" placeholder="Confirm Password" required>
                				</div>
            				</div>

            				<button type="button" class="btn btn-success col-md-offset-5" onclick="signUp()">Sign Up</button>
						</div>

						</form>

						<div id="sign-res" style="margin-top: 10px;"></div>
					</div>

					<div class="col-md-6"> 
						<button class="btn btn-warning">Signin with Google</button>
						<div style="margin: 10px;"></div>
						<button class="btn btn-primary">Signin with facebook</button>
					</div>
				</div>
				
			</div>  <!-- Modal body ends -->

			<div class="modal-footer"> <!-- Modal footer starts -->
				<a href="#" data-toggle='modal' data-dismiss="modal" data-target='#login'>Login</a>
			</div> <!-- Modal footer ends -->

		</div>
	</div>
	
</div>