<?php
$user_id = $_SESSION['user_id'];
if (isset($_GET['confirm'])) {
	date_default_timezone_set('Asia/Manila');
	$date = date('Y-m-d', time());
	$balance = $_GET['balance'];

	$confirm = "UPDATE loans SET STATUS='active' WHERE USER_ID='$user_id' AND STATUS='accepted'";
	mysqli_query($conn, $confirm);

	$insert = "INSERT INTO balance(USER_ID,BALANCE,TOTAL_BALANCE,DATE) VALUES('$user_id', '$balance','$balance','$date')";
	mysqli_query($conn, $insert);

	?>

				<script type="text/javascript">
					let timerInterval
					Swal.fire({
						icon: 'success',
					  title: 'Loan successfully activated',
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
					    window.location.href = "loan.php";
					  }
					})
				</script>
				<?php

}else{

	if (isset($_GET['cancel'])) {
		$cancel = "DELETE FROM loans WHERE STATUS='accepted' OR STATUS='pending' AND USER_ID='$user_id'";
		mysqli_query($conn, $cancel);

		?>
		<script type="text/javascript">
					let timerInterval
					Swal.fire({
						icon: 'success',
					  title: 'Sorry we didn\'t meet your wants',
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
					    window.location.href = "loan.php";
					  }
					})

				</script>
		<?php
	}
}
?>
