<?php
    if(isset($_GET['action']) ){
        $tam=$_GET['action'];
       
    }else{
        $tam='';
        
    }
    if($tam=='khoa'){
        include("modules/mucchinh/khoa.php");
    }else{
        include("svhocphan.php");
    }
?>