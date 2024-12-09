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