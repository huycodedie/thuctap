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
                <form class="search-form  align-items-center" method="POST" action="index.php?action=timkiem&idgv=<?php echo $user_id ?>&malhp=<?php echo $_GET['malhp'] ?>">
                  <input class="search-input" value="<?php echo $tukhoa  ?>" placeholder="Nhập MSV & Tên SV" name="tukhoa" style="border-radius: 2%; padding: 1%;" title="Enter search keyword">
                  <button type="submit" title="Search"><i class="bi bi-search"></i></button>
                </form>
                <button type="button" class="btn  btn-primary " data-bs-toggle="modal" data-bs-target="#verticalycentered"><a>Thêm điểm Excel</a></button>
                <div class="modal fade" id="verticalycentered" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title"> Thêm điểm bằng file Excel</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              Chọn file
                              <form action="modules/mucchinh/xuly.php?idgv=<?php echo $user_id ?>&malhp=<?php echo $_GET['malhp'] ?>" method="post" enctype="multipart/form-data">
                              <div class="mb-3">
                                <input class="form-control" type="file" id="file" name="file" accept=".xlsx, .xls">
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Trở lại</button>
                              <button type="submit" name  class="btn btn-primary">Tải lên</button>
                            </div>
                            </form>
                          </div>
                        </div>
                      </div>
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