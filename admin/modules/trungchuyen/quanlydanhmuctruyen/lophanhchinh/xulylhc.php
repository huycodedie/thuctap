
<?php 
include('../../../../config/config.php');
$makhoa = $_POST['makhoa'];
$tenlhc = $_POST['tenlop'];


if(isset($_POST['themlhc'])){
    $sql_themlhc = "INSERT INTO qllophanhchinh(tenlop,makhoa) 
    VALUE('".$tenlhc."','".$makhoa."')";
    mysqli_query($mysqli,$sql_themlhc);
    header('location:../../../../index.php?action=lhc');
}elseif(isset($_POST['sualhc'])){
    $sql_sua = "UPDATE qllophanhchinh SET tenlop='".$tenlhc."',makhoa='".$makhoa."'
    WHERE idlhc = '$_GET[idlhc]' ";
    mysqli_query($mysqli,$sql_sua);
    header('location:../../../../index.php?action=lhc');
}else{
    $id=$_GET['idlhc'];
    $sql_xoa="DELETE FROM qllophanhchinh WHERE idlhc='".$id."'";
    mysqli_query($mysqli,$sql_xoa);
    header('location:../../../../index.php?action=lhc');
}
?>