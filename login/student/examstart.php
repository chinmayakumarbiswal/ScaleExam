<?php
require('../include/database.php');
require('../include/function.php');
$email=$_SESSION['email'];
$usertype=$_SESSION['usertype'];
if($_SESSION['email'] and $usertype=="Student")
{
  $studentData=getStudentDetails($db,$email);
}
else {
  header('location:../include/logout.php');
}

if ($_GET['room']) {
  $roomIdAuto=$_GET['room'];

  $checkRoom=getRoomDetailsByStudentroomIdAuro($db,$roomIdAuto);
  if ($checkRoom['studentEmail'] == $email) {
    
  }else {
    echo "<script>alert('You are not a valid user of this room.');window.location.href = './student.php';</script>";
  }
  
  $myExamId=$_GET['examid'];
  $checkExamId=getExamIdByRoomID($db,$myExamId);
  if ($checkExamId['roomIdAuto'] == $roomIdAuto) {
    if (isset($_GET['qis'])) {
      $qId=$_GET['qis'];
    }else {
      $qId=1;
    }

    if ($qId==0) {
      $showModal='<script type="text/javascript">message();</script>';
    }else {
      $showModal="";
    }


    $AllQuestion=getQuestionFromQuestionBank($db,$roomIdAuto,$myExamId,$qId);

    $checkNextQ=getQuestionFromQuestionBank($db,$roomIdAuto,$myExamId,$AllQuestion['id']);
    if (!$checkNextQ) {
      $buttomSubmitIs='<button type="submit" class="btn btn-outline-primary btn-icon-text" name="finalQ">Submit Test</button> ';
    }else {
      $buttomSubmitIs='<button type="submit" class="btn btn-outline-primary btn-icon-text" name="nextQ">Next Question</button> ';
    }
  }else {
    echo "<script>alert('You are not a valid user of this exam.');window.location.href = './student.php';</script>";
  }
}
else {
  header('location:./student.php');
}


if($_SESSION['examMark']){

}else {
  $_SESSION['examMark']=0;

}


if(isset($_POST['nextQ'])){
  $selectOption=mysqli_real_escape_string($db,$_POST['andIs']);
  $rightOption=mysqli_real_escape_string($db,$_POST['rightOption']);
  $questionId=mysqli_real_escape_string($db,$_POST['questionId']);


  if ($selectOption == $rightOption) {
    $_SESSION['examMark'] ++ ;
  }

  header('location:./examstart.php?room='.$roomIdAuto.'&examid='.$myExamId.'&qis='.$questionId);
}



