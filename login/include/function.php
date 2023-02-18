<?php
    function getTeacherDetails($db,$email){
        $query="SELECT * FROM teacher WHERE email='$email'";
        $run=mysqli_query($db,$query);
        $data=mysqli_fetch_assoc($run);
        return $data;
    }

    function getAllTeacher($db){
        $query="SELECT * FROM teacher where public='public'";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }

    function getStudentDetails($db,$email){
        $query="SELECT * FROM student WHERE email='$email'";
        $run=mysqli_query($db,$query);
        $data=mysqli_fetch_assoc($run);
        return $data;
    }

    function getAllRooms($db,$email){
        $query="SELECT * FROM rooms where teacherEmail='$email' ORDER BY id DESC";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }

    function getRoomDetailsByStudent($db,$roomIdAuto){
        $query="SELECT * FROM rooms WHERE roomIdAuto='$roomIdAuto'";
        $run=mysqli_query($db,$query);
        $data=mysqli_fetch_assoc($run);
        return $data;
    }

    function getAllRoomsByStudent($db,$email){
        $query="SELECT * FROM joinroomstudent where studentEmail='$email' ORDER BY id DESC";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }

    function getAllDocuments($db,$roomIdAuto){
        $query="SELECT * FROM documentlog where roomIdAuto='$roomIdAuto' ORDER BY id DESC";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }
    function getAssignement($db,$roomIdAuto){
        $query="SELECT * FROM assignementlog where roomIdAuto='$roomIdAuto' ORDER BY id DESC";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }

    function getAssignementByAssignementId($db,$UniqueId){
        $query="SELECT * FROM assignementlog where UniqueId='$UniqueId'";
        $run=mysqli_query($db,$query);
        $data=mysqli_fetch_assoc($run);
        return $data;
    }


    function randPass() {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        return substr(str_shuffle($chars),0,8);
    }


    function getAssignementByAssignementUniqueId($db,$assignementid){
        $query="SELECT * FROM assignementfilelog where UniqueId='$assignementid' ORDER BY id DESC";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }

    function getExam($db,$roomIdAuto){
        $query="SELECT * FROM exam where roomIdAuto='$roomIdAuto' ORDER BY id DESC";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }
    
?>