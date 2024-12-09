
<?php 
include('../../../../config/config.php');
$makhoa = $_POST['makhoa'];
$tenlhc = $_POST['tenlop'];
$giaovien = $_POST['gv'];

if(isset($_POST['themlhc'])){
    $sql_themlhc = "INSERT INTO qllophanhchinh(tenlop,makhoa) 
    VALUE('".$tenlhc."','".$makhoa."')";
    mysqli_query($mysqli,$sql_themlhc);
    header('location:../../../../index.php?action=lhc');
}elseif(isset($_POST['themphutrach'])){
    $checklhcQuery = "SELECT * FROM viewusergv_khoa WHERE malhc = '$tenlhc'";
    $result = mysqli_query($mysqli, $checklhcQuery);
    if(mysqli_num_rows($result) > 0){
        $sql_sua = "UPDATE viewusergv_khoa SET magv='".$giaovien."'
        WHERE malhc = '$_GET[idlhc]' ";
        mysqli_query($mysqli,$sql_sua);
        header('location:../../../../index.php?action=lhc');
    }
    else{
    $sql_them = "INSERT INTO viewusergv_khoa(malhc,makhoa,magv) 
    VALUE('".$tenlhc."','".$makhoa."','".$giaovien."')";
    mysqli_query($mysqli,$sql_them);
    header('location:../../../../index.php?action=lhc');
    }
}elseif(isset($_POST['sualhc'])){
    $sql_sua = "UPDATE qllophanhchinh SET tenlop='".$tenlhc."',makhoa='".$makhoa."'
    WHERE idlhc = '$_GET[idlhc]' ";
    mysqli_query($mysqli,$sql_sua);
    header('location:../../../../index.php?action=lhc');
}else{
    $id=$_GET['idlhc'];
    $sql_xoa="DELETE FROM qllophanhchinh WHERE idlhc='".$id."'";
    $sql_xoaview="DELETE FROM viewusergv_khoa WHERE malhc='".$id."'";
    mysqli_query($mysqli,$sql_xoaview);
    mysqli_query($mysqli,$sql_xoa);
    header('location:../../../../index.php?action=lhc');
}
?>