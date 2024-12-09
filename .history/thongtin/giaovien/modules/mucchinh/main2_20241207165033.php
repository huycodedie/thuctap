<?php
    if(isset($_GET['test']) ){
        $tam=$_GET['action'];
       
    }else{
        $tam='';
        
    }
    if($tam=='test'){
        include("test.php");
    }else{
        include("svhocphan.php");
    }
?>