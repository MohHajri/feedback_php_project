
<!DOCTYPE html>
<html>
<head>
	<title>Feedback Form</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<div class="card mt-5">
					<div class="card-header">
						<!-- <img src="logo.png" alt="Logo" width="50" height="50"> -->
						Feedback Form
					</div>
					<div class="card-body">
						<?php
						// Connect to database
						include 'config/database.php';

						// Set vars to empty values
						$name = $email = $body = '';
						$nameErr = $emailErr = $bodyErr = '';

						// Form submit
						if (isset($_POST['submit'])) {

						
						// Validate name
						if (empty($_POST['name'])) {
							$nameErr = 'Name is required';
						} else {
							// $name = filter_var($_POST['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
							$name = filter_input(
							INPUT_POST,
							'name',
							FILTER_SANITIZE_FULL_SPECIAL_CHARS
							);
						}

						// Validate email
						if (empty($_POST['email'])) {
							$emailErr = 'Email is required';
						} else {
							// $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
							$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
						}

						// Validate body
						if (empty($_POST['body'])) {
							$bodyErr = 'Body is required';
						} else {
							// $body = filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
							$body = filter_input(
							INPUT_POST,
							'body',
							FILTER_SANITIZE_FULL_SPECIAL_CHARS
							);
						}



						if (empty($nameErr) && empty($emailErr) && empty($bodyErr)) {
							// add to database
							$sql = "INSERT INTO feedback (name, email, body) VALUES ('$name', '$email', '$body')";
							if (mysqli_query($conn, $sql)) {
							// success
							header('Location: feedback.php');
							} else {
							// error
							echo 'Error: ' . mysqli_error($conn);
							}
						}
						}
						?>

						<form method="POST" action="">
							<div class="form-group">
								<label for="name">Name</label>
								<input type="text" class="form-control <?php echo !empty($nameErr) ? 'is-invalid' : ''; ?>" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>" required>
								<div class="invalid-feedback"><?php echo $nameErr; ?></div>
							</div>
							<div class="form-group">
								<label for="email">Email</label>
								<!-- <input type="email" class="form-control" id="email" name="email" required> -->
								<input type="email" class="form-control <?php echo !empty($emailErr) ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
								<div class="invalid-feedback"><?php echo $emailErr; ?></div>
							</div>
							<div class="form-group">
								<label for="body">Feedback</label>
								<!-- <textarea class="form-control" id="body" name="body" rows="3" required></textarea> -->
								<textarea class="form-control <?php echo !empty($bodyErr) ? 'is-invalid' : ''; ?>" id="body" name="body" rows="3" required><?php echo htmlspecialchars($body); ?></textarea>
								<div class="invalid-feedback"><?php echo $bodyErr; ?></div>
							</div>
							<button type="submit" class="btn btn-primary" name="submit">Submit</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>
