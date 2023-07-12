<?php 
    require_once '../includes/config.php';

    @$user_id = $_SESSION['admin_id'];
   if (!isset($user_id)) {
      header("location: ../index.php");
    }
    $select = mysqli_query($conn, "SELECT * FROM users WHERE USER_ID='$user_id'");
    $user_data = mysqli_fetch_assoc($select);


    $loans_select = mysqli_query($conn, "SELECT * FROM loans");

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
                      <a class="nav-link active text-secondary ps-0" href="loans.php"><i class="fa-solid fa-hand-holding-dollar"></i> Loans</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-secondary ps-0" href="payments.php" ><i class="fa-solid fa-money-bill-transfer"></i> Payments</a>
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



    <div class="container-fluid ">
      <div class="row ">
        <div class="col-lg-2 col-6 d-lg-block d-none shadow-3 pt-3 sticky-top" style="height: calc(100vh ); width: fit-content;" id="sidenav">
           <ul class="nav flex-column nav-tabs " style="width: fit-content;">
            <li class="nav-item">
              <a class="nav-link" href="index.php" ><i class="fa fa-home"></i> Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="loans.php"><i class="fa-solid fa-hand-holding-dollar"></i> Loans</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="payments.php" ><i class="fa-solid fa-money-bill-transfer"></i> Payments</a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="customers.php"><i class="fa fa-users"></i> Borrowers</a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="accounts.php" data-bs-toggle="tab"><i class="fa fa-user"></i> Accounts</a>
            </li>
          </ul>
        </div>

        <div class="col-lg-10 col-12 p-3 d-flex justify-content-center">

                   <?php 
                    @$ID = $_GET['ID'];

                    $query_loans = "SELECT * FROM loans WHERE ID='$ID'";
                    $result_loans = mysqli_query($conn, $query_loans);
                    $dataS = mysqli_fetch_assoc($result_loans);
                    ?>


                    <div class="card mb-0 w-75" style="height:fit-content;">
              <div class="row g-0 ">
                <div class="col-lg-5">
                  <img
                    src="../valid_ids/<?= $dataS['VALID_ID'] ?>"
                    alt="Trendy Pants and Shoes"
                    class="img-fluid rounded-start"
                  />

                 <?php
                  if ($dataS['STATUS'] == "pending") {
                    ?>
                       <div class="pt-3 ps-2">
                  <a href="?confirm&ID=<?php echo $dataS['ID'] ?>" class="btn btn-primary">Accept</a>
                  <a href="?decline&ID=<?php echo $dataS['ID'] ?>" class="btn btn-danger">Decline</a>
                  <a href="loans.php" class="btn btn-secondary">Cancel</a>
                  </div>
                    <?php
                  }elseif ($dataS['STATUS'] == "accepted") {
                    ?>
                     <div class="pt-3 ps-2">
                  <a href="?confirm&ID=<?php echo $dataS['ID'] ?>" class="btn btn-primary">Accept</a>
                  <a href="?decline&ID=<?php echo $dataS['ID'] ?>" class="btn btn-danger">Decline</a>
                  <a href="loans.php" class="btn btn-secondary">Cancel</a>
                  </div>
                    <?php
                  }elseif ($dataS['STATUS'] == "active") {
                    ?>
                     <div class="pt-3 ps-2">
                  <a href="loans.php" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#print-agreement">View Agreement</a>
                  <a href="loans.php" class="btn btn-secondary">Cancel</a>
                  </div>
                    <?php
                  }
                 ?>
                  
                </div>
                <div class="col-lg-7">
                  <div class="card-body">
                    <h5 class="card-title">Loan Application Form</h5>
                   <div class=" ps-2">
                   <ul class="nav nav-tabs" id="ex1" role="tablist">
                      <li class="nav-item" role="presentation">
                        <a
                          class="nav-link active"
                          id="ex1-tab-1"
                          data-mdb-toggle="tab"
                          href="#ex1-tabs-1"
                          role="tab"
                          aria-controls="ex1-tabs-1"
                          aria-selected="true"
                          >Personal</a
                        >
                      </li>
                      <li class="nav-item" role="presentation">
                        <a
                          class="nav-link"
                          id="ex1-tab-2"
                          data-mdb-toggle="tab"
                          href="#ex1-tabs-2"
                          role="tab"
                          aria-controls="ex1-tabs-2"
                          aria-selected="false"
                          >Loan</a
                        >
                      </li>
                      <!-- <li class="nav-item" role="presentation">
                        <a
                          class="nav-link"
                          id="ex1-tab-3"
                          data-mdb-toggle="tab"
                          href="#ex1-tabs-3"
                          role="tab"
                          aria-controls="ex1-tabs-3"
                          aria-selected="false"
                          >Tab 3</a
                        >
                      </li> -->
                      <li class="nav-item" role="presentation">
                        <a
                          class="nav-link"
                          id="ex1-tab-3"
                          data-mdb-toggle="tab"
                          href="#ex1-tabs-4"
                          role="tab"
                          aria-controls="ex1-tabs-3"
                          aria-selected="false"
                          >Agreement</a
                        >
                      </li>
                    </ul>
                    <!-- Tabs navs -->
                                      </div>
                                        <div class="pt-3">

                                    <!-- Tabs content -->
                    <div class="tab-content pb-0" id="ex1-content">
                      <div
                        class="tab-pane fade show active"
                        id="ex1-tabs-1"
                        role="tabpanel"
                        aria-labelledby="ex1-tab-1"
                      >
                      <p class="card-text text-capitalize mb-2">name: <?php echo $dataS['LNAME'].", ".$dataS['FNAME']." ".$dataS['MIDDLE'] ?></p>
                                        <p class="card-text text-capitalize mb-1">Age: <?php echo $dataS['AGE'] ?></p>
                                        <p class="card-text text-capitalize mb-1">address: <?php echo $dataS['ADDRESS'] ?></p>
                                        <p class="card-text text-capitalize mb-1">occupation: <?php echo $dataS['OCCUPATION'] ?></p>
                                        <p class="card-text text-capitalize mb-0">Contact number: <?php echo $dataS['PHONE'] ?></p>
                                        <p class="card-text text-capitalize mb-0">email: <?php echo $dataS['EMAIL'] ?></p>
                      </div>            
                      <div class="tab-pane fade" id="ex1-tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">
                                        
                                       
                                        <p class="card-text text-capitalize">loan amount: <?php echo number_format($dataS['AMOUNT'],2) ?></p>
                                        <p class="card-text text-capitalize">Loan used for: <?php echo $dataS['LOAN_USED'] ?></p>
                                        <p class="card-text text-capitalize">Date of Loan: <?php echo date("M d,Y", strtotime($dataS['DATE'])) ?></p>
                      </div>
                      <div class="tab-pane fade" id="ex1-tabs-3" role="tabpanel" aria-labelledby="ex1-tab-3">
                      <p class="card-text text-capitalize">Interest Agreement: <?php echo $dataS['INTEREST'] ?></p>
                                        <?php
                                          if ($dataS['AGREEMENT_1'] != Null) {
                                          ?>
                                          <p class="card-text text-capitalize">First Agreement: <?php echo $dataS['AGREEMENT_1'] ?></p>
                                          <?php
                                          }
                                          if ($dataS['AGREEMENT_2'] != Null) {
                                            ?>
                                          <p class="card-text text-capitalize">Second Agreement: <?php echo $dataS['AGREEMENT_2'] ?></p>
                                            <?php
                                          }
                                          if ($dataS['AGREEMENT_3'] != Null) {
                                            ?>
                                          <p class="card-text text-capitalize">Third Agreement: <?php echo $dataS['AGREEMENT_3'] ?></p>
                                            <?php
                                          }
                                          if ($dataS['AGREEMENT_4'] != Null) {
                                            ?>
                                          <p class="card-text text-capitalize">Fourth Agreement: <?php echo $dataS['AGREEMENT_4'] ?></p>
                                            <?php
                                          }
                                          if ($dataS['AGREEMENT_5'] != Null) {
                                            ?>
                                          <p class="card-text text-capitalize">Fifth Agreement: <?php echo $dataS['AGREEMENT_5'] ?></p>
                                            <?php
                                          }
                                        ?>
                                        </div>
                      </div>

                      <div class="tab-pane fade" id="ex1-tabs-4" role="tabpanel" aria-labelledby="ex1-tab-3">
                      <p class="card-text text-capitalize">Interest Agreement: <?php echo $dataS['INTEREST'] ?></p>
                                        <?php
                                          if ($dataS['AGREEMENT_1'] != Null) {
                                          ?>
                                          <p class="card-text text-capitalize">First Agreement: <?php echo $dataS['AGREEMENT_1'] ?></p>
                                          <?php
                                          }
                                          if ($dataS['AGREEMENT_2'] != Null) {
                                            ?>
                                          <p class="card-text text-capitalize">Second Agreement: <?php echo $dataS['AGREEMENT_2'] ?></p>
                                            <?php
                                          }
                                          if ($dataS['AGREEMENT_3'] != Null) {
                                            ?>
                                          <p class="card-text text-capitalize">Third Agreement: <?php echo $dataS['AGREEMENT_3'] ?></p>
                                            <?php
                                          }
                                          if ($dataS['AGREEMENT_4'] != Null) {
                                            ?>
                                          <p class="card-text text-capitalize">Fourth Agreement: <?php echo $dataS['AGREEMENT_4'] ?></p>
                                            <?php
                                          }
                                          if ($dataS['AGREEMENT_5'] != Null) {
                                            ?>
                                          <p class="card-text text-capitalize">Fifth Agreement: <?php echo $dataS['AGREEMENT_5'] ?></p>
                                            <?php
                                          }
                                        ?>
                                        </div>
                      </div>
                    </div>
                    <!-- Tabs content -->


                   
                    
                   
                    
                    <!-- <p class="card-text">
                      <small class="text-muted">Date Submitted: <?= $dataS['DATE_SUBMITTED']?></small>
                    </p> -->
                  </div>
                </div>
              </div>
            </div>

                </div>

            </div>


         </div>



         <div class="modal fade print" id="print-agreement">
          <div class="modal-dialog modal-lg ">
            <div class="modal-content p-3">
            <div class="modal-header">
                <h5 class="modal-title">Personal Loan Agreement</h5>
            </div>
              <div class="modal-body text-center">
                <p><span class="ps-5">I</span> <span class="text-capitalize"><?php echo $dataS['FNAME']." ".$dataS['MIDDLE']." ".$dataS['LNAME'] ?></span> live in <span><?php echo $dataS['ADDRESS'] ?></span>, and I am in an legal age of <span><?php echo $dataS['AGE'] ?>, </span> borrowed an amount of <span class="text-capitalize"><?php echo $dataS['WORD'] ?>(<?php echo number_format($dataS['AMOUNT'],2) ?>)  </span>and hoping to receive the money on <span><?php echo date("M d,Y", strtotime($dataS['DATE'])) ?></span> </p>
                <p><span class="ps-5">I</span> aggree to pay</p>

                <a href="" id="print-btn">Print</a>
              </div>
            </div>
          </div>
         </div>



<?php 
    require_once './includes/confirm_decline.php';
    require_once'./includes/logout.php';
?>
<script src="../assets/bootstrap/js/bootstrap.bundle.js"></script>
<script src="../assets/js/jq.min.js"></script>
<script type="text/javascript" src="../assets/js/mdb.min.js"></script>
<script type="text/javascript">
$(document).on("click", "#print-btn",function(){
  $(this).hide();
  var css= '<link rel="stylesheet" href="../assets/css/print.css" />';
            var printContent = document.getElementById("print-agreement");

            var WinPrint = window.open('', '', 'width=900,height=650,text-align=center');
            WinPrint.document.write(printContent.innerHTML);
            WinPrint.document.head.innerHTML = css;
            WinPrint.document.close();
            WinPrint.focus();
            WinPrint.print();
            WinPrint.close();
           
})
</script>
</body>
</html>