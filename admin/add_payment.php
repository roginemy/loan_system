<?php 
    require_once '../includes/config.php';

    @$user_id = $_SESSION['admin_id'];
   if (!isset($user_id)) {
      header("location: ../index.php");
    }
    $select = mysqli_query($conn, "SELECT * FROM users WHERE USER_ID='$user_id'");
    $user_data = mysqli_fetch_assoc($select);


    @$cust_id = $_GET['ID'];
    $loans_select = mysqli_query($conn, "SELECT * FROM loans l INNER JOIN balance b ON l.USER_ID=b.USER_ID WHERE l.USER_ID='$cust_id'");

    $data = mysqli_fetch_assoc($loans_select);

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
                      <a class="nav-link active text-secondary ps-0" href="payments.php" ><i class="fa-solid fa-money-bill-transfer"></i> Payments</a>
                    </li>
                     <li class="nav-item">
                      <a class="nav-link text-secondary ps-0" href="customers.php"><i class="fa fa-users"></i> Borrowers</a>
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
              <a class="nav-link active" href="payments.php" ><i class="fa-solid fa-money-bill-transfer"></i> Payments</a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="customers.php"><i class="fa fa-users"></i> Borrowers</a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="accounts.php" data-bs-toggle="tab"><i class="fa fa-user"></i> Accounts</a>
            </li>
          </ul>
        </div>

        <div class="col-lg-10 col-12 p-3">
            



               <form method="post">
                 <div class="card w-50 me-auto ms-auto">
                      <div class="card-header">Add Payment</div>
                      <div class="card-body">
                        <p class="card-text text-capitalize">Name: <?php echo $data['LNAME'].", ".$data['FNAME']." ".$data['MIDDLE'] ?></p>
                        <p class="card-text">Balance: <?php echo number_format($data['TOTAL_BALANCE'],2) ?></p>
                        <input type="hidden" name="ID" value="<?php echo $cust_id ?>">
                       <div class="form-outline mb-4">

                        <input type="number" name="payment" id="form6Example3" class="form-control" required/>
                        <label class="form-label" for="form6Example3">Payment Amount</label>
                      </div>
                        <div class="text-end">
                             <div class="btn-group">
                                   <button type="submit" name="submit" class="btn btn-primary form-control">Submit Payment</button>
                            <a href="payments.php" class="btn btn-secondary ">Cancel</a>
                            </div>
                           
                        </div>
                      </div>
                    </div>
               </form>


         </div>


      </div>
    </div>


<?php 
    require_once './includes/payment_proc.php';
    require_once'./includes/logout.php';
?>
<script src="../assets/bootstrap/js/bootstrap.bundle.js"></script>
<script src="../assets/js/jq.min.js"></script>
<script type="text/javascript" src="../assets/js/mdb.min.js"></script>
</body>
</html>