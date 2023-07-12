<?php 
	require_once './includes/config.php';
	require_once './includes/signup_proc.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Loan Management System</title>
</head>
<body>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" enctype="multipart/form-data">
		<input type="text" name="fname" placeholder="Firstname" value="<?php echo @$fname ?>" required>
		<input type="text" name="lname" placeholder="Lastname" value="<?php echo @$lname ?>" required>	
		<input type="tel" name="contact" placeholder="Contact Number" value="<?php echo @$contact ?>" required>
		<input type="email" name="email" placeholder="Email" value="<?php echo @$email ?>" required>
		<input type="password" name="password" placeholder="Password" required>
		<input type="password" name="confirmPass" placeholder="Confirm Password">
		<button type="submit" name="signup">Create</button>
		<p>Already have an account? <a href="login.php">Login</a></p>
		<p style="color: red;"><?php echo @$message ?></p>
		<p style="color: green;"><?php echo @$_GET['message'] ?></p>
	</form> 

</body>
</html>