if(isset($_POST['finalQ'])){
  $selectOption=mysqli_real_escape_string($db,$_POST['andIs']);
  $rightOption=mysqli_real_escape_string($db,$_POST['rightOption']);
  $questionId=mysqli_real_escape_string($db,$_POST['questionId']);


  if ($selectOption == $rightOption) {
    $_SESSION['examMark'] ++ ;
  }
  $finalMarkIs=$_SESSION['examMark'];

  echo "<script>alert('You mark is".$_SESSION['examMark'].".');</script>";
  $query="INSERT INTO examresult (roomIdAuto,examUniqueId,studentEmail,mark) VALUES('$roomIdAuto','$myExamId','$email','$finalMarkIs')";
  $run=mysqli_query($db,$query) or die(mysqli_error($db));
  if ($run) {
    echo "<script>alert('You exam submit Successfully.');window.location.href = './student.php';</script>";
  }
  else {
    echo "<script>alert('Somthing Wrong re-appear the exam or contact to admin.');window.location.href = './student.php';</script>";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../assets/images/favicon.png" />
  </head>
  <body>
    <!-- Modal -->
    <div class="modal fade" id="warning" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-fullscreen" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Exam Instructions for Candidates</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            ...
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" onclick="FullScreenMode()">Start Exam</button>
          </div>
        </div>
      </div>
    </div>

    
    <div class="container-scroller">
      <!-- partial:../partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" href="./student.php"><img src="../../images/logo.png" alt="logo" /></a>
          <a class="sidebar-brand brand-logo-mini" href="./student.php"><img src="../../images/logo.png" alt="logo" /></a>
        </div>
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">
                  <img class="img-xs rounded-circle " src="../student/image/<?=$studentData['profileimage']?>" alt="">
                  <span class="count bg-success"></span>
                </div>
                <div class="profile-name">
                  <h5 class="mb-0 font-weight-normal"><?=$studentData['name']?></h5>
                  <span>Student</span>
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
            <a class="navbar-brand brand-logo-mini" href="./student.php"><img src="../../images/logo.png" alt="logo" /></a>
          </div>
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
            <ul class="navbar-nav w-100">
              <li class="nav-item w-100">
                <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                  <input type="text" class="form-control" placeholder="Search products">
                </form>
              </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">
             
              

              <li class="nav-item dropdown">
                <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                  <div class="navbar-profile">
                    <img class="img-xs rounded-circle" src="../student/image/<?=$studentData['profileimage']?>" alt="">
                    <p class="mb-0 d-none d-sm-block navbar-profile-name"><?=$studentData['name']?></p>
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

        <form method="POST" action="">
          <div class="content-wrapper">


            <div class="page-header">
              <h3 class="page-title"> Exams </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="./student.php">Student</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Rooms</li>
                  <li class="breadcrumb-item active" aria-current="page">Room Id</li>
                  <li class="breadcrumb-item active" aria-current="page">Exam</li>
                </ol>
              </nav>
            </div>



            <div class="row">

              <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Q. <?=$AllQuestion['question']?> ?</h4>

                    <div class="form-check">
                      <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="andIs" id="andIs" value="a" required> <?=$AllQuestion['option1']?> </label>
                    </div>
                    <div class="form-check">
                      <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="andIs" id="andIs" value="b" required> <?=$AllQuestion['option2']?> </label>
                    </div>
                    <div class="form-check">
                      <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="andIs" id="andIs" value="c" required> <?=$AllQuestion['option3']?> </label>
                    </div>
                    <div class="form-check">
                      <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="andIs" id="andIs" value="d" required> <?=$AllQuestion['option4']?> </label>
                    </div>

                    <input class="form-control" type="hidden" name="rightOption" value="<?=$AllQuestion['ans']?>">
                    <input class="form-control" type="hidden" name="questionId" value="<?=$AllQuestion['id']?>">
                    
                  </div>
                </div>
              </div>


              <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Q. what is aws ?</h4>
                    
                  </div>
                </div>
              </div>

            </div>




            <div class="row">

              <div class="col-md-8">
              </div>

              <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <?=$buttomSubmitIs?>
                  </div>
                </div>
              </div>


            </div>


            
          </div>
        </form>


          <!-- content-wrapper ends -->
          <!-- partial:../partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © scaleexam.in </span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> This is made with ❤️ by <a href="https://chinmayakumarbiswal.in" target="_blank">Chinmaya </a></span>
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
    <script>

      function message(){
        $('#warning').modal('show');
      }
      
      $(window).on('load', function() {
        // $('#warning').modal('show');
      });
       
      
      function FullScreenMode(){
        $('#warning').modal('hide');
        document.documentElement.requestFullscreen()
        
      }  

      // prevent key press 
      $(document).keydown(function (event) {
        // Prevent F12 -
        if (event.keyCode == 123) {
          return false;
        }
        // Prevent F11 fullscreenmode-
        if (event.keyCode == 122) {
          return false;
        }
        // Prevent Ctrl+a = disable select all
        // Prevent Ctrl+u = disable view page source
        // Prevent Ctrl+s = disable save
        // if (event.ctrlKey && (event.keyCode === 85 || event.keyCode === 83 || event.keyCode ===65 )) {
        //   return false;
        // }
        // Prevent Ctrl+Shift+I = disabled debugger console using keys open
        // else if (event.ctrlKey && event.shiftKey && event.keyCode === 73)
        // {
        //   return false;
        // }
      });

      // prevent tab change 
      $(window).blur(function() {
        alert('You are not allowed to leave page ');
        
      });

      // prevent right click
      document.oncontextmenu = function() {
        return false;
      }

      
    </script>
    <?=$showModal?>
  </body>
</html>