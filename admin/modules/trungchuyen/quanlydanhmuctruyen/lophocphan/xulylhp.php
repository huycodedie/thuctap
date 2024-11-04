
<?php 
include('../../../../config/config.php');
$mahp = $_POST['mahp'];
$tenlhp = $_POST['tenlhp'];
$magv = $_POST['magv'];
$malhp = $_POST['malhp'];
$masv = $_POST['masv'];
$ngaytao = $_POST['ngaytao'];
$makhoa = $_POST['idkhoa'];



if(isset($_POST['themlhp'])){
    $sql_themhp = "INSERT INTO qllophocphan(tenlhp,mahp,magv) 
    VALUE('".$tenlhp."','".$mahp."','".$magv."')";
    mysqli_query($mysqli,$sql_themhp);
    header('location:../../../../index.php?action=lhp');
}elseif(isset($_POST['sualhp'])){
    $sql_sua = "UPDATE qllophocphan SET tenlhp='".$tenlhp."',mahp='".$mahp."',magv='".$magv."'
    WHERE malhp = '$_GET[malhp]' ";
    mysqli_query($mysqli,$sql_sua);
    header('location:../../../../index.php?action=lhp');
}elseif(isset($_POST['themsvl'])){
    $checkkhoaQuery = "SELECT * FROM viewusergv_khoa WHERE makhoa = '$makhoa'";
    $result = mysqli_query($mysqli, $checkkhoaQuery);

    if (mysqli_num_rows($result) > 0) {
        $sql_themsvl = "INSERT INTO bangdiem(malhp,magv,masv,ngay_tao) 
        VALUE('".$malhp."','".$magv."','".$masv."','".$ngaytao."')";
        mysqli_query($mysqli,$sql_themsvl);
       
        header('location:../../../../index.php?action=lhp');
   }
   else {
    $sql_themsvl = "INSERT INTO bangdiem(malhp,magv,masv,ngay_tao) 
    VALUE('".$malhp."','".$magv."','".$masv."','".$ngaytao."')";
    mysqli_query($mysqli,$sql_themsvl);

    $sql_themview = "INSERT INTO viewusergv_khoa(magv,makhoa) 
    VALUE('".$magv."','".$makhoa."')";
    mysqli_query($mysqli,$sql_themview);
    header('location:../../../../index.php?action=lhp');  
   }    
}else{
    $id=$_GET['malhp'];
    $sql_xoa="DELETE FROM qllophocphan WHERE malhp='".$id."'";
    mysqli_query($mysqli,$sql_xoa);
    header('location:../../../../index.php?action=lhp');
}
?>