<?php 
	require_once './includes/config.php';
	

	@$user_id = $_SESSION['user_id'];

	$select = "SELECT * FROM loans WHERE USER_ID='$user_id'";
	$result = mysqli_query($conn, $select);

      $select_user = mysqli_query($conn, "SELECT * FROM USERS WHERE USER_ID='$user_id'");
      $user_data = mysqli_fetch_assoc($select_user);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" type="text/css" href="./assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./assets/css/style.css">
	<link rel="stylesheet" href="./assets/css/mdb.min.css" />
	<link rel="stylesheet" type="text/css" href="./assets/fontawesome6/css/all.css">
  <script src="./assets/js/sweet.js"></script>
  <title>LOWNA</title>
</head>
<body onscroll="myFunction()" onload="window.scrollTo(0, 0);">


<main style="height: 100vh; background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(./assets/img/startup-g3751c17c9_1280.jpg); background-repeat: no-repeat; background-size: cover;" class="d-flex justify-content-center align-items-center">
<!-- Navbar -->
<div class="position-absolute top-0 w-100" id="navbar">
    <nav class="navbar navbar-expand-lg navbar-light shadow-0">
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
                        <a class="nav-link  text-light active" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="loan.php">Loan</a>
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
                        <a class="nav-link  text-light active" href="index.php">Home</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link text-light" href="loan.php">Loan</a>
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
    <!-- Navbar -->
    </div>


			<!-- Tabs content -->
    <!-- Start your project here-->
    <div class="text-center" style="width: 40%;">
    
      <?php 
      if (isset($user_id)) {
          ?>
        <h1 class="text-light fw-bold mb-3">Manage your loan now</h1>
      <p class="text-light">Cloud based Loan Management Software that is secure and easy to use. Developed specially for the loan management industry.</p>
          <a href="loan.php" class="btn btn-primary mt-3 text-capitalize fs-6 fw-bold"><i class="fa fa-list"></i> Manage Loan </a>
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


<?php
    require_once 'modals.php'; 
    require_once './includes/signup_proc.php';
    require_once './includes/login_proc.php';
    require_once './includes/update_account.php';
    require_once'./includes/logout.php';
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
  
  </script>

  

</body>
</html>