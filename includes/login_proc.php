<?php 
if (isset($_POST['login'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];


		$select = "SELECT * FROM users WHERE email='$email' AND password='$password'";
		$result = mysqli_query($conn, $select);

		if (mysqli_num_rows($result) > 0) {

			$data = mysqli_fetch_assoc($result);

			

				if ($data['LEVEL'] == 1) {

					$_SESSION['admin_id'] = $data['USER_ID'];
					
						?>

					<script type="text/javascript">
					let timerInterval
					Swal.fire({
						icon: 'success',
					  title: 'Welcome <?php echo $data['FNAME'] ?>',
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
					    window.location.href = "./admin/index.php";
					  }
					})
    				</script>
					

						<?php
					

				}elseif ($data['LEVEL'] == 2) {

					$_SESSION['user_id'] = $data['USER_ID'];
					
						?>

					<script type="text/javascript">
					let timerInterval
					Swal.fire({
						icon: 'success',
					  title: 'Welcome <?php echo $data['FNAME'] ?>',
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

		}else{
			?>
			<script type="text/javascript">
					let timerInterval
					Swal.fire({
						icon: 'warning',
					  title: 'Incorrect username or password',
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
