<?php
    require('../include/database.php');
    require('../include/function.php');
    if(isset($_POST['LoginInto'])){
      $email=mysqli_real_escape_string($db,$_POST['email']);
      $password=mysqli_real_escape_string($db,$_POST['password']);
      $userType=mysqli_real_escape_string($db,$_POST['userType']);
      $password=md5($password);
      if ($userType == "Student") {
        $query="SELECT * FROM student WHERE email='$email' AND password='$password'";
        $runQuery=mysqli_query($db,$query);
        if(mysqli_num_rows($runQuery)){
            $_SESSION['isUserLoggedIn']=true;
            $_SESSION['email']=$email;
            $_SESSION['usertype']=$userType;
            header('location:../student/student.php');
        }
        else{
            echo"<script>alert('Incorrect email and password !');</script>";
        }
      }
      else if ($userType == "Teacher"){
        $query="SELECT * FROM teacher WHERE email='$email' AND password='$password'";
        $runQuery=mysqli_query($db,$query);
        if(mysqli_num_rows($runQuery)){
            $_SESSION['email']=$email;
            $_SESSION['usertype']=$userType;
            header('location:../teacher/teacher.php');
        }
        else{
            echo"<script>alert('Incorrect email and password !');</script>";
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
    <link rel="stylesheet" href="../assets/">
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
                <h3 class="card-title text-left mb-3">Login</h3>
                <form action="" method="post">
                  <div class="form-group">
                    <label>Email *</label>
                    <input type="text" class="form-control p_input" name="email" required />
                  </div>
                  <div class="form-group">
                    <label>Password *</label>
                    <input type="password" class="form-control p_input" name="password" required />
                  </div>
                  <div class="form-group">
                    <label for="exampleSelectGender">User Type</label>
                    <select class="form-control" id="exampleSelectGender" name="userType">
                      <option value="Teacher">Teacher</option>
                      <option value="Student">Student</option>
                    </select>
                  </div>
                  <div class="form-group d-flex align-items-center justify-content-between">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input"> Remember me </label>
                    </div>
                    <a href="#" class="forgot-pass">Forgot password</a>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block enter-btn" name="LoginInto">Login</button>
                  </div>
                  <div class="d-flex">
                    <button class="btn btn-facebook mr-2 col">
                      <i class="mdi mdi-facebook"></i> Facebook </button>
                    <button class="btn btn-google col">
                      <i class="mdi mdi-google-plus"></i> Google plus </button>
                  </div>
                  <p class="sign-up">Don't have an Account?<a href="./register.php"> Sign Up</a></p>
                </form>
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