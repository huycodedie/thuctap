
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
        $errors[] = " Email '$email' đã tồn tại.";
    } elseif (mysqli_num_rows($result2) > 0) {
        $errors[] = " Tên '$tensv' đã tồn tại.";
    }
    else { 
        $sql_them = "INSERT INTO usergv(username,email,created_at,password) 
        VALUE('".$tengv."','".$email."','".$ngay."','".$mk."')";
        mysqli_query($mysqli,$sql_them);
        header('location:../../../../index.php?action=profile');
    }
    session_start(); 
    if (empty($errors)) {
        header('location:../../../../index.php?action=profile&status=success');
    } else {
        $_SESSION['errors'] = $errors; 
        header('location:../../../../index.php?action=themtksv');
    }
    exit(); 


  
}else{
    $id=$_GET['idsv'];
    $sql_xoa="DELETE FROM bangdiem WHERE masv ='".$id."'";
    mysqli_query($mysqli,$sql_xoa);
  
    $sql_xoa="DELETE FROM usersv WHERE idsv ='".$id."'";
    mysqli_query($mysqli,$sql_xoa);
    
    header('location:../../../../index.php?action=profile');
}
?>



