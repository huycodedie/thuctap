<?php
    if(isset($_GET['test']) ){
        $tam=$_GET['test'];
       
    }else{
        $tam='';
        
    }
    if($tam=='test'){
        include("test.php");
    }else{
        include("svhocphan.php");
    }
?>