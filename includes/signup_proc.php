
<?php 
if (isset($_POST['signup'])) {
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$confirmPass = $_POST['confirmPass'];
	$profile = $_FILES['profile']['name'];
	$tmp_name = $_FILES['profile']['tmp_name'];
	$folder = "./profile_images/".$profile;


		$checkAccount = "SELECT * FROM users WHERE EMAIL='$email'";
		$result = mysqli_query($conn, $checkAccount);

		if (mysqli_num_rows($result) > 0) {
			?>
			<script type="text/javascript">
					let timerInterval
					Swal.fire({
						icon: 'warning',
					  title: 'Email account already exist',
					  html: 'automatically close in <b></b> milliseconds.',
					  timer: 2000,
					  timerProgressBar: true,
					  didOpen: () => {
					    Swal.showLoading()
					    const b = Swal.getHtmlContainer().querySelector('b')
					    timerInterval = setInterval(() => {
					      b.textContent = Swal.getTimerLeft()
					    }, 100)
					  },
					  willClose: () => {
					    clearInterval(timerInterval)
					    window.location.href = "index.php";
					  }
					})
    		</script>
			<?php

		}else{

			move_uploaded_file($tmp_name, $folder);

			$insert = "INSERT INTO users(LEVEL,FNAME,LNAME,EMAIL,PASSWORD,PROFILE_IMG) VALUES(2, '$fname', '$lname', '$email', '$password','$profile')";
			mysqli_query($conn, $insert);

			?>
			<script type="text/javascript">
					let timerInterval
					Swal.fire({
					  icon: 'success',
					  title: 'Account successfully created',
					  html: 'automatically close in <b></b> milliseconds.',
					  timer: 2000,
					  timerProgressBar: true,
					  didOpen: () => {
					    Swal.showLoading()
					    const b = Swal.getHtmlContainer().querySelector('b')
					    timerInterval = setInterval(() => {
					      b.textContent = Swal.getTimerLeft()
					    }, 100)
					  },
					  willClose: () => {
					    clearInterval(timerInterval)
					     window.location.href = "index.php";
					  }
					})
    		</script>
			<?php

		}

	}
