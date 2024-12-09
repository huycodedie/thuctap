<?php
    if(isset($_GET['action']) ){
        $tam=$_GET['action'];
       
    }else{
        $tam='';
        
    }
    if($tam=='test'){
        include("khoa.php");
    }else{
        include("svhocphan.php");
    }
?>