<?php 
$user_id = mysqli_real_escape_string($mysqli, $_SESSION['user_id']);
$tukhoa = isset($_POST['tukhoa']) && !empty($_POST['tukhoa']) ? $_POST['tukhoa'] : null;
if($tukhoa==NULL){
$sql_danhsach = "SELECT*FROM usergv g
                 left JOIN bangdiem b ON b.magv = g.idgv
                 JOIN qllophocphan p ON p.malhp = b.malhp
                 JOIN usersv s ON s.idsv = b.masv
                WHERE b.magv = '$_GET[idgv]'AND b.malhp = '$_GET[malhp]'ORDER BY b.madiem";         
$query_danhsach = mysqli_query($mysqli,$sql_danhsach);
$query_danhsach1 = mysqli_query($mysqli,$sql_danhsach);
}else{
$sql_danhsach = "SELECT*FROM usergv g
                 left JOIN bangdiem b ON b.magv = g.idgv
                 JOIN qllophocphan p ON p.malhp = b.malhp
                 JOIN usersv s ON s.idsv = b.masv
                WHERE b.magv = '$_GET[idgv]'AND b.malhp = '$_GET[malhp]' AND b.masv LIKE '%".$tukhoa."%' ORDER BY b.madiem";         
$query_danhsach = mysqli_query($mysqli,$sql_danhsach);
$query_danhsach1 = mysqli_query($mysqli,$sql_danhsach);

}

?>
<main id="main" class="main">

    <div class="pagetitle">
    <h1>Danh sách sinh viên lớp học phần</h1>
    <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php?action=lop-hoc-phan&idgv=<?php echo $user_id?>">khoa</a></li>
      <li class="breadcrumb-item"><a href="index.php?action=sv-lop-hoc-phan&idgv=<?php echo $user_id ?>&malhp=<?php echo $_GET['malhp'] ?>">Sinh viên</a></li>
    </nav>
</div>
<section class="section">
      <div class="row">
        <div class="col-lg-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Chức năng</h5>
              <div class="search-bar">
                <form class="search-form d-flex " method="POST" action="index.php?action=timkiem&idgv=<?php echo $user_id ?>&malhp=<?php echo $_GET['malhp'] ?>">
                  <input value="<?php echo $tukhoa  ?>" placeholder="Nhập MSV & Tên SV" name="tukhoa"  title="Enter search keyword">
                  <button type="submit" title="Search"><i class="bi bi-search"></i></button>
                </form>
              </div>
            </div>
          </div>
        </div>
       
<?php   
if($tukhoa==NULL){
include("svhocphan.php");
}else{
  include("main2.php");
}    

?>
</main>
