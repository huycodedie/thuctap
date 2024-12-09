<?php 
include('../../../../config/config.php');

if (isset($_POST['themntkgv'])) { 
    $teacher_data = trim($_POST['teacher_data']);
    $lines = explode("\n", $teacher_data); 
    $errors = [];

    foreach ($lines as $index => $line) {
        $line = trim($line);
        if ($line === '') continue;

        $parts = explode(',', $line);
        if (count($parts) !== 2) {
            $errors[] = "Dòng " . ($index + 1) . ": Định dạng không đúng.";
            continue;
        }

        $tengv = mysqli_real_escape_string($mysqli, trim($parts[0]));
        $email = mysqli_real_escape_string($mysqli, trim($parts[1]));
        $mk = md5($email); 
        $ngay = date('Y-m-d H:i:s');

        
        $checkEmailQuery = "SELECT * FROM usergv WHERE email = '$email'";
        $resultEmail = mysqli_query($mysqli, $checkEmailQuery);
        $checktenQuery = "SELECT * FROM usergv WHERE username = '$tengv'";
        $resultUsername = mysqli_query($mysqli, $checktenQuery);

        if (mysqli_num_rows($resultEmail) > 0) {
            $errors[] = "Dòng " . ($index + 1) . ": Email '$email' đã tồn tại.";
        } elseif (mysqli_num_rows($resultUsername) > 0) {
            $errors[] = "Dòng " . ($index + 1) . ": Tên '$tengv' đã tồn tại.";
        } else {
            $sql_them = "INSERT INTO usergv(username, email, created_at, password) 
                         VALUES ('$tengv', '$email', '$ngay', '$mk')";
            if (!mysqli_query($mysqli, $sql_them)) {
                $errors[] = "Dòng " . ($index + 1) . ": Lỗi khi thêm vào CSDL.";
            }
        }
    }
    session_start(); 
    if (empty($errors)) {
        header('location:../../../../index.php?action=profile&status=success');
    } else {
        $_SESSION['errors'] = $errors; 
        header('location:../../../../index.php?action=themnhieutkgv'); 
    }
    exit();
}


elseif(isset($_POST['themtkgv'])){
    $tengv = $_POST['tengv'];
    $email = $_POST['email'];
    $mk = md5($_POST['email']);
    $ngay = date('Y-m-d H:i:s');
    
     $checkEmailQuery = "SELECT * FROM usergv WHERE email = '$email'";
     $resultEmail = mysqli_query($mysqli, $checkEmailQuery);

     $checktenQuery = "SELECT * FROM usergv WHERE username = '$tengv'";
     $resultUsername = mysqli_query($mysqli, $checktenQuery);

    if (mysqli_num_rows($resultEmail) > 0) {
        $errors[] = " Email '$email' đã tồn tại.";
    } elseif (mysqli_num_rows($resultUsername) > 0) {
        $errors[] = " Tên '$tengv' đã tồn tại.";
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
        header('location:../../../../index.php?action=themtkgv');
    }
    exit(); 

  
}elseif(isset($_POST['suakhoa'])){
    $sql_sua = "UPDATE qlkhoa SET tenkhoa='".$tenkhoa."'
    WHERE idkhoa = '$_GET[idkhoa]' ";
    mysqli_query($mysqli,$sql_sua);
    header('location:../../../../index.php?action=khoa');
}else{
    $id=$_GET['idgv'];
    $sql_viewkhoa="DELETE FROM viewusergv_khoa WHERE magv ='".$id."'";
    mysqli_query($mysqli,$sql_viewkhoa);

    $id=$_GET['idgv'];
    $sql_viewlhp="DELETE FROM viewusergv_lhp WHERE magv ='".$id."'";
    mysqli_query($mysqli,$sql_viewlhp);
    $id=$_GET['idgv'];

    $sql_xoa="DELETE FROM usergv WHERE idgv ='".$id."'";
    mysqli_query($mysqli,$sql_xoa);
    
    
    header('location:../../../../index.php?action=profile');
}
?>


