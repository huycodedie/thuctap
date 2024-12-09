<?php
    if(isset($_GET['action']) ){
        $tam=$_GET['test'];
       
    }else{
        $tam='';
        
    }
    if($tam=='test2'){
        include("test.php");
    }else{
        include("svhocphan.php");
    }
?>