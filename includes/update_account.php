<?php
if (isset($_POST['update_account'])) {
	$user_id = $_SESSION['user_id'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$profile = $_FILES['profile_img']['name'];
	$tmp_name = $_FILES['profile_img']['tmp_name'];
	$folder = "./profile_images/".$profile;

	if (empty($profile)) {

		$old_img = $_POST['old_image'];

		$sql = "UPDATE users SET FNAME='$fname', LNAME='$lname', EMAIL='$email', PASSWORD='$password', PROFILE_IMG='$old_img' WHERE USER_ID='$user_id'";

	}else{
		move_uploaded_file($tmp_name, $folder);

		$sql = "UPDATE users SET FNAME='$fname', LNAME='$lname', EMAIL='$email', PASSWORD='$password', PROFILE_IMG='$profile' WHERE USER_ID='$user_id'";

	}
	

	mysqli_query($conn,$sql);
	
	?>
			<script type="text/javascript">
					let timerInterval
					Swal.fire({
						icon: 'success',
					  title: 'Account successfully updated',
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