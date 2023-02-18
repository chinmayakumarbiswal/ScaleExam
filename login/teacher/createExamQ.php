<?php
require('../include/database.php');
require('../include/function.php');
$email=$_SESSION['email'];
$usertype=$_SESSION['usertype'];
if($_SESSION['email'] and $usertype=="Teacher")
{
  $teacherData=getTeacherDetails($db,$email);
}
else {
  header('location:../include/logout.php');
}

if ($_GET['room']) {
  $roomIdAuto=$_GET['room'];
  $checkRoom=getRoomDetailsByStudent($db,$roomIdAuto);
  if ($checkRoom['teacherEmail'] == $email) {
    
  }else {
    echo "<script>alert('You are not a valid user of this room.');window.location.href = './teacher.php';</script>";
  }
}
else {
  header('location:./teacher.php');
}

if(isset($_POST['createExam']))
{
  $examName= mysqli_real_escape_string($db,$_POST['examName']);
  $examdetails= mysqli_real_escape_string($db,$_POST['details']);
  $examDate= mysqli_real_escape_string($db,$_POST['examDate']);
  $examStartTime= mysqli_real_escape_string($db,$_POST['examStartTime']);
  $examEndTime= mysqli_real_escape_string($db,$_POST['examEndTime']);
  $examUniqueId=randPass().$roomIdAuto;
  $teacherEmail= $teacherData['email'];

  $query="INSERT INTO exam (examName,examdetails,examDate,examStartTime,examEndTime,examUniqueId,teacherEmail) VALUES('$examName','$examdetails','$examDate','$examStartTime','$examEndTime','$examUniqueId','$teacherEmail')";
  $run=mysqli_query($db,$query) or die(mysqli_error($db));
  if ($run) {
    header('location:./assignement.php?room='.$roomIdAuto);
  }
  else {
    echo "inserted error";
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
    <!-- End Plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../assets/images/favicon.png" />
  </head>
  <body>

    <!-- Modal -->
    <form action="" method="post" enctype="multipart/form-data">

      <div class="modal fade" id="CreateEXAM" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
          aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Create Exam</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <div class="col-md-12 grid-margin stretch-card">
                          <div class="card">
                              <div class="card-body">
                                  <div class="form-group">
                                      <label>Exam Name</label>
                                      <input type="text" class="form-control form-control-lg"
                                          placeholder="Exam Name" aria-label="documentName" name="examName">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleTextarea1">Exam Details</label>
                                    <textarea class="form-control" id="exampleTextarea1" placeholder="Exam Details" name="details"rows="4"></textarea>
                                  </div>
                                  <div class="form-group">
                                      <label>Exam Date</label>
                                      <input type="date" class="form-control form-control-lg" aria-label="documentName" name="examDate">
                                  </div>
                                  <div class="form-group">
                                      <label>Exam Start Time</label>
                                      <input type="time" class="form-control form-control-lg" aria-label="documentName" name="examStartTime">
                                  </div>
                                  <div class="form-group">
                                      <label>Exam End Time</label>
                                      <input type="time" class="form-control form-control-lg" aria-label="documentName" name="examEndTime">
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary" name="createExam">Create</button>
                  </div>
              </div>
          </div>
      </div>
    </form>


    <div class="container-scroller">
      <!-- partial:../partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" href="./teacher.php"><img src="../../images/logo.png" alt="logo" /></a>
          <a class="sidebar-brand brand-logo-mini" href="./teacher.php"><img src="../../images/logo.png" alt="logo" /></a>
        </div>
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">
                  <img class="img-xs rounded-circle " src="../teacher/image/<?=$teacherData['profileimage']?>" alt="">
                  <span class="count bg-success"></span>
                </div>
                <div class="profile-name">
                  <h5 class="mb-0 font-weight-normal"><?=$teacherData['name']?></h5>
                  <span>Teacher</span>
                </div>
              </div>
              <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
              <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-settings text-primary"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-onepassword  text-info"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                  </div>
                </a>
                
              </div>
            </div>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="./room.php">
              <span class="menu-icon">
                <i class="mdi mdi-glassdoor"></i>
              </span>
              <span class="menu-title">Rooms</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="./exam.php">
              <span class="menu-icon">
                <i class="mdi mdi-border-color"></i>
              </span>
              <span class="menu-title">Exam</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="./assignement.php">
              <span class="menu-icon">
                <i class="mdi mdi-book-open-page-variant"></i>
              </span>
              <span class="menu-title">Assignement</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="./document.php">
              <span class="menu-icon">
                <i class="mdi mdi-library"></i>
              </span>
              <span class="menu-title">Documents</span>
            </a>
          </li>

        </ul>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
          <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini" href="./teacher.php"><img src="../../images/logo.png" alt="logo" /></a>
          </div>
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
            
            <ul class="navbar-nav navbar-nav-right">
              <li class="nav-item dropdown d-none d-lg-block">
                <a class="nav-link btn btn-success create-new-button" id="createbuttonDropdown" data-toggle="modal" aria-expanded="false" href="#CreateEXAM">+ Create Exam</a>
              </li>
              

              <li class="nav-item dropdown">
                <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                  <div class="navbar-profile">
                    <img class="img-xs rounded-circle" src="../teacher/image/<?=$teacherData['profileimage']?>" alt="">
                    <p class="mb-0 d-none d-sm-block navbar-profile-name"><?=$teacherData['name']?></p>
                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                  <h6 class="p-3 mb-0">Profile</h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-settings text-success"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Account Settings</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item" href="../include/logout.php">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-logout text-danger"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Log out</p>
                    </div>
                  </a>
                </div>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-format-line-spacing"></span>
            </button>
          </div>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">


            <div class="page-header">
              <h3 class="page-title"> Exams </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="./teacher.php">Teacher</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Rooms</li>
                  <li class="breadcrumb-item active" aria-current="page">Room Id</li>
                  <li class="breadcrumb-item active" aria-current="page">Exam</li>
                </ol>
              </nav>
            </div>


            <div class="row">


              
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Test 1</h4>
                    <p class="card-description">Room Id <code>55454545</code></p>
                    <div class="template-demo">
                      <button type="button" class="btn btn-outline-primary btn-icon-text" onclick="location.href='https://google.com';">
                        <i class="mdi mdi-open-in-new"></i> Open Exam 
                      </button> 
                    </div>
                  </div>
                </div>
              </div>







            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © scaleexam.in </span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> This is made with ❤️ by <a href="https://chinmayakumarbiswal.in/" target="_blank">Chinmaya </a></span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
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
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
  </body>
</html>