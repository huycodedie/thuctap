
<?php 
//khoa
include('../../../../config/config.php');
$tensv = $_POST['tensv'];
$email = $_POST['email'];
$mk = md5($_POST['email']);
$ngay = $_POST['ngaytao'];
$malhc = $_POST['malhc'];



if(isset($_POST['themtksv'])){

    
     $checkEmailQuery = "SELECT * FROM usersv WHERE email = '$email'";
     $result = mysqli_query($mysqli, $checkEmailQuery);


     $checktenQuery = "SELECT * FROM usersv WHERE usernamesv = '$tensv'";
     $result2 = mysqli_query($mysqli, $checktenQuery);
     if (mysqli_num_rows($result) > 0) {
        
        
        header('location:../../../../index.php?action=themtksvsaiemail');
    }if (mysqli_num_rows($result2) > 0) {
        header('location:../../../../index.php?action=themtksvsaiten');
    }
    else {
       
        $sql_them = "INSERT INTO usersv(usernamesv,email,created_at,password,malhc) 
    VALUE('".$tensv."','".$email."','".$ngay."','".$mk."','".$malhc."')";
    mysqli_query($mysqli,$sql_them);
    header('location:../../../../index.php?action=profile');
    }


  
}elseif(isset($_POST['suakhoa'])){
    $sql_sua = "UPDATE qlkhoa SET tenkhoa='".$tenkhoa."'
    WHERE idkhoa = '$_GET[idkhoa]' ";
    mysqli_query($mysqli,$sql_sua);
    header('location:../../../../index.php?action=khoa');
}else{
    $id=$_GET['idsv'];
    $sql_xoa="DELETE FROM bangdiem WHERE masv ='".$id."'";
    mysqli_query($mysqli,$sql_xoa);
  
    $sql_xoa="DELETE FROM usersv WHERE idsv ='".$id."'";
    mysqli_query($mysqli,$sql_xoa);
    
    header('location:../../../../index.php?action=profile');
}
?>



