<?php	
	include 'helper/login.helper.php';

	if (!checkLogin()) {
		header('location: login.php');
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

			<div class="col-12 pt-5 text-center">
				<div class="display-4">Welcome Back <b><?php echo($_SESSION['login']['name']); ?></b></div>
				<div>Your Email is <b><?php echo($_SESSION['login']['email']); ?></b></div>
			</div>

			<div class="col-12 pt-2">
				<div class="text-center">
					<a href="logout.php" class="btn btn-outline-info">Log-out</a>
				</div>
			</div>
		</div>
	</div>

</body>
</html>
