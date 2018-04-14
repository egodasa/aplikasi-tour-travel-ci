<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
	<div class="modal-dialog modal-sm">

		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="Login">Login Pengguna</h4>
			</div>
			<div class="modal-body">
				<form action="aksilogin.php" method="post">
					<div class="form-group">
						<input type="text" class="form-control" name="username" placeholder="email">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" name="password" placeholder="password">
					</div>

					<p class="text-center">
						<button class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
					</p>

				</form>

				<p class="text-center text-muted">Not registered yet?</p>
				<p class="text-center text-muted"><a href="register.html"><strong>Register now</strong></a>! It is easy and done in 1&nbsp;minute and gives you access to special discounts and much more!</p>

			</div>
		</div>
	</div>
</div>
