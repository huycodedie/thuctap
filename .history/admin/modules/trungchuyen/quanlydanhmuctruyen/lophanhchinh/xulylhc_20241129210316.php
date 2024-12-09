
<?php 
session_start();
include('../../../../config/config.php');
$makhoa = $_POST['makhoa'];
$tenlhc = $_POST['tenlop'];
$giaovien = $_POST['gv'];   

if(isset($_POST['themlhc'])){
    $sql_check = "SELECT * FROM qllophanhchinh WHERE tenlop = '$tenlhc' AND makhoa = '$makhoa'";
    $result_check = mysqli_query($mysqli, $sql_check);
    if (mysqli_num_rows($result_check) > 0) {   
    $errors[] = "Tên lớp và mã khoa đã tồn tại.";
    } else {
        $sql_themlhc = "INSERT INTO qllophanhchinh (tenlop, makhoa) 
                        VALUES ('$tenlhc', '$makhoa')";
        if (mysqli_query($mysqli, $sql_themlhc)) {  
            $errors[] = "Thêm lớp hành chính thành công.";
        } else {
            $errors[] = "Thêm lớp hành chính không thành công. Lỗi: " . mysqli_error($mysqli);
        }
       
    }
    $_SESSION['errors'] = $errors;
    header('Location: ../../../../index.php?action=lhc');
    exit;
}elseif(isset($_POST['themphutrach'])){
    $checklhcQuery = "SELECT * FROM viewusergv_khoa WHERE malhc = '$tenlhc'";
    $result = mysqli_query($mysqli, $checklhcQuery);
    echo "makhoa $makhoa";
    if(mysqli_num_rows($result) > 0){
        $sql_sua = "UPDATE viewusergv_khoa SET magv='".$giaovien."'
        WHERE malhc = '$_GET[idlhc]' ";
        mysqli_query($mysqli,$sql_sua);
        $errors[] = "Thêm giáo vào lớp hành chính thành công.";
    }
    else{
    $sql_them = "INSERT INTO viewusergv_khoa(malhc,makhoa,magv) 
    VALUE('".$tenlhc."','".$makhoa."','".$giaovien."')";
    mysqli_query($mysqli,$sql_them);
    $errors[] = "Thêm giáo vào lớp hành chính thành công.";
    }
    $_SESSION['errors'] = $errors;
    header('Location: ../../../../index.php?action=lhc');
    exit;
}elseif(isset($_POST['sualhc'])){
    $sql_sua = "UPDATE qllophanhchinh SET tenlop='".$tenlhc."',makhoa='".$makhoa."'
    WHERE idlhc = '$_GET[idlhc]' ";
    mysqli_query($mysqli,$sql_sua);
    $errors[] = "Sửa lớp hành chính thành công.";
    
    $_SESSION['errors'] = $errors;
    header('Location: ../../../../index.php?action=lhc');
    exit;
}else{
    $id=$_GET['idlhc'];
    $sql_check = "SELECT COUNT(*) FROM usersv WHERE malhc = '$id'";
    $result_check = mysqli_query($mysqli, $sql_check);
    $row = mysqli_fetch_row($result_check);
    if ($row[0] > 0) {
        $errors[] = "Không thể xóa Lớp hành chính vì đang có sinh viên trong lớp.";
    }else {  
        $sql_xoa="DELETE FROM qllophanhchinh WHERE idlhc='".$id."'";
        $sql_xoaview="DELETE FROM viewusergv_khoa WHERE malhc='".$id."'";
        mysqli_query($mysqli,$sql_xoaview);
        if (!mysqli_query($mysqli, $sql_xoa)) {         
            $errors[] = "Không thể xóa lớp hành chính. Lỗi: " . mysqli_error($mysqli);
        } else {       
            $errors[] = "Xóa lớp hành chính thành công.";
        }
    }
    $_SESSION['errors'] = $errors; 
    header('location: ../../../../index.php?action=lhc');
    exit;

    if (empty($errors)) {
        $_SESSION['errors'] = $errors; 
        header('location:../../../../index.php?action=lhc');
    } else {
        $_SESSION['errors'] = $errors; 
        header('location:../../../../index.php?action=lhc'); 
    }
    exit();
}
?>