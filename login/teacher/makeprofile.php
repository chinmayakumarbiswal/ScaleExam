<?php
    require('../include/database.php');
    $email=$_GET['email'];
    $profile=$_GET['profile'];

    echo $email;
    echo $profile;

    $query="UPDATE `teacher` SET `public`='$profile' WHERE email='$email'";
    $testset=mysqli_query($db,$query);
    header('location:./teacher.php');
    
?>