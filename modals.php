
<div class="modal fade" id="profile-info">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
        <div class="card" style="max-width: 100%;">
              <div class="row g-0">
                <div class="col-md-5">
                  <img
                    src="./profile_images/<?php echo $user_data['PROFILE_IMG'] ?>"
                    alt="Trendy Pants and Shoes"
                    class="img-fluid rounded-start W-100"
                  />
                </div>
                <div class="col-md-7" style="max-width: 100%;">
                  <div class="card-body ">
                    <h5 class="card-title">Profile Info</h5>
                    <p class="card-text">
                      Name: <?php echo $user_data['FNAME']." ".$user_data['LNAME'] ?>
                    </p>
                     <p class="card-text">
                      Email: <?php echo $user_data['EMAIL']?>
                    </p>
                     <p class="card-text">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </p>
                    <p class="card-text">
                      <small class="text-muted">Account created on <?php echo date("M d,Y", strtotime($user_data['CREATED'])) ?></small>
                    </p>
                    
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>

<form method="post" enctype="multipart/form-data">
<div class="modal fade" id="profile-setting">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
        <div class="card" style="max-width: 100%;">
              <div class="row g-0">
                <div class="col-md-5">
                  <img
                    src="./profile_images/<?php echo $user_data['PROFILE_IMG'] ?>"
                    alt="Trendy Pants and Shoes"
                    class="img-fluid rounded-start w-100 mb-2"
                  />
                 <div class="me-2 ms-2">
                     <input type="file" name="profile_img" class="form-control" >
                     <input type="hidden" name="old_image" value="<?php echo $user_data['PROFILE_IMG'] ?>">
                 </div>
                </div>
                <div class="col-md-7" style="max-width: 100%;">
                  <div class="card-body ">
                    <h5 class="card-title">Account Setting</h5>
                    <p class="card-text">
                      First Name <input type="text" class="form-control" name="fname" value="<?php echo $user_data['FNAME']?>">
                    </p>
                    <p class="card-text">
                      Last Name <input type="text" class="form-control" name="lname" value="<?php echo $user_data['LNAME']?>">
                    </p>
                     <p class="card-text">
                      Email: <input type="email" class="form-control" name="email" value="<?php echo $user_data['EMAIL']?>">
                    </p>
                     <p class="card-text">
                      Password: <input type="password" class="form-control" name="password" placeholder="Password (minimum: 8)" minlength="8" value="<?php echo $user_data['PASSWORD'] ?>">
                    </p>
                     <p class="card-text">
                      <button type="submit" class="btn btn-primary" name="update_account">Update</button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </p>
                    <p class="card-text">
                      <small class="text-muted">Account created on <?php echo date("M d,Y", strtotime($user_data['CREATED'])) ?></small>
                    </p>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
</form>

