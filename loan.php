<?php 
	require_once './includes/config.php';
    
    @$user_id = $_SESSION['user_id'];

   

  $select_user = mysqli_query($conn, "SELECT * FROM USERS WHERE USER_ID='$user_id'");
  $user_data = mysqli_fetch_assoc($select_user);

	$select = "SELECT * FROM loans WHERE USER_ID='$user_id'";
	$result = mysqli_query($conn, $select);
  $data = mysqli_fetch_assoc($result);

  $select_pending = $conn->query("SELECT * FROM loans WHERE USER_ID='$user_id' AND STATUS='pending'");
  $pending_data = mysqli_fetch_assoc($select_pending);

  $select_accepted= $conn->query("SELECT * FROM loans WHERE USER_ID='$user_id' AND STATUS='accepted'");
  $accepted_data = mysqli_fetch_assoc($select_accepted);

  $select_active = $conn->query("SELECT * FROM loans WHERE USER_ID='$user_id' AND STATUS='active'");
  $active_data = mysqli_fetch_array($select_active);

  $loan_info = "SELECT * FROM loan_infos ";
  $query = mysqli_query($conn, $loan_info);
  $loan_data = mysqli_fetch_assoc($query);

  $select_balance = $conn->query("SELECT * FROM balance WHERE USER_ID='$user_id'");
  $balance_data = mysqli_fetch_assoc($select_balance);

 $select_payments = $conn->query("SELECT * FROM payments WHERE USER_ID='$user_id'");

  $interest = $loan_data['interest'];

  $balance = $accepted_data['AMOUNT']*$interest;

  $TOTAL = $balance+$accepted_data['AMOUNT'];



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>LOWNA MICROFINANCE  </title>
	<link rel="stylesheet" type="text/css" href="./assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./assets/css/style.css">
	<link rel="stylesheet" href="./assets/css/mdb.min.css" />
	<link rel="stylesheet" type="text/css" href="./assets/fontawesome6/css/all.css">
     <script src="./assets/js/sweet.js"></script>

</head>
<body onscroll="myFunction()" onload="window.scrollTo(0, 0);">
<main style="height: 70vh; background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(./assets/img/startup-g3751c17c9_1280.jpg); background-repeat: no-repeat; background-size: cover;" class="d-flex justify-content-center align-items-center">
<!-- Navbar -->
   <div class="position-absolute top-0 w-100" id="navbar">
     <nav class="navbar navbar-expand-lg navbar-light shadow-0" >
        <!-- Container wrapper -->
        <div class="container">
            <!-- Toggle button -->
            <button class="navbar-toggler  text-light" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
          </button>

            <!-- Collapsible wrapper -->
            
            
              <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <!-- Navbar brand -->
                <a class="navbar-brand mt-2 mt-lg-0" href="#">
                    <h3 class="navbar-brand fs-3 text-primary fw-bold"><i class="fa-brands fa-slack me-2"></i> LOWNA</h3>
                </a>
                <!-- Left links -->
              <?php 
              if (isset($user_id)) {
              ?>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-lg-none navigation" >
                    <li class="nav-item">
                        <a class="nav-link  text-light " href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light active" href="loan.php">Loan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="agreement.php">Agreement</a>
                    </li>
                </ul>
                <!-- Left links -->
                 <?php
            }
            ?>
            </div>
             
            <!-- Collapsible wrapper -->

            <!-- Right elements -->
            <div class="d-flex align-items-center">
              <?php 
                   if (isset($user_id)) {
                     ?>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-lg-flex d-none navigation">
                   
                      <li class="nav-item me-4 ">
                        <a class="nav-link  text-light" href="index.php">Home</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link text-light active" href="loan.php">Loan</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link text-light" href="agreement.php">Agreement</a>
                    </li>
                    
                </ul>

                 <!-- Notifications -->
                <div class="dropdown me-4">
                    <a class="text-reset me-3 dropdown-toggle hidden-arrow " href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-bell  text-light"></i>
                        <span class="badge rounded-pill badge-notification bg-danger">1</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end " aria-labelledby="navbarDropdownMenuLink">
                        <li>
                            <a class="dropdown-item" href="#">Some news</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Another news</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </li>
                    </ul>
                </div>

                 <?php
                   }else{
                    ?>
                    <button type="button" class="btn border border-light text-light hover-primary" data-bs-toggle="modal" data-bs-target="#modal-login" id="sign-up-btn">Sign Up Free</button>
                    <?php
                   }
                  ?>

               
                <!-- Avatar -->
                

                <div class="dropdown">
                    <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                        <?php 
                        if (isset($user_id)) {
                            ?>
                           <div class="rounded-circle" style="width: 50px; height: 50px; background-image: url(./profile_images/<?php echo $user_data['PROFILE_IMG'] ?>); background-size: cover; background-repeat: no-repeat; background-position: center;">
                               
                            </div>
                            <?php
                        }
                        ?>

                    </a>
                     <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                        <li>
                            <a href="#" class="dropdown-item " data-bs-toggle="modal" data-bs-target="#profile-info">My profile</a>
                        </li>
                        <li>
                            <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#profile-setting">Settings</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="?logout">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Right elements -->
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->
   </div>


      <!-- Tabs content -->
    <!-- Start your project here-->
    <div class="text-center" style="width: 40%;">
    
      <?php 
      if (isset($user_id)) {
          ?>
        <h1 class="text-light fw-bold mb-3">Manage your loan now</h1>
      <p class="text-light">Scroll down to view your dashboard.</p>
          <?php
      }else{
        ?>
          <h1 class="text-light fw-bold mb-3">Start your loan now</h1>
      <p class="text-light">Cloud based Loan Management Software that is secure and easy to use. Developed specially for the loan management industry.</p>
        <button type="button" class="btn btn-primary mt-3 text-capitalize fs-6 fw-bold" data-bs-toggle="modal" data-bs-target="#modal-login">Register Now</button>
        <?php
      }
      ?>
    </div>

