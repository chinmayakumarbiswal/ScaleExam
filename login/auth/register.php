<?php
require('../include/database.php');
require('../include/function.php');
if(isset($_POST['createu'])){
	$name=mysqli_real_escape_string($db,$_POST['name']);
  $email=mysqli_real_escape_string($db,$_POST['email']);
  $useras=mysqli_real_escape_string($db,$_POST['userAs']);
  $bio=mysqli_real_escape_string($db,$_POST['bio']);
  $password=mysqli_real_escape_string($db,$_POST['password']);

  $image_name=$_FILES['imageupload']['name'];
  $image_tmp=$_FILES['imageupload']['tmp_name'];

  // echo $name."<br><br>";
  // echo $email."<br><br>";
  // echo $useras."<br><br>";
  // echo $bio."<br><br>";
  // echo $image_name."<br><br>";
  // echo $image_tmp."<br><br>";
  // echo $password."<br><br>";


  if ($useras == "Teacher") {
    $query="SELECT * FROM teacher WHERE email='$email'";
    $runQuery=mysqli_query($db,$query);
    if(mysqli_num_rows($runQuery)){
      ?>
        <script>
          alert("Dear teacher you aleardy have an account.");
        </script>
      <?php
    }
    else {
      if(move_uploaded_file($image_tmp,"../teacher/image/$image_name")){
        $query="INSERT INTO teacher (name,email,bio,profileimage,password) VALUES('$name','$email','$bio','$image_name','$password')";
        $run=mysqli_query($db,$query) or die(mysqli_error($db));
        if ($run) {
            header('location:./login.php');
        }
        else {
            echo "inserted error";
        }
      }
    }
  }
  else if ($useras == "Student") {
    $query="SELECT * FROM student WHERE email='$email'";
    $runQuery=mysqli_query($db,$query);
    if(mysqli_num_rows($runQuery)){
      ?>
        <script>
          alert("Dear student you aleardy have an account.");
        </script>
      <?php
    }
    else {
      if(move_uploaded_file($image_tmp,"../student/image/$image_name")){
        $query="INSERT INTO student (name,email,bio,profileimage,password) VALUES('$name','$email','$bio','$image_name','$password')";
        $run=mysqli_query($db,$query) or die(mysqli_error($db));
        if ($run) {
            header('location:./login.php');
        }
        else {
            echo "inserted error";
        }
      }
    }

  }
	  
	
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ScaleExam</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Register</h3>
                <form method="post" action="" class="reg-page" enctype="multipart/form-data">
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control p_input" name="name" required />
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control p_input" name="email" required />
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 col-form-label">Create User As</label>
                    <div class="col-sm-4">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="userAs" value="Teacher" > Teacher </label>
                      </div>
                    </div>
                    <div class="col-sm-5">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="userAs" value="Student" checked> Student </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleTextarea1">Bio</label>
                    <textarea class="form-control" id="exampleTextarea1" rows="4" name="bio"></textarea>
                  </div>
                  <div class="form-group">
                    <label>Profile Image</label>
                    <input class="form-control p_input" type="file" id="formFile" name="imageupload" accept="image/* " required>
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control p_input" name="password" required />
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block enter-btn" name="createu">Register</button>
                  </div>
                  <p class="sign-up text-center">Already have an Account?<a href="./login.php"> Log In</a></p>
                  <p class="terms">By creating an account you are accepting our<a href="./login.php"> Terms & Conditions</a></p>
                </form>
              </div>
            </div>
          </div>
        </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../assets/js/off-canvas.js"></script>
    <script src="../assets/js/hoverable-collapse.js"></script>
    <script src="../assets/js/misc.js"></script>
    <script src="../assets/js/settings.js"></script>
    <script src="../assets/js/todolist.js"></script>
    <!-- endinject -->
  </body>
</html>