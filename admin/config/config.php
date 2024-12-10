<?php
    $mysqli = new mysqli("localhost","root","","qlsv");
    //check
    if($mysqli-> connect_errno){
        echo"ket noi mydql loi" . $mysqli->connect_error;
        exit();
    }
?>