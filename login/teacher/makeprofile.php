<?php
    require('../include/database.php');
    $email=$_GET['email'];
    $profile=$_GET['profile'];

    $query="UPDATE `teacher` SET `public`='$profile' WHERE email='$email'";
    $testset=mysqli_query($db,$query);
    echo "<script>alert('Your profile now ".$profile." .');window.location.href = './teacher.php';</script>";
    
?>