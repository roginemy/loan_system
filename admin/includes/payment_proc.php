<?php
if (isset($_POST['submit'])) {
	$cust_id = $_POST['ID'];
	$payment = $_POST['payment'];
	date_timezone_set("Asia/Manila");
	$pay_date = date("Y-m-d", time());

	$insert_payments = "INSERT INTO payments(USER_ID,AMOUNT) VALUES('$cust_id','$payment')";
	mysqli_query($conn, $insert_payments);

	


	$check_balance = mysqli_query($conn, "SELECT * FROM balance WHERE USER_ID='$cust_id'");
	$data = mysqli_fetch_assoc($check_balance);

	if ($payment == $data['TOTAL_BALANCE']) {
		$delete = "DELETE FROM balance WHERE USER_ID='$cust_id'";
		mysqli_query($conn, $delete);

		mysqli_query($conn, "UPDATE loans SET STATUS='paid' WHERE USER_ID='$cust_id'");
	}else{
		$update_balance = "UPDATE balance SET TOTAL_BALANCE=TOTAL_BALANCE-$payment,DATE='$pay_date' WHERE USER_ID='$cust_id' ";
	mysqli_query($conn, $update_balance);
	}


	?>
			<script type="text/javascript">
					let timerInterval
					Swal.fire({
					  icon: 'success',
					  title: 'Payment recorded',
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
					     window.location.href = "view_borrowers.php?ID=<?php echo $cust_id ?>";
					  }
					})
    		</script>
			<?php

}