<!-- LOAN MODAL -->
<div class="modal fade" id="loan-now">
  <div class="modal-dialog modal-lg">
    <div class="modal-content p-3">
      <div class="modal-header mb-3">
        <h4>Loan Application Form</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" enctype="multipart/form-data">
  <!-- 2 column grid layout with text inputs for the first and last names -->
  <div class="row mb-4">
    <label>Name</label>
    <div class="col">
      <div class="form-outline">
        <input type="text" name="lname" id="form6Example1" class="form-control" required/>
        <label class="form-label" for="form6Example1">Last</label>
      </div>
    </div>
    <div class="col">
      <div class="form-outline">
        <input type="text" id="form6Example2" name="fname" class="form-control" required/>
        <label class="form-label" for="form6Example2">First</label>
      </div>
    </div>
    <div class="col">
      <div class="form-outline">
        <input type="text" id="form6Example2" name="middle" class="form-control" required/>
        <label class="form-label" for="form6Example2">Middle</label>
      </div>
    </div>
  </div>

   <div class="row mb-4">
    <div class="col">
      <div class="form-outline">
        <input type="text" name="address" id="form6Example1" class="form-control" required/>
        <label class="form-label" for="form6Example1">Age</label>
      </div>
    </div>
    <div class="col">
      <div class="form-outline">
        <input type="text" id="form6Example2" name="address" class="form-control" required/>
        <label class="form-label" for="form6Example2">Address</label>
      </div>
    </div>
  </div>

  <!-- Text input -->
  <div class="form-outline mb-4">
    <input type="text" name="occupation" id="form6Example3" class="form-control" required/>
    <label class="form-label" for="form6Example3">Occupation</label>
  </div>

  <!-- Text input -->
  <div class="form-outline mb-4">
    <input type="tel" id="form6Example4" name="phone" class="form-control" minlength="11" required/>
    <label class="form-label" for="form6Example4">Phone Number</label>
  </div>

  <!-- Email input -->
  <div class="form-outline mb-4">
    <input type="email" name="email" id="form6Example5" class="form-control" required/>
    <label class="form-label" for="form6Example5">Email</label>
  </div>


   <div class="row mb-4">
     <label>Loan </label>
    <div class="col">
      <div class="form-outline">
        <input type="text" name="amount" id="form6Example1" class="form-control" required />
        <label class="form-label" for="form6Example1">Amount</label>
      </div>
    </div>
    <div class="col-lg col-4">
      <div class="form-outline">
        <input type="text" id="form6Example2" name="amountWord" class="form-control" required/>
        <label class="form-label" for="form6Example2">Amount in words</label>
      </div>
    </div>

    <div class="col">
      <div class="form-outline">
        <input type="date" id="form6Example2" name="dateLoan" class="form-control" min="<?php echo date("Y-m-d") ?>" required/>
        <label class="form-label" for="form6Example2">Date of loan</label>
      </div>
    </div>
  </div>

     <div class="row mb-4 align-items-center g-lg-0 g-3">
     <label>Loan will be used for</label>
    <div class="col-lg col-6">
      <div class="form-outline">
        <div class="form-outline">
        <input type="radio" id="form6Example2" name="moneyUsed" class="form-check-input" value="business launch" onclick="radio(1)" />
        <label>Business Launch</label>
      </div>
      </div>
    </div>

    <div class="col-lg col-6">
      <div class="form-outline">
        <div class="form-outline">
        <input type="radio" id="form6Example2" name="moneyUsed" class="form-check-input" value="House Buying" onclick="radio(1)" />
        <label>House Buying</label>
      </div>
      </div>
    </div>

    <div class="col-lg col-6">
      <div class="form-outline">
        <div class="form-outline">
        <input type="radio" id="form6Example2" name="moneyUsed" class="form-check-input" value="Home Improvement" onclick="radio(1)"/>
        <label>Home Improvement</label>
      </div>
      </div>
    </div>

     <div class="col">
      <div class="form-outline">
        <div class="form-outline">
        <input type="radio" id="form6Example2" name="moneyUsed" class="form-check-input" value="Investment" onclick="radio(1)" />
        <label>Investment</label>
      </div>
      </div>
    </div>

  </div>

  <div>
    <div class="row mb-4 align-items-center">
    <div class="col-lg-3 col-6">
      <div class="form-outline">
        <div class="form-outline">
        <input type="radio" id="form6Example2" name="moneyUsed" class="form-check-input" value="education" onclick="radio(1)" />
        <label>Education</label>
      </div>
      </div>
    </div>

    <div class="col-lg-2 col-6 ps-lg ps-2">
      <div class="form-outline">
        <div class="form-outline">
        <input type="radio" id="form6Example2" name="moneyUsed" class="form-check-input" onclick="radio(0)" value="other" />
        <label>Other</label>
      </div>
      </div>
    </div>

     <div class="col">
      <div class="form-outline input-other d-none">
        <input type="text" name="moneyUsedOther" id="form6Example1" class="form-control"/>
        <label class="form-label" for="form6Example1">Please type another option here</label>
      </div>
    </div>
  </div>
  </div>

  <div class=" mb-4 me-auto ms-auto" style="width: 200px;">
    <img src="./assets/img/blank-profile-picture-gc9ef29940_1280.png" width="100%" />
  </div>

   <div class="form-outline mb-4">
    <input type="file" id="form6Example4" name="validID" class="form-control" required />
  </div>

  <?php 
    if ($loan_data['agreement_1'] != "") {
        ?>
        <!-- Checkbox -->
      <div class="form-check d-flex justify-content-start mb-4">
        <input class="form-check-input me-2" type="checkbox" value="Agree" id="form6Example8" name="agreement1" checked required />
        <label class="form-check-label" for="form6Example8"> <?php echo $loan_data['agreement_1'] ?> </label>
      </div>
        <?php
    }

    if ($loan_data['agreement_2'] != "") {
        ?>
        <!-- Checkbox -->
      <div class="form-check d-flex justify-content-start mb-4">
        <input class="form-check-input me-2" type="checkbox" value="Agree" id="form6Example8" name="agreement2" required />
        <label class="form-check-label" for="form6Example8"> <?php echo $loan_data['agreement_2'] ?> </label>
      </div>
        <?php
    }

     if ($loan_data['agreement_3'] != "") {
        ?>
        <!-- Checkbox -->
      <div class="form-check d-flex justify-content-start mb-4">
        <input class="form-check-input me-2" type="checkbox" value="Agree" id="form6Example8" name="agreement3" required />
        <label class="form-check-label" for="form6Example8"> <?php echo $loan_data['agreement_3'] ?> </label>
      </div>
        <?php
    }
     if ($loan_data['agreement_4'] != "") {
        ?>
        <!-- Checkbox -->
      <div class="form-check d-flex justify-content-start mb-4">
        <input class="form-check-input me-2" type="checkbox" value="Agree" id="form6Example8" name="agreement4" required />
        <label class="form-check-label" for="form6Example8"> <?php echo $loan_data['agreement_4'] ?> </label>
      </div>
        <?php
    }
     if ($loan_data['agreement_5'] != "") {
        ?>
        <!-- Checkbox -->
      <div class="form-check d-flex justify-content-start mb-4">
        <input class="form-check-input me-2" type="checkbox" value="Agree" id="form6Example8" name="agreement5" required />
        <label class="form-check-label" for="form6Example8"> <?php echo $loan_data['agreement_5'] ?> </label>
      </div>
        <?php
    }
  ?>

  <div class="form-check d-flex justify-content-start mb-4">
        <input class="form-check-input me-2" type="checkbox" value="Agree" id="form6Example8" name="interest" required />
        <label class="form-check-label" for="form6Example8"> I agree to the <?php echo round((float)$loan_data['interest'] * 100) ?>% loan interest </label>
      </div>

  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-4" name="submit">Submit</button>
