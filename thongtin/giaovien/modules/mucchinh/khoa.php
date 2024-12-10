<?php 
$sql_danhsach = "SELECT*FROM usergv g
                JOIN viewusergv_khoa v ON v.magv = g.idgv
                JOIN qlkhoa k ON k.idkhoa = v.makhoa  
                JOIN qllophanhchinh c ON c.idlhc = v.malhc      
                WHERE g.idgv = '$_GET[idgv]' ORDER BY v.id";
$query_danhsach = mysqli_query($mysqli,$sql_danhsach);
$sql_danhsach2 = "SELECT*FROM usergv g
                JOIN viewusergv_khoa v ON v.magv = g.idgv
                JOIN qlkhoa k ON k.idkhoa = v.makhoa  
                JOIN qllophanhchinh c ON c.idlhc = v.malhc      
                WHERE g.idgv = '$_GET[idgv]' ORDER BY v.id";
$query_danhsach2 = mysqli_query($mysqli,$sql_danhsach2);
?>
<main id="main" class="main">
    <?php          
        $row = mysqli_fetch_array($query_danhsach2);
        if($row){   
        ?>
    <div class="pagetitle">
    <h1>Danh sách Khoa</h1>
    <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php?action=khoa&idgv=<?php echo $row['idgv'] ?>">Khoa</a></li>
      
  </nav>
</div>
<?php } ?>
    <section class="section dashboard">
        <div class="row">
            <div class="col-12">
                <div class="card recend-sales overflow-auto">
                    <div class="card-body mt-4">
                    <?php if ($query_danhsach->num_rows > 0): ?> 
                        <table class="table table-broderless datatable">
                            <thead>
                                <tr>
                                    <th class="col-1 text-center">Stt</th>
                                    <th class="col-1 text-center">Mã khoa</th>
                                    <th class="col-2 text-center">Tên Khoa</th>
                                    <th class="col-2 text-center">Tên lớp hành chính</th>
                                </tr>
                            </thead>
                            <body>
                                <?php 
                                $i = 0;
                                while($row = mysqli_fetch_array($query_danhsach)){
                                    $i++;
                                ?>
                                <tr>
                                    <th class="text-center" scope="row"><?php echo $i ?> </th>
                                    <td class="text-center"><?php echo $row['idkhoa'] ?></td>
                                    <td class="text-center"><?php echo $row['tenkhoa'] ?></td>
                                    <td class="text-center"><?php echo $row['tenlop'] ?></td>

                                    <td class="text-center">
                                        <a href="index.php?action=danh-sach-sv&idgv=<?php echo $row['idgv'] ?>&idlhc=<?php echo $row['idlhc'] ?>" class="btn btn-primary btn-sm" title="noi dung"><i class="bi bi-file-earmark-text me-1"></i></a>
                                        
                                    </td>
                                </tr>
    
                                <?php
                                }
                                ?>
                            </body>
                        </table>
                        <?php else: ?> 
          
          <h2>Chưa có khoa nào</h2>
      <?php endif; ?> 
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>