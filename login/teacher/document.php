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

if(isset($_POST['createdocument']))
{
 $doucumentname= mysqli_real_escape_string($db,$_POST['documentName']);
 $filename=$_FILES['upload']['name'];
 $filelocation=$_FILES['upload']['tmp_name'];
 $filestype=$_FILES['upload']['type'];
 $filename=date('d-m-Y-H-i').$filename;
 if ($filestype == "application/pdf" ) {
    if(move_uploaded_file($filelocation,"../alldocuments/$filename"))
    {
    $query="INSERT INTO documentlog (roomIdAuto,teachersEmail,documentName,filename) VALUES('$roomIdAuto','$email','$doucumentname','$filename')";
        $run=mysqli_query($db,$query) or die(mysqli_error($db));
        if ($run) {
        echo "<script>alert('You successfully upload your document.');window.location.href = './document.php?room=".$roomIdAuto."';</script>";
        }
        else {
            echo "<script>alert('Somthing wrong.');</script>";
        }
    }
 }else {
    echo "<script>alert('Please upload only in PDF format.');</script>";
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
    <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../assets/css/style.css">
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
                        <h5 class="modal-title" id="exampleModalLongTitle">Create Document</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Document Name</label>
                                        <input type="text" class="form-control form-control-lg"
                                            placeholder="Document Name" aria-label="documentName" name="documentName">
                                    </div>
                                    <div class="form-group">
                                        <label>Upload Document</label>
                                        <input type="file" class="form-control form-control-lg" name="upload" accept="application/pdf,application/msword" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="createdocument">Upload</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="container-scroller">
        <!-- partial:../partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
                <a class="sidebar-brand brand-logo" href="./teacher.php"><img src="../../images/logo.png"
                        alt="logo" /></a>
                <a class="sidebar-brand brand-logo-mini" href="./teacher.php"><img src="../../images/logo.png"
                        alt="logo" /></a>
            </div>
            <ul class="nav">
                <li class="nav-item profile">
                    <div class="profile-desc">
                        <div class="profile-pic">
                            <div class="count-indicator">
                                <img class="img-xs rounded-circle "
                                    src="../teacher/image/<?=$teacherData['profileimage']?>" alt="">
                                <span class="count bg-success"></span>
                            </div>
                            <div class="profile-name">
                                <h5 class="mb-0 font-weight-normal"><?=$teacherData['name']?></h5>
                                <span>Teacher</span>
                            </div>
                        </div>
                        <a href="#" id="profile-dropdown" data-toggle="dropdown"><i
                                class="mdi mdi-dots-vertical"></i></a>
                        <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list"
                            aria-labelledby="profile-dropdown">
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
                    <a class="navbar-brand brand-logo-mini" href="./teacher.php"><img src="../../images/logo.png"
                            alt="logo" /></a>
                </div>
                <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                        data-toggle="minimize">
                        <span class="mdi mdi-menu"></span>
                    </button>
                    <ul class="navbar-nav w-100">
                        <li class="nav-item w-100">
                            <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                            </form>
                        </li>
                    </ul>
                    <ul class="navbar-nav navbar-nav-right">
                        <li class="nav-item dropdown d-none d-lg-block">
                            <a class="nav-link btn btn-success create-new-button" data-toggle="modal"
                                data-target="#CreatePDF">+ Create Document</a>
                        </li>


                        <li class="nav-item dropdown">
                            <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                                <div class="navbar-profile">
                                    <img class="img-xs rounded-circle"
                                        src="../teacher/image/<?=$teacherData['profileimage']?>" alt="">
                                    <p class="mb-0 d-none d-sm-block navbar-profile-name"><?=$teacherData['name']?></p>
                                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                                aria-labelledby="profileDropdown">
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
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                        data-toggle="offcanvas">
                        <span class="mdi mdi-format-line-spacing"></span>
                    </button>
                </div>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">


                    <div class="page-header">
                        <h3 class="page-title"> Document </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="./teacher.php">Teacher</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Rooms</li>
                                <li class="breadcrumb-item active" aria-current="page">Room Id</li>
                                <li class="breadcrumb-item active" aria-current="page">Document</li>
                            </ol>
                        </nav>
                    </div>


                    <div class="row">


                        <?php
                          $documents=getAllDocuments($db,$roomIdAuto);          
                          foreach($documents as $documentGet){
                        ?>

                        <div class="col-md-4 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title"><?=$documentGet['documentName']?></h4>
                                    <p class="card-description">Room Id <code><?=$documentGet['roomIdAuto']?></code></p>
                                    <div class="template-demo">
                                        <button type="button" class="btn btn-outline-primary btn-icon-text"
                                            onclick="window.open('../alldocuments/<?=$documentGet['filename']?>', '_blank');">
                                            <i class="mdi mdi-open-in-new"></i> Open Document
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                          }
                        ?>







                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:../partials/_footer.html -->
                <?php
                    include_once('../include/footer.php')
                ?>
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