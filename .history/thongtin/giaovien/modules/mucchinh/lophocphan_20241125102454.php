<?php 
$sql_danhsach = "SELECT*FROM usergv g
                JOIN viewusergv_lhp v ON v.magv = g.idgv
                JOIN qllophocphan l ON l.malhp = v.malhp
                JOIN qlhocphan p ON p.mahp = l.mahp
                JOIN qlkhoa k ON k.idkhoa = p.makhoa   
                WHERE g.idgv = '$_GET[idgv]' ORDER BY l.malhp";
$query_danhsach = mysqli_query($mysqli,$sql_danhsach);
?>
<main id="main" class="main">
    <div class="pagetitle">
        <h3>Danh sach Khoa</h3>
    </div>
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
                                    <th class="col-2 text-center">Khoa</th>
                                    <th class="col-2 text-center">Tên học phần</th>
                                    <th class="col-2 text-center">Tên lơp học phần</th>
                                    
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
                                    <td class="text-center"><?php echo $row['tenkhoa'] ?></td>
                                    <td class="text-center"><?php echo $row['tenhp'] ?></td>
                                    <td class="text-center"><?php echo $row['tenlhp'] ?></td>
                                    

                                    <td class="text-center">
                                        <a href="index.php?action=sv-lop-hoc-phan&idgv=<?php echo $row['idgv'] ?>&malhp=<?php echo $row['malhp'] ?>" class="btn btn-primary btn-sm" title="noi dung"><i class="bi bi-file-earmark-text me-1"></i></a>
                                        
                                    </td>
                                </tr>
    
                                <?php
                                }
                                ?>
                            </body>
                        </table>
                        <?php else: ?> 
          
          <h2>Chưa có lớp nào</h2>
      <?php endif; ?> 
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>