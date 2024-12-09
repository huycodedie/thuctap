
<?php 
 session_start(); 
include('../../../../config/config.php');
$mahp = $_POST['mahp'];
$tenlhp = $_POST['tenlhp'];
$magv = $_POST['magv'];
$malhp = $_GET['malhp'];
$masv = $_POST['masv'];
$ngaytao = $_POST['ngaytao'];
$makhoa = $_POST['idkhoa'];



if(isset($_POST['themlhp'])){
    $sql_themlhp = "INSERT INTO qllophocphan(tenlhp,mahp) 
    VALUE('".$tenlhp."','".$mahp."')";
    if (mysqli_query($mysqli, $sql_themlhp)) {
        $malhp = mysqli_insert_id($mysqli);
        $sql_themview = "INSERT INTO viewusergv_lhp (malhp,magv) 
                         VALUES ('$malhp', '$magv')";
        if(!mysqli_query($mysqli,$sql_themview)){
            $errors[] = "Thêm thành công.";
        }
        $errors[] = "Thêm thành công.";
    }
    $_SESSION['errors'] = $errors;
    header('Location: ../../../../index.php?action=lhp');
    exit;
    
}elseif(isset($_POST['sualhp'])){
    $checkview = "SELECT * FROM viewusergv_lhp WHERE malhp = '$malhp'";
    $result = mysqli_query($mysqli,$checkview);
    if(mysqli_num_rows($result)>0){
        $sql_sua1 = "UPDATE qllophocphan SET tenlhp='".$tenlhp."',mahp='".$mahp."' 
        WHERE malhp = '$_GET[malhp]' ";
        mysqli_query($mysqli,$sql_sua1);

        $sql_sua = "UPDATE viewusergv_lhp SET magv='".$magv."'
        WHERE malhp = '$_GET[malhp]' ";
        mysqli_query($mysqli,$sql_sua);

        $errors[] = "Sửa thành công.";
    }else{
        $sql_them = "INSERT INTO viewusergv_lhp(malhp,magv) 
        VALUE('".$malhp."','".$magv."')";
        mysqli_query($mysqli,$sql_them);

         $sql_sua = "UPDATE qllophocphan SET tenlhp='".$tenlhp."',mahp='".$mahp."' 
        WHERE malhp = '$_GET[malhp]' ";
        mysqli_query($mysqli,$sql_sua);

        $errors[] = "Sửa thành công.";
    }
    $_SESSION['errors'] = $errors;
    header('Location: ../../../../index.php?action=lhp');
    exit;
}elseif(isset($_POST['themsvl'])){
    $checkmalhpQuery = "SELECT * FROM viewusergv_lhp WHERE malhp = '$malhp'";
    $result_check = mysqli_query($mysqli, $checkmalhpQuery);

    $checkdiemQuery = "SELECT * FROM viewusergv_lhp WHERE malhp = '$malhp'";
    $result_check = mysqli_query($mysqli, $checkdiemQuery);
    if (mysqli_num_rows($result) > 0) {
        $sql_themsvl = "INSERT INTO bangdiem(mahp,malhp,magv,masv,ngay_tao) 
        VALUE('".$mahp."','".$malhp."','".$magv."','".$masv."','".$ngaytao."')";
        mysqli_query($mysqli,$sql_themsvl);
        $errors[] = "thêm sinh viên vào lớp thành công.";
        
   }
   else {
    $sql_themsvl = "INSERT INTO bangdiem(mahp,malhp,magv,masv,ngay_tao) 
    VALUE('".$mahp."','".$malhp."','".$magv."','".$masv."','".$ngaytao."')";
    mysqli_query($mysqli,$sql_themsvl);

    $sql_themview = "INSERT INTO viewusergv_khoa(magv,makhoa) 
    VALUE('".$magv."','".$makhoa."')";
    mysqli_query($mysqli,$sql_themview);
    $errors[] = "thêm sinh viên vào lớp thành công.";
   }    
   if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
}
if (!empty($error)) {
    $_SESSION['error'] = $error;
}
header('Location: ../../../../index.php?action=diem');
exit();
}else{
    $id=$_GET['malhp'];
    $sql_check = "SELECT COUNT(*) FROM bangdiem WHERE malhp = '$id'";
    $result_check = mysqli_query($mysqli, $sql_check);
    $row = mysqli_fetch_row($result_check);
    
    if ($row[0] > 0) {
        $error[] = "Không thể xóa lớp học phần này vì có liên quan trong bảng điểm.";
    } else {  
        $sql_view="DELETE FROM viewusergv_lhp WHERE malhp='".$id."'";
        mysqli_query($mysqli,$sql_view);
        $sql_xoa = "DELETE FROM qllophocphan WHERE malhp = '$id'";
        if (!mysqli_query($mysqli, $sql_xoa)) {         
            $error[] = "Không thể xóa lớp học phần. Lỗi: " . mysqli_error($mysqli);
        } else {       
            $errors[] = "Xóa lớp học phần thành công.";
        }
    }
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
    }
    if (!empty($error)) {
        $_SESSION['error'] = $error;
    }
    header('Location: ../../../../index.php?action=lhp');
    exit();
}
?>