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

              <!-- Default Table -->
              <!-- Liên kết cho danh sách lớp hành chính -->
              <ul>
            <li><a href="#" class="load-content" data-action="sv-lop-hoc-phan">Lớp học phần</a></li>
            <li><a href="<?php echo $newUrl; ?>">Chuyển đến action=doi</a></li>
        </ul>
         <form action="index.php?action=timkiem&idgv=<?php echo $user_id ?>&malhp=<?php echo $_GET['malhp'] ?>" method="POST">
                <input class="search" id="search_input" placeholder="<?php echo $tukhoa  ?>" name="tukhoa">
                <button>
                    <i class="fa fa-search" aria-hidden="true" name="timkiem"></i>
                </button>
                <div class="search_result">
                    <ul></ul>
                </div>
            </form>
             <button><a class="nav-link collapsed load-content" href="#" data-action="doi"></a>hdss</button>
              <!-- End Default Table Example -->
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
