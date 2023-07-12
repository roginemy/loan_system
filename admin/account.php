<?php 
	require_once '../includes/config.php';
	$user_id = $_SESSION['admin_id'];
	$select = mysqli_query($conn, "SELECT * FROM users WHERE USER_ID='$user_id'");
	$user_data = mysqli_fetch_assoc($select);


	$loans_select = mysqli_query($conn, "SELECT * FROM loans");

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>LOWNA</title>
	<link rel="stylesheet" type="text/css" href="../assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
	<link rel="stylesheet" href="../assets/css/mdb.min.css" />
	<link rel="stylesheet" type="text/css" href="../assets/fontawesome6/css/all.css">
</head>
<body style="background: #ddd;">

	<div class="">
		<div class="row g-0">
			<div class="col-md-2 bg-primary sticky-top" style="height: 100vh;">
				<!-- Tab navs -->
				<h3 class="text-light p-2 ps-4 fw-bold"><i class="fa-brands fa-slack "></i> LOWNA</h3>
    <div
      class="nav flex-column nav-tabs text-start "
      id="v-tabs-tab"
      role="tablist"
      aria-orientation="vertical"
    >
      <a class="nav-link fs-6 fw-bold" id="v-tabs-home-tab" href="index.php">DASHBOARD</a
      >
      <a class="nav-link fs-6 fw-bold " id="v-tabs-profile-tab " href="loan.php" >LOAN</a
      >
      <a class="nav-link fs-6 fw-bold " id="v-tabs-messages-tab" href="payment.php" >PAYMENT</a
      >
       <a class="nav-link fs-6 fw-bold active" id="v-tabs-messages-tab" href="account.php" >ACCOUNT</a
      >
    </div>
    <!-- Tab navs -->
			</div>
			<div class="col-md-10">
				<!-- Navbar -->
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!-- Container wrapper -->
  <div class="container-fluid">

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse " id="navbarRightAlignExample">
      <!-- Left links -->
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <!-- Navbar dropdown -->
        <li class="nav-item dropdown">
          <div class="dropdown">
        <button
          class="text-reset me-3 dropdown-toggle text-capitalize btn shadow-0 fs-6"
          href="#"
          id="navbarDropdownMenuLink"
          role="button"
          data-bs-toggle="dropdown"
          aria-expanded="false"
        >
          <?php echo $user_data['FNAME'] ?>
        </button>
        <ul
          class="dropdown-menu fade dropdown-menu-end"
          aria-labelledby="navbarDropdownMenuLink"
        >
          <li>
            <a class="dropdown-item" href="#"><i class="fa fa-user"></i> Profile</a>
          </li>
          <li>
            <a class="dropdown-item" href="#"><i class="fa fa-wrench"></i> Settings</a>
          </li>
          <li>
            <a class="dropdown-item" href="../includes/logout.php"><i class="fa fa-sign-out"></i> Logout</a>
          </li>
        </ul>
      </div>
      <!-- Avatar -->
        </li>
      </ul>
      <!-- Left links -->
    </div>
    <!-- Collapsible wrapper -->
  </div>
  <!-- Container wrapper -->
</nav>
				 <div class="col-md-12">
    <!-- Tab content -->
    <div class="tab-content" id="v-tabs-tabContent">

      <div class="tab-pane fade p-4" id="v-tabs-profile" role="tabpanel" aria-labelledby="v-tabs-profile-tab ">
        

      	<div class="card p-3 shadow-6">
      		<table class="table align-middle text-center table-bordered fs-6">
      		<thead>
      			<th scope="col">#</th>
			      <th scope="col">First Name</th>
			      <th scope="col">Last Name</th>
			      <th scope="col">Middle Name</th>
			      <th scope="col">Status</th>
			      <th scope="col" width="5%">Action</th>
      		</thead>

      		<tbody>

      			<?php 
      				while ($data = mysqli_fetch_assoc($loans_select)) {
      					?>
      					 <tr>
							      <th scope="row"><?php echo $data['ID'] ?></th>
							      <td><?php echo $data['FNAME'] ?></td>
							      <td><?php echo $data['LNAME'] ?></td>
							      <td><?php echo $data['MIDDLE'] ?></td>
							      <td >
							      	<?php 
							      	if ($data['STATUS'] == "pending") {
							      		?>
							      		<span class="badge badge-warning p-2"><?php echo $data['STATUS'] ?></span>
							      		<?php
							      	}
							      	 ?>
							      	 </td>
							      
							      <td>
							        <button type="button" class="btn btn-primary" onclick="window.history.replaceState(null, null, '?ID=<?php echo $data['ID'] ?>');">View</button>
							      </td>
							     
							    </tr>
      					<?php
      				}
      			?>
      				
   
      		</tbody>
      	</table>
      	</div>

      </div>




      <div class="tab-pane fade" id="v-tabs-messages" role="tabpanel" aria-labelledby="v-tabs-messages-tab">
        Messages content
      </div>
    </div>
    <!-- Tab content -->
  </div>
	



			</div>
		</div>
	</div>


	<div class="row w-100">
  
 
</div>


<script src="../assets/bootstrap/js/bootstrap.bundle.js"></script>
	<script src="../assets/js/jq.min.js"></script>
	<script type="text/javascript" src="./assets/js/mdb.min.js"></script>
  <script src="../assets/js/sweet.js"></script>

</body>
</html>