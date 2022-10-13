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
  $assignementid=$_GET['assignementid'];
  $getallDetails=getAssignementByAssignementId($db,$assignementid);
}
else {
  header('location:./teacher.php');
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

        <div class="modal fade" id="CreatePDF" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Create Assignement</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Assignement Name</label>
                                        <input type="text" class="form-control form-control-lg"
                                            placeholder="Document Name" aria-label="documentName" name="documentName">
                                    </div>
                                    <div class="form-group">
                                      <label for="exampleTextarea1">Assignement Details</label>
                                      <textarea class="form-control" id="exampleTextarea1" placeholder="Document Details" name="details"rows="4"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="createdocument">Create</button>
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
                <a class="nav-link btn btn-success create-new-button" id="createbuttonDropdown" data-toggle="modal" data-target="#CreatePDF">+ Create Assignement</a>
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
              <h3 class="page-title"> Assignement </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="./teacher.php">Teacher</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Rooms</li>
                  <li class="breadcrumb-item active" aria-current="page">Room Id</li>
                  <li class="breadcrumb-item active" aria-current="page">Assignement</li>
                </ol>
              </nav>
            </div>





            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"><?=$getallDetails['name']?></h4>
                  <div class="media">
                    <div class="media-body">
                      <p class="card-text"><?=$getallDetails['details']?></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>






            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Student Uploaded File</h4>
                    <p class="card-description">Room Id <code><?=$roomIdAuto?></code>
                    <p class="card-description">Assignement Id <code><?=$assignementid?></code>
                    </p>
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>Student Name</th>
                            <th>Student Email</th>
                            <th>Uploaded File</th>
                          </tr>
                        </thead>
                        <tbody>

                        <?php
                          $assignement=getAssignementByAssignementUniqueId($db,$assignementid);          
                          foreach($assignement as $assignementGet){
                        ?>


                          <tr>
                            <td><?=$assignementGet['studentName']?></td>
                            <td><?=$assignementGet['studentEmail']?></td>
                            <td> 
                            <button type="button" class="btn btn-info btn-lg" onclick="location.href='<?=$assignementGet['pdf']?>';">
                              <i class="mdi mdi-open-in-app"></i> Open File
                            </button>
                            </td>
                          </tr>

                        <?php
                          }
                        ?>





                        </tbody>
                      </table>
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