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
  $examid=$_GET['examid'];
  $getallExamDetails=getExamByExamId($db,$examid);
  if ($getallExamDetails['roomIdAuto'] == $roomIdAuto) {
    
  }else {
    echo "<script>alert('This exam is created by another user.');window.location.href = './teacher.php';</script>";
  }
}
else {
  header('location:./teacher.php');
}

if(isset($_POST['addquestion']))
{
  $question= mysqli_real_escape_string($db,$_POST['question']);
  $option1= mysqli_real_escape_string($db,$_POST['option1']);
  $option2= mysqli_real_escape_string($db,$_POST['option2']);
  $option3= mysqli_real_escape_string($db,$_POST['option3']);
  $option4= mysqli_real_escape_string($db,$_POST['option4']);
  $ans= mysqli_real_escape_string($db,$_POST['ans']);
  

  $query="INSERT INTO questionbank (roomIdAuto,examUniqueId,question,option1,option2,option3,option4,ans) VALUES('$roomIdAuto','$examid','$question','$option1','$option2','$option3','$option4','$ans')";
  $run=mysqli_query($db,$query) or die(mysqli_error($db));
  if ($run) {
    header('location:./createExamQ.php?room='.$roomIdAuto.'&examid='.$examid);
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
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../assets/images/favicon.png" />
  </head>
  <body>
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


              
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  <form action="" method="post">
                    <div class="form-group">
                      <label>Question</label>
                      <input type="text" class="form-control p_input" name="question" required />
                    </div>

                    <div class="form-group">
                      <label>Option 1</label>
                      <input type="text" class="form-control p_input" name="option1" required />
                    </div>
                    <div class="form-group">
                      <label>Option 2</label>
                      <input type="text" class="form-control p_input" name="option2" required />
                    </div>
                    <div class="form-group">
                      <label>Option 3</label>
                      <input type="text" class="form-control p_input" name="option3" required />
                    </div>
                    <div class="form-group">
                      <label>Option 4</label>
                      <input type="text" class="form-control p_input" name="option4" required />
                    </div>

                    <div class="form-group">
                      <label for="exampleSelectAnsware">Correct Answare Is</label>
                      <select class="form-control" id="exampleSelectGender" name="ans">
                        <option value="a">Option 1</option>
                        <option value="b">Option 2</option>
                        <option value="c">Option 3</option>
                        <option value="d">Option 4</option>
                      </select>
                    </div>

                    <button type="submit" class="btn btn-outline-primary btn-icon-text" name="addquestion">
                      Add Question 
                    </button> 
                  <form>
                    
                  </div>
                </div>
              </div>



              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h3>Question</h3>
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>Sl No</th>
                            <th>Question</th>
                            <th>Option1</th>
                            <th>Option2</th>
                            <th>Option3</th>
                            <th>Option4</th>
                            <th>Answer</th>
                          </tr>
                        </thead>
                        <tbody>

                        <?php
                          $allQuestion=getExamThroughUniqueId($db,$roomIdAuto,$examid);
                          $count=1;          
                          foreach($allQuestion as $allQuestions){
                        ?>

                          <tr>
                            <td><?=$count?></td>
                            <td><?=$allQuestions['question']?></td>
                            <td><?=$allQuestions['option1']?></td>
                            <td><?=$allQuestions['option2']?></td>
                            <td><?=$allQuestions['option3']?></td>
                            <td><?=$allQuestions['option4']?></td>
                            <td><?=$allQuestions['ans']?></td>
                          </tr>

                        <?php
                          $count++;
                          }
                        ?>

                        </tbody>
                      </table>
                    </div>

                  </div>
                </div>
              </div>





              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h3>Result</h3>
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>Sl No</th>
                            <th>Name Of Student</th>
                            <th>Email Of Student</th>
                            <th>Total Mark</th>
                            <th>Student Mark</th>
                            
                          </tr>
                        </thead>
                        <tbody>

                        <?php
                          $allResult=getExamResult($db,$roomIdAuto,$examid);
                          $countResult=1;          
                          foreach($allResult as $allResults){
                            $getEachStudentdata=getStudentDetails($db,$allResults['studentEmail']);
                        ?>

                          <tr>
                            <td><?=$countResult?></td>
                            <td><?=$getEachStudentdata['name']?></td>
                            <td><?=$allResults['studentEmail']?></td>
                            <td><?=$count-1?></td>
                            <td><?=$allResults['mark']?></td>
                          </tr>

                        <?php
                          $countResult++;
                          }
                        ?>

                        </tbody>
                      </table>
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