</main>

<section style="; background: #202A44;" id="cards-loan">

  <div class="position-absolute w-100" style="top:60%; ">
  <div class="container">
    <div class="row g-3">
      <div class="col-lg-3">
        <div class="card bg-light shadow-6 d-flex justify-content-center align-items-center" style="height: 200px;"> 
          <h3>Balance</h3>
          <button type="button" class="bg-light border border-0" style="font-size: 15px;">₱ <?php echo number_format($balance_data['TOTAL_BALANCE'],2) ?></button>
        </div>
      </div>

      <div class="col-lg-3">
        <div class="card bg-danger bg-light shadow-6 d-flex justify-content-center align-items-center p-4 text-center" style="height: 200px;"> 
          <h3>Loan</h3>
          <?php 
          if (mysqli_num_rows($result) <= 0) {
              ?>
              <button type="button" class="btn btn-primary text-capitalize" style="font-size: 13px;" data-bs-toggle="modal" data-bs-target="#loan-now">Loan Now</button>
              <?php
          }elseif($data['STATUS'] == "pending"){
            ?>
            <button type="button" class="text-light btn btn-warning" style="font-size: 15px;">Pending</button>
            <?php
          }elseif($data['STATUS'] == "accepted"){
            ?>
            <button type="button" class="bg-light border border-0" style="font-size: 15px; width: 300px;">Accepted, Waiting for your confirmation <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#decide-loan">Click here</a></button>
            <?php
          }elseif ($data['STATUS'] == "active") {
              ?>
              <button type="button" class="btn btn-success text-capitalize px-5" style="font-size: 15px;">Active</button>
              <?php
          }elseif ($data['STATUS'] == "paid") {
            ?>
            <p>Paid , Wanna loan again? <a href="#" class=" text-capitalize text-primary fs-6 text-decoration-underline" style="font-size: 13px;" data-bs-toggle="modal" data-bs-target="#loan-now">Click Here</a></p>
            
            <?php
          }
            ?>
        </div>
      </div>

      <div class="col-lg-3">
        <div class="card bg-danger bg-light shadow-6 d-flex justify-content-center align-items-center" style="height: 200px;"> 
          <h3>Latest Payment</h3>
          <?php 
          $payment_data = mysqli_fetch_assoc($select_payments);
        ?>
        <button type="button" class="bg-light border border-0" style="font-size: 15px;">₱ <?php echo number_format($payment_data['AMOUNT'],2) ?></button>

        </div>
      </div>


      <div class="col-lg-3">
        <div class="card bg-danger bg-light shadow-6 d-flex justify-content-center align-items-center" style="height: 200px;"> 
          <h3>Total Receivable</h3>
          <?php 
          $payment_data = mysqli_fetch_assoc($select_payments);
        ?>
        <button type="button" class="bg-light border border-0" style="font-size: 15px;">₱ <?php
        if (@$data['STATUS'] == "active") {
            echo number_format($data['AMOUNT'],2);
        }else{
          echo "0.00";
        }
          ?></button>

        </div>
      </div>


    </div>
    </div>
  </div>


  
</section>

<section style=" background: #202A44;" class="pb-5" id="user-dashboard">
<div class="container pb-3">
    <div class="row">
        <div class="col-lg-3" >
            <nav class="navbar nav-tabs shadow-0" role="tablist" id="loan-tabs">
  <div class="container-fluid">
     <div
      class="nav flex-column nav-tabs text-center w-100"
      id="v-tabs-tab"
      role="tablist"
      aria-orientation="vertical"
    >
      <a
        class="nav-link active fs-6 text-light"
        id="v-tabs-home-tab"
        data-mdb-toggle="tab"
        href="#v-tabs-home"
        role="tab"
        aria-controls="v-tabs-home"
        aria-selected="true"
        >Balance Info</a
      >
      <a
        class="nav-link fs-6 text-light"
        id="v-tabs-profile-tab"
        data-mdb-toggle="tab"
        href="#v-tabs-profile"
        role="tab"
        aria-controls="v-tabs-profile"
        aria-selected="false"
        >Loan Info</a
      >
      <a
        class="nav-link fs-6 text-light"
        id="v-tabs-messages-tab"
        data-mdb-toggle="tab"
        href="#v-tabs-messages"
        role="tab"
        aria-controls="v-tabs-messages"
        aria-selected="false"
        >Payment Info</a
      >
    </div>
    <!-- Tab navs -->
  </div>
</nav>
</div>

    <div class="col-lg-9" >
            <!-- Tab content -->
    <div class="tab-content text-light pt-2" id="v-tabs-tabContent">
      <div
        class="tab-pane fade show active"
        id="v-tabs-home"
        role="tabpanel"
        aria-labelledby="v-tabs-home-tab"
      >
        <h4>Balance Info</h4>
        <div class="card text-center">
  <div class="card-header text-dark">Current Balance</div>
  <div class="card-body">
    <h5 class="card-title text-dark">₱ <?php echo number_format($balance_data['TOTAL_BALANCE'],2) ?> </h5>
    <p class="card-text text-dark">With 20% interest</p>
  </div>
  <div class="card-footer text-muted">
   <?php 
   if ($balance_data['TOTAL_BALANCE'] == Null) {
       echo "0000-00-00";
   }else{
    echo $balance_data['DATE'];
   }
    ?>
</div>
</div>

      </div>


      <div
        class="tab-pane fade"
        id="v-tabs-profile"
        role="tabpanel"
        aria-labelledby="v-tabs-profile-tab"
      >

        <h4>Loan Info</h4>
         <div class="card text-center mb-3">
          <div class="card-header text-dark">Current Loan</div>
          <div class="card-body">
            <h5 class="card-title text-dark">₱ <?php echo number_format($active_data['AMOUNT'],2) ?></h5>
            <p class="card-text text-dark">The amount you loan is also the amount you will receive </p>
          </div>
          <div class="card-footer text-muted">
           <?php 
           if ($active_data['AMOUNT'] == Null) {
               echo "0000-00-00";
           }else{
                echo $active_data['DATE'];
           }
            ?>
        </div>
        </div>
        
        <div class="card p-3">
            <div class="card-header text-dark ps-0 fs-5 ">Loan History</div>
            <table class="table table-bordered table-hover border border-dark text-dark text-center">
           <thead>
            <tr>
              <th scope="col" class="p-2">#</th>
              <th scope="col" class="p-2">Amount</th>
              <th scope="col" class="p-2">Used To</th>
              <th scope="col" class="p-2">Status</th>
              <th scope="col" class="p-2">Date</th>
            </tr>
          </thead>
          <tbody class="table-group-divider">

            <?php 
            if (mysqli_num_rows($select_active) > 0) {

                $loan_select = $conn->query("SELECT * FROM loans WHERE USER_ID='$user_id' AND STATUS='active'");

                while ($loan = mysqli_fetch_array($loan_select)) {
                    ?>
                        <tr>
                          <th scope="row" class="text-dark p-2"><?php echo $loan['ID'] ?></th>
                          <td class="text-dark p-2" >₱ <?php echo number_format($loan['AMOUNT'],2) ?></td>
                          <td class="text-dark p-2"><?php echo $loan['LOAN_USED'] ?></td>
                          <td class="text-dark p-2"><?php echo $loan['STATUS'] ?></td>
                          <td class="text-dark p-2"><?php echo $loan['DATE'] ?></td>
                        </tr>
                    <?php
                }

            }else{
                ?>
                <tr>
                    <td class="text-start" colspan="4">No record found</td>
                </tr>
                <?php
            }
            ?>
            
    
        </tbody>
        </table>
        </div>

      </div>
      <div
        class="tab-pane fade"
        id="v-tabs-messages"
        role="tabpanel"
        aria-labelledby="v-tabs-messages-tab"
      >
        <h4>Payment Info</h4>
                <div class="card p-3">
            <div class="card-header text-dark ps-0 fs-5 ">Payment History</div>
            <table class="table table-bordered table-hover border border-dark text-dark text-center">
           <thead>
            <tr>
              <th scope="col" class="p-2">#</th>
              <th scope="col" class="p-2">Amount</th>
              <th scope="col" class="p-2">Date</th>
            </tr>
          </thead>
          <tbody class="table-group-divider">

            <?php
           $select_payment = $conn->query("SELECT * FROM payments WHERE USER_ID='$user_id'");
            if (mysqli_num_rows($select_payment) > 0) {

                
                while ($payment = mysqli_fetch_array($select_payment)) {
                    ?>
                        <tr>
                          <th scope="row" class="text-dark p-2"><?php echo $payment['ID'] ?></th>
                          <td class="text-dark p-2" >₱ <?php echo number_format($payment['AMOUNT'],2) ?></td>
                       
                          <td class="text-dark p-2"><?php echo $payment['DATE'] ?></td>
                        </tr>
                    <?php
                }

            }else{
                ?>
                <tr>
                    <td class="text-start" colspan="4">No record found</td>
                </tr>
                <?php
            }
            ?>
            
    
        </tbody>
        </table>
        </div>

      </div>
    </div>
    <!-- Tab content -->
        </div>


    </div>
  </div>

  </section>







<?php
    require_once 'modals.php'; 
    require_once './includes/update_account.php';
    require_once './includes/add_loan.php';

    require_once'./includes/logout.php';
     if (!isset($user_id)) {
        ?>

                    <script type="text/javascript">
                    let timerInterval
                    Swal.fire({
                        icon: 'warning',
                      title: 'Please login first',
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

    require_once './includes/confirm_cancel_loan.php';
 ?>

  <script src="./assets/bootstrap/js/bootstrap.bundle.js"></script>
  <script src="./assets/js/jq.min.js"></script>
  <script type="text/javascript" src="./assets/js/mdb.min.js"></script>
  
  <script type="text/javascript">
    let img = document.querySelector("#pills-register img");
    let input = document.querySelector("#pills-register input[type='file']");

    input.onchange = (e) => {
        e.preventDefault();
        if (input.files[0]) {
            img.src = URL.createObjectURL(input.files[0]);
        }
    }

     let img1 = document.querySelector("#loan-now img");
    let input1 = document.querySelector("#loan-now input[type='file']");

    input1.onchange = (e) => {
        e.preventDefault();
        if (input1.files[0]) {
            img1.src = URL.createObjectURL(input1.files[0]);
        }
    }

    function radio(x){
        let input = document.querySelector(".input-other");
        if (x == 0) {
            input.classList.remove("d-none");
        }else{
            input.classList.add("d-none");
        }
    }


    function confirm(){
        window.location.href = "loan.php?confirm&balance=<?php echo $TOTAL ?>";
    }

      function cancel(){
        window.location.href = "loan.php?cancel";
    }

   
  </script>

</body>
</html>
