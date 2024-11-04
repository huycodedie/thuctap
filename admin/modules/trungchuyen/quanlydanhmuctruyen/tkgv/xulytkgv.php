
<?php 
//khoa
include('../../../../config/config.php');




if(isset($_POST['themtkgv'])){
    $tengv = $_POST['tengv'];
    $email = $_POST['email'];
    $mk = md5($_POST['email']);
    $ngay = $_POST['ngaytao'];
    
    
     $checkEmailQuery = "SELECT * FROM usergv WHERE email = '$email'";
     $result = mysqli_query($mysqli, $checkEmailQuery);


     $checktenQuery = "SELECT * FROM usergv WHERE username = '$tengv'";
     $result2 = mysqli_query($mysqli, $checktenQuery);
     if (mysqli_num_rows($result) > 0) {
        
        
        header('location:../../../../index.php?action=themtkgvsaiemail');
    }elseif (mysqli_num_rows($result2) > 0) {
        header('location:../../../../index.php?action=themtkgvsaiten');
    }
    else {
      
        $sql_them = "INSERT INTO usergv(username,email,created_at,password) 
    VALUE('".$tengv."','".$email."','".$ngay."','".$mk."')";
    mysqli_query($mysqli,$sql_them);
    header('location:../../../../index.php?action=profile');
    }


  
}elseif(isset($_POST['suakhoa'])){
    $sql_sua = "UPDATE qlkhoa SET tenkhoa='".$tenkhoa."'
    WHERE idkhoa = '$_GET[idkhoa]' ";
    mysqli_query($mysqli,$sql_sua);
    header('location:../../../../index.php?action=khoa');
}else{
    $id=$_GET['idgv'];
    $sql_xoa="DELETE FROM usergv WHERE idgv ='".$id."'";
    mysqli_query($mysqli,$sql_xoa);
    
    $id=$_GET['idgv'];
    $sql_xoa="DELETE FROM viewusergv_khoa WHERE magv ='".$id."'";
    mysqli_query($mysqli,$sql_xoa);
    header('location:../../../../index.php?action=profile');
}
?>