</form>
    </div>
  </div>
</div>


<!-- DECIDE MODAL -->
<div class="modal fade" id="decide-loan">
  <div class="modal-dialog modal-dialog-centered">
   <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Activate your loan?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        You won't be able to revert this!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="confirm()">Yes</button>
        <button type="button" class="btn btn-danger" onclick="cancel()">Cancel Loan</button>

      </div>
    </div>
  </div>
</div>


<!-- SIGNUP/LOGIN MODAL -->
<div class="modal fade" id="modal-login" style="z-index: 3000;">
            <div class="modal-dialog modal-md">
                <div class="modal-content p-4">

                    <div class="modal-header p-0">
                        <h2 class="modal-title">Account</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Pills navs -->
                    <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link " id="tab-login" data-mdb-toggle="pill" href="#pills-login" role="tab" aria-controls="pills-login" aria-selected="true">Login</a
    >
  </li>
  <li class="nav-item" role="presentation">
    <a
      class="nav-link active"
      id="tab-register"
      data-mdb-toggle="pill"
      href="#pills-register"
      role="tab"
      aria-controls="pills-register"
      aria-selected="false"
      >Register</a
    >
  </li>
</ul>
<!-- Pills navs -->

<!-- Pills content -->
<div class="tab-content">
  <div class="tab-pane fade  " id="pills-login" role="tabpanel" aria-labelledby="tab-login">
    <form method="post" >
     
      <!-- Email input -->
      <div class="form-outline mb-4">
        <i class="fas fa-envelope trailing"></i>
        <input type="email" id="loginName" class="form-control form-icon-trailing" name="email" />
        <label class="form-label" for="loginName">Email or username</label>
      </div>

      <!-- Password input -->
      <div class="form-outline mb-4">
         <i class="fas fa-lock trailing"></i>
        <input type="password" id="loginPassword" class="form-control form-icon-trailing" name="password" />
        <label class="form-label" for="loginPassword">Password</label>
      </div>

      <!-- 2 column grid layout -->
      <div class="row mb-4">
        <div class="col-md-6 d-flex justify-content-center">
          <!-- Checkbox -->
          <div class="form-check mb-3 mb-md-0">
            <input class="form-check-input" type="checkbox" value="" id="loginCheck"  checked />
            <label class="form-check-label" for="loginCheck"> Remember me </label>
          </div>
        </div>

        <div class="col-md-6 d-flex justify-content-center">
          <!-- Simple link -->
          <a href="#!">Forgot password?</a>
                </div>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4" name="login">Sign in</button>

            <!-- Register buttons -->
    </form>
    </div>
    <div class="tab-pane fade active show" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
        <form method="post" enctype="multipart/form-data">
            <div class="text-center mb-3">
                <div class="text-center mb-3" style="width: 150px; height: 150px; margin: 0 auto 0 auto;">
                    <img src="./assets/img/blank-profile-picture-gc9ef29940_1280.png" class="rounded-circle w-100 h-100" alt="Black and White Portrait of a Man" loading="lazy" />

                </div>

                <div class="form-outline mb-4">
                    <input type="file" id="registerName" class="form-control" name="profile" required />
                </div>

                <!-- Name input -->
                <div class="form-outline mb-4">
                    <input type="text" id="registerName" class="form-control" name="fname" required />
                    <label class="form-label" for="registerName">First Name</label>
                </div>

                <div class="form-outline mb-4">
                    <input type="text" id="registerName" class="form-control" name="lname" required />
                    <label class="form-label" for="registerName">Last Name</label>
                </div>

                <!-- Email input -->
                <div class="form-outline mb-4">
                    <input type="email" id="registerEmail" class="form-control" name="email" required />
                    <label class="form-label" for="registerEmail">Email</label>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <input type="password" id="registerPassword" class="form-control" name="password" minlength="8" required />
                    <label class="form-label" for="registerPassword">Password</label>
                </div>

                <!-- Repeat Password input -->
                <div class="form-outline mb-4">
                    <input type="password" id="registerRepeatPassword" class="form-control" name="confirmPass" minlength="8" required />
                    <label class="form-label" for="registerRepeatPassword">Repeat password</label>
                </div>

                <!-- Checkbox -->

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-3" name="signup">Create</button>
        </form>
    </div>


    
