<?php 
$tukhoa = isset($_POST['tukhoa']) && !empty($_POST['tukhoa']) ? $_POST['tukhoa'] : null;
$groups = [
  '2' => 0,
  '4' => 0
];
$sql_danhsach = "SELECT * FROM usersv
                WHERE malhc ='$_GET[malhc]' AND ( usernamesv LIKE '%".$tukhoa."%' OR idsv LIKE '%".$tukhoa."%') ORDER BY idsv"; 
$query_danhsach2 = mysqli_query($mysqli,$sql_danhsach);
$sql_danhsach2 = "SELECT b.masv, s.usernamesv, b.quatrinh, b.cuoiky,
            SUM(((b.quatrinh + COALESCE(b.diemthilai, b.cuoiky)) / 2) * p.sotinchi) AS tong,
        SUM(CASE WHEN b.quatrinh IS NOT NULL AND COALESCE(b.diemthilai, b.cuoiky) IS NOT NULL THEN p.sotinchi ELSE 0 END) AS tinchi,
        COUNT(CASE WHEN b.quatrinh IS NOT NULL AND COALESCE(b.diemthilai, b.cuoiky) IS NOT NULL THEN b.madiem END) AS so_mon
           FROM usersv s
           JOIN bangdiem b ON s.idsv = b.masv
           JOIN qlhocphan P ON p.mahp = b.mahp
           WHERE s.malhc = '$_GET[malhc]' AND ( usernamesv LIKE '%".$tukhoa."%' OR idsv LIKE '%".$tukhoa."%')
           GROUP BY b.masv
           ORDER BY tong DESC";
$query_danhsach = mysqli_query($mysqli,$sql_danhsach2);
$query_tongdiem = mysqli_query($mysqli,$sql_danhsach2);
$query_tongdiem1 = mysqli_query($mysqli,$sql_danhsach2);
  foreach ($query_tongdiem as $row) {
    if ($row['so_mon'] > 0) { 
      $score = (($row['tong']/ $row['tinchi'])*4)/10;
      if ($score < 2) {
          $groups['2']++;
      }else {
          $groups['4']++;
      }
    }
  }
?>
<main id="main" class="main">
    <div class="pagetitle">
    <h1>Danh sách sinh viên</h1>
    <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php?action=khoa&idgv=<?php echo $_GET['idgv'] ?>">khoa</a></li>
      <li class="breadcrumb-item"><a href="index.php?action=danh-sach-sv&idgv=<?php echo $_GET['idgv'] ?>&malhc=<?php echo $_GET['malhc'] ?>">danh sách</a></li>
  </nav>
</div>   
    <section class="section">
      <div class="row">
        <div class="col-lg-3">
          <div class="card">
            <div class="card-body"> 
              <?php  if ($groups['4']>0 || $groups['2']>0){?>    
              <h5 class="card-title">Biểu đồ điểm</h5>
              <!-- Pie Chart -->
              <canvas id="pieChart" style="max-height: 400px;"></canvas>
              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  new Chart(document.querySelector('#pieChart'), {
                    type: 'pie',
                    data: {
                      labels: [
                        '0-1.9',
                        '2-4'
                      ],
                      datasets: [{
                        label: 'Có ',
                        data: [<?php echo $groups['2'] ?>, <?php echo $groups['4'] ?>],
                        backgroundColor: [
                          'rgb(255, 99, 132)',
                          'rgb(54, 162, 235)'
                        ],
                        hoverOffset: 4
                      }]
                    }
                  });
                });
              </script>
              <!-- End Pie CHart -->
               <?php }?>
              <h5 class="card-title">Chức năng</h5>
              <div class="search-bar">
                <form class="search-form  align-items-center" method="POST" action="index.php?action=tim-kiem-sv&idgv=<?php echo $_GET['idgv'] ?>&malhc=<?php echo $_GET['malhc'] ?>">
                  <input class="search-input" value="<?php echo $tukhoa  ?>" placeholder="Nhập MSV & Tên SV" name="tukhoa" style="border-radius: 2%; padding: 1%;" title="Enter search keyword">
                  <button type="submit" title="Search"><i class="bi bi-search"></i></button>
                </form>
                <h1></h1>
                <button type="button" class="btn  btn-primary "><a href="modules/mucchinh/xuatdanhsachsv.php?action=xuatdssv&malhc=<?php echo $_GET['malhc'] ?>&tukhoa=<?php echo $tukhoa ?> " style="color:aliceblue">xuất data ra Excel</a></button>
            </div>
            </div>
          </div>
        </div>
       
<?php   
if($tukhoa==NULL){
include("hanhchinh/danhsach.php");
}else{
  include("hanhchinh/timkiemhanhchinh.php");
}    
?>
</main>