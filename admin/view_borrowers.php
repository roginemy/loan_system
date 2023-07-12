<?php 
    require_once '../includes/config.php';

    @$user_id = $_SESSION['admin_id'];
   if (!isset($user_id)) {
      header("location: ../index.php");
    }
    $select = mysqli_query($conn, "SELECT * FROM users WHERE USER_ID='$user_id'");
    $user_data = mysqli_fetch_assoc($select);


    $loans_select = mysqli_query($conn, "SELECT * FROM loans");

    $cust_id = $_GET['ID'];
    $user_query = mysqli_query($conn, "SELECT * FROM users  WHERE USER_ID='$cust_id' ");
    $loans_query = mysqli_query($conn, "SELECT * FROM loans  WHERE USER_ID='$cust_id' ");
    $balance_query = mysqli_query($conn, "SELECT * FROM balance  WHERE USER_ID='$cust_id' ");
    $payment_query = mysqli_query($conn, "SELECT * FROM payments  WHERE USER_ID='$cust_id' ORDER BY ID DESC ");

    $data = mysqli_fetch_assoc($user_query);

    $data_loans = mysqli_fetch_assoc($loans_query);

    $data_balance = mysqli_fetch_assoc($balance_query);

    $data_payment = mysqli_fetch_assoc($payment_query);

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" type="text/css" href="../assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/mdb.min.css" />
  <link rel="stylesheet" type="text/css" href="../assets/fontawesome6/css/all.css">
  <script src="../assets/js/sweet.js"></script>
  <title>LOWNA</title>
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark shadow-4">
        <!-- Container wrapper -->
        <div class="container-fluid">

                 <button class="navbar-toggler  text-primary" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa-solid fa-bars-staggered"></i>
                  </button>
            <!-- Toggle button -->

            <!-- Collapsible wrapper -->
            
            
              <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <!-- Navbar brand -->
                <a class="navbar-brand mt-2 mt-lg-0" href="#">
                    <h3 class="navbar-brand fs-3 text-primary fw-bold"><i class="fa-brands fa-slack me-2"></i> LOWNA</h3>
                </a>

                
                <ul class="navbar-nav me-auto nav-tabs mb-2 mb-lg-0 d-lg-none " id="navigation-admin">
                    <li class="nav-item">
                      <a class="nav-link text-secondary ps-0" href="index.php" ><i class="fa fa-home"></i> Dashboard</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link  text-secondary ps-0" href="loans.php"><i class="fa-solid fa-hand-holding-dollar"></i> Loans</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-secondary ps-0" href="payments.php" ><i class="fa-solid fa-money-bill-transfer"></i> Payments</a>
                    </li>
                     <li class="nav-item">
                      <a class="nav-link active text-secondary ps-0" href="customers.php"><i class="fa fa-users"></i> Borrowers</a>
                    </li>
                     <li class="nav-item">
                      <a class="nav-link text-secondary ps-0" href="accounts.php" data-bs-toggle="tab"><i class="fa fa-user"></i> Accounts</a>
                    </li>
                </ul>

            </div>
             
            <!-- Collapsible wrapper -->

            <!-- Right elements -->
            <div class="d-flex align-items-center">

                 <!-- Notifications -->
                <div class="dropdown me-4">
                    <a class="text-reset me-3 dropdown-toggle hidden-arrow " href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-bell  text-primary"></i>
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


               
                <!-- Avatar -->
                

                <div class="dropdown">
                    <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                        <?php 
                        if (isset($user_id)) {
                            ?>
                            <div class="rounded-circle" style="width: 50px; height: 50px; background-image: url(../profile_images/<?php echo $user_data['PROFILE_IMG'] ?>); background-size: cover; background-repeat: no-repeat; background-position: center;">
                               
                            </div>
                            <?php
                        }
                        ?>

                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                        <li>
                            <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#profile-info">My profile</a>
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



    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-2 col-6 d-lg-block d-none shadow-3 collapse-horizontal pt-3" style="height: calc(100vh - 78px); width: fit-content;" id="sidenav">
           <ul class="nav flex-column nav-tabs" style="width: fit-content;">
            <li class="nav-item">
              <a class="nav-link" href="index.php" ><i class="fa fa-home"></i> Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="loans.php"><i class="fa-solid fa-hand-holding-dollar"></i> Loans</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="payments.php" ><i class="fa-solid fa-money-bill-transfer"></i> Payments</a>
            </li>
             <li class="nav-item">
              <a class="nav-link active" href="customers.php"><i class="fa fa-users"></i> Borrowers</a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="accounts.php" data-bs-toggle="tab"><i class="fa fa-user"></i> Accounts</a>
            </li>
          </ul>
        </div>

        <div class="col-lg-10 col-12 p-3">
            
        <main id="main" class="main">

<div class="pagetitle">
  <h1 class="fs-3">Profile</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item">Users</li>
      <li class="breadcrumb-item active">Profile</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section profile">
  <div class="row">
    <div class="col-xl-4">

      <div class="card">
        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

        <div class="rounded-circle" style="width: 300px; height: 300px; background-image: url(../profile_images/<?php echo $data['PROFILE_IMG'] ?>); background-size: cover; background-repeat: no-repeat; background-position: center;">
                               
                               </div>
          <h2 class="fs-4 text-capitalize"><?php echo $data['LNAME'].", ".$data['FNAME'] ?></h2>
          <div class="social-links mt-2">
            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>
      </div>

    </div>

    <div class="col-xl-8">

      <div class="card">
        <div class="card-body pt-3">
          <!-- Bordered Tabs -->
          <ul class="nav nav-tabs nav-tabs-bordered">

            <li class="nav-item">
              <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
            </li>

            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Loan</button>
            </li>

            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Balance</button>
            </li>

            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Payments</button>
            </li>

          </ul>
          <div class="tab-content pt-2">

            <div class="tab-pane fade show active profile-overview" id="profile-overview">

              <h5 class="card-title pt-2">Profile Details</h5>

              <div class="row">
                <div class="col-lg-3 col-md-4 label mb-lg-2 text-capitalize ">Full Name</div>
                <div class="col-lg-9 col-md-8 text-capitalize"><?= $data['LNAME'].", ".$data['FNAME'] ?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label mb-lg-2 text-capitalize">Email</div>
                <div class="col-lg-9 col-md-8"><?= $data['EMAIL'] ?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label text-capitalize ">date created</div>
                <div class="col-lg-9 col-md-8 text-capitalize"><?= date("M d,Y", strtotime($data['CREATED'])) ?></div>
              </div>


            </div>

            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

              <!-- Profile Edit Form -->
 
              <div class="card text-center shadow-0">
                <div class="card-header mb-3">Current Loan</div>
                <div class="card-body">
                    <h5 class="card-title">₱ <?= number_format($data_loans['AMOUNT'],2) ?></h5>
                    <a href="#" class="btn btn-primary">View</a>
                </div>
                <div class="card-footer text-muted"><?= date("M d,Y", strtotime($data_loans['DATE'])) ?></div>
                <hr class="hr" />
                </div>

                <div class="card text-start">
                <div class="card-header fs-5"><i class="fa fa-list"></i> Loan History</div>
                <div class="card-body">
                <div class="table-responsive">
                <table class="table table-striped table-hover text-center">
                    <thead>
                    <tr>
                        <th scope="col">Amount</th>
                        <th scope="col">Date of Loan</th>
                        <th scope="col">Date Submitted</th>
                        <th scope="col">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $loan_hist_query = mysqli_query($conn, "SELECT * FROM loans WHERE USER_ID='$cust_id'");
                        if (mysqli_num_rows($loan_hist_query) > 0) {
                            while ($loan_history = mysqli_fetch_assoc($loan_hist_query)) {
                                ?>
                                <tr>
                                    <td><?= number_format($loan_history['AMOUNT'],2) ?></td>
                                    <td><?= $loan_history['DATE'] ?></td>
                                    <td><?= date("Y-m-d", strtotime($loan_history['DATE_SUBMITTED'])) ?></td>
                                    <td><?= $data_loans['STATUS'] ?></td>
                                </tr>
                                <?php
                            }
                        }
                    ?>
                    </tbody>

                </table>
                </div>
                </div>
                </div>
            
           

            </div>

            <div class="tab-pane fade pt-3" id="profile-settings">
                
            <!-- Profile Edit Form -->
 
            <div class="card text-center shadow-0">
                <div class="card-header ">Latest Balance</div>
                <div class="card-body">
                    <h5 class="card-title">₱ <?= number_format($data_balance['TOTAL_BALANCE'],2) ?></h5>
                    <a href="#" class="btn btn-primary">View</a>
                </div>
                <div class="card-footer text-muted mb-0"><?= date("M d,Y", strtotime($data_balance['DATE'])) ?></div>
                </div>

        
                        
            </div>

            <div class="tab-pane fade pt-3" id="profile-change-password">
             
                
              <div class="card text-center shadow-0">
                <div class="card-header mb-3">Weekly Pay</div>
                <div class="card-body">
                    <h5 class="card-title">₱ <?= number_format($data_balance['BALANCE']/6,2) ?></h5>
                    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-payment">Add Payment</a>
                </div>
                <div class="card-footer text-muted"><?= date("M d,Y", strtotime($data_payment['DATE'])) ?></div>
                <hr class="hr" />
                </div>

                <div class="card text-start">
                <div class="card-header fs-5"><i class="fa fa-list"></i> Payment History</div>
                <div class="card-body">
                <div class="table-responsive">
                <table class="table table-striped table-hover text-center">
                    <thead>
                    <tr>    
                        <th scope="col">Amount</th>
                        <th scope="col">Date of Payment</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 

                   
                        
                  
                   
                        if (mysqli_num_rows($payment_query) > 0) {
                            while ($payment_history = mysqli_fetch_assoc($payment_query)) {
                                
                                ?>
                                <tr>
                                    <td><?= number_format($payment_history['AMOUNT'],2) ?></td>
                                    <td><?= date("Y-m-d", strtotime($payment_history['DATE'])) ?></td>
                                </tr>
                                <?php
                            
                        }

                    }
                    ?>
                    </tbody>

                </table>
                
                </div>
                </div>
                </div>


            </div>

          </div><!-- End Bordered Tabs -->

        </div>
      </div>

    </div>
  </div>
</section>

</main><!-- End #main -->


         </div>


      </div>
    </div>


<form method="post">
    <div class="modal fade" id="add-payment">
        <div class="modal-dialog">
            <div class="modal-content p-3">
            <form>

            <div class="modal-header">
                <h5>Add Payment</h5>
            </div>
                    <!-- Email input -->
                <div class="form-outline mb-4 ">
                        <input type="number" id="form1Example1" name="payment" class="form-control" />
                        <label class="form-label" for="form1Example1">Payment Amount</label>
                        <input type="hidden" name="ID" value="<?= $cust_id ?>">
                </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block" name="submit">Submit Payment</button>
                    </form>
            </div>
        </div>
    </div>

</form>


<?php 
    require_once("./includes/payment_proc.php");
    require_once'./includes/logout.php';
?>
<script src="../assets/bootstrap/js/bootstrap.bundle.js"></script>
<script src="../assets/js/jq.min.js"></script>
<script type="text/javascript" src="../assets/js/mdb.min.js"></script>
</body>
</html>