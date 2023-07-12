
<?php
if (isset($_POST['submit'])) {
	$user_id = $_SESSION['user_id'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$mname = $_POST['middle'];
	$age = $_POST['age'];
	$address = $_POST['address'];
	$occupation = $_POST['occupation'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$amount = $_POST['amount'];
	$loan_used = $_POST['moneyUsed'];
	$amountWord = $_POST['amountWord'];
	$dateLoan = $_POST['dateLoan'];
	$valid_ID = $_FILES['validID']['name'];
	$tmp_name = $_FILES['validID']['tmp_name'];
	$folder = "./valid_ids/".$valid_ID;
	@$agr1 = $_POST['agreement1'];
	@$agr2 = $_POST['agreement2'];
	@$agr3 = $_POST['agreement3'];
	@$agr4 = $_POST['agreement4'];
	@$agr5 = $_POST['agreement5'];
	$interest = $_POST['interest'];
	
	if ($loan_used == "other") {
		$used = $_POST['moneyUsedOther'];
	}else{
		$used = $_POST['moneyUsed'];
	}
	
	
				move_uploaded_file($tmp_name, $folder);

				$conn->query("INSERT INTO loans( `USER_ID`, `FNAME`, `LNAME`, `MIDDLE`, `AGE`, `ADDRESS`, `OCCUPATION`, `PHONE`, `EMAIL`, `AMOUNT`, `WORD`, `DATE`, `LOAN_USED`, `INTEREST`,`AGREEMENT_1`, `AGREEMENT_2`, `AGREEMENT_3`, `AGREEMENT_4`, `AGREEMENT_5`, `VALID_ID`, `STATUS`) VALUES('$user_id', '$fname','$lname', '$mname', '$age','$address', '$occupation', '$phone', '$email', '$amount', '$amountWord', '$dateLoan','$used','$interest','$agr1', '$agr2', '$agr3', '$agr4', '$agr5', '$valid_ID','pending')");

				?>

				<script type="text/javascript">
					let timerInterval
					Swal.fire({
						icon: 'success',
					  title: 'Request successfully submitted',
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


