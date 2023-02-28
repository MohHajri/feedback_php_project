<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>

	<?php include 'navbar.php'; ?>

	<div class="container mt-5">
		<div class="row">
			<div class="col-md-6">
				<h1>Welcome to My Site</h1>
				<p> A php project where you can add you feedback accompanied with your name and email ans then the info get stored in mysql database. there is a page where you can acess and see the feebacks submited</p>
			</div>
			<div class="col-md-6">
				<?php include 'form.php'; ?>
			</div>
		</div>
	</div>

	<?php include 'footer.php'; ?>

</body>
</html>
