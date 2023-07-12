<?php
@$ID = $_GET['ID'];

if (isset($_GET['confirm'])) {
	date_default_timezone_set('Asia/Manila');
	$date = date('Y-m-d', time());

	$confirm = "UPDATE loans SET STATUS='accepted' WHERE ID='$ID'";
	mysqli_query($conn, $confirm);
	?>

				<script type="text/javascript">
					let timerInterval
					Swal.fire({
						icon: 'success',
					  title: 'Loan accepted	',
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
					    window.location.href = "loans.php";
					  }
					})
				</script>
				<?php
}else{
	if (isset($_GET['decline'])) {
		$cancel = "DELETE FROM loans WHERE ID='$ID'";
		mysqli_query($conn, $cancel);
		?>

				<script type="text/javascript">
					let timerInterval
					Swal.fire({
						icon: 'warning',
					  title: 'Loan declined',
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
					    window.location.href = "loans.php";
					  }
					})
				</script>
				<?php
	}
}