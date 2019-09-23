<?php
	include 'helper/login.helper.php';

	if (checkLogin()) {
		header('location: index.php');
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Simple Login & Registration System With PHP OOP</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
</head>
<body>
	
	<div class="container py-4">
		<div class="row justify-content-center">
			
			<div class="col-12 text-center p-3">
				<div class="h3">Simple Login & Registration System With PHP OOP </div>
			</div>

			<div class="col-md-8">
				<div class="card shadow-sm">
					<div class="card-header">Register</div>
					<div class="card-body">

						<?php if(trysignUp()) { ?>
							<div class="alert alert-warning">
								<?php echo(trysignUp()) ?>
							</div>
						<?php } ?>
						
						<form method="POST">
							<div class="form-group">
								<label>Name</label>
								<input type="name" name="name" placeholder="Name..." class="form-control">
							</div>
							<div class="form-group">
								<label>Email</label>
								<input type="email" name="email" placeholder="Email..." class="form-control">
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" name="password" placeholder="Password.." class="form-control">
							</div>
							<div class="form-group">
								<label>Confirm Password</label>
								<input type="password" name="_password" placeholder="Confirm Password.." class="form-control">
							</div>
							<div class="form-group">
								<input type="submit" name="signup" value="Register" class="btn btn-block btn-primary">
							</div>
						</form>

						<div class="border-top border-dark d-flex justify-content-between">
							<span>Alrady have an account</span>
							<a href="login.php">Login</a>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>