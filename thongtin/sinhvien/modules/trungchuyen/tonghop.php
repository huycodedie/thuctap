<?php 
$sql_danhsach2 = "SELECT n.nam_hoc, b.masv, s.usernamesv, 
                    (SUM(((b.quatrinh + COALESCE(b.diemthilai, b.cuoiky)) / 2) * p.sotinchi) / SUM(CASE WHEN b.quatrinh IS NOT NULL AND COALESCE(b.diemthilai, b.cuoiky) IS NOT NULL THEN p.sotinchi ELSE 0 END))AS tong,
                    (((SUM(((b.quatrinh + COALESCE(b.diemthilai, b.cuoiky)) / 2) * p.sotinchi) / SUM(CASE WHEN b.quatrinh IS NOT NULL AND COALESCE(b.diemthilai, b.cuoiky) IS NOT NULL THEN p.sotinchi ELSE 0 END))*4)/10)AS tong2,
                    SUM(CASE WHEN b.quatrinh IS NOT NULL AND COALESCE(b.diemthilai, b.cuoiky) IS NOT NULL THEN p.sotinchi ELSE 0 END) AS tinchi,
                    COUNT(CASE WHEN b.quatrinh IS NOT NULL AND COALESCE(b.diemthilai, b.cuoiky) IS NOT NULL THEN b.madiem END) AS so_mon
                    FROM usersv s
                    JOIN bangdiem b ON s.idsv = b.masv
                    JOIN qllophocphan a ON a.malhp = b.malhp
                    JOIN qlhocphan p ON p.mahp = b.mahp
                    JOIN namhoc n ON n.idnam = a.hoc_ky
                    WHERE b.masv = '$_GET[masv]'
                    GROUP BY n.nam_hoc , b.masv ";
$sql_danhsach = "SELECT b.masv, s.usernamesv, b.quatrinh, b.cuoiky,
                     ROUND(((SUM(((b.quatrinh + COALESCE(b.diemthilai, b.cuoiky)) / 2) * p.sotinchi) / SUM(CASE WHEN b.quatrinh IS NOT NULL AND COALESCE(b.diemthilai, b.cuoiky) IS NOT NULL THEN p.sotinchi ELSE 0 END))*4)/10,2)AS tong,
                     ROUND(SUM(((b.quatrinh + COALESCE(b.diemthilai, b.cuoiky)) / 2) * p.sotinchi) / SUM(CASE WHEN b.quatrinh IS NOT NULL AND COALESCE(b.diemthilai, b.cuoiky) IS NOT NULL THEN p.sotinchi ELSE 0 END),2)AS tong2,
                SUM(CASE WHEN b.quatrinh IS NOT NULL AND COALESCE(b.diemthilai, b.cuoiky) IS NOT NULL THEN p.sotinchi ELSE 0 END) AS tinchi,
                COUNT(CASE WHEN b.quatrinh IS NOT NULL AND COALESCE(b.diemthilai, b.cuoiky) IS NOT NULL THEN b.madiem END) AS so_mon
                   FROM usersv s
                   JOIN bangdiem b ON s.idsv = b.masv
                   JOIN qlhocphan P ON p.mahp = b.mahp
                   WHERE b.masv = '$_GET[masv]'
                   GROUP BY b.masv
                   ORDER BY tong DESC";
$query_danhsach = mysqli_query($mysqli,$sql_danhsach2);
$query_danhsach2 = mysqli_query($mysqli,$sql_danhsach2);
$query_danhsach1 = mysqli_query($mysqli,$sql_danhsach);
?>
<body>
<main id="main" class="main">
    <?php          
        $row = mysqli_fetch_array($query_danhsach2);
        if($row){   
        ?>
    <div class="pagetitle">
        <h3>Danh sách điểm: <?php echo $row['usernamesv'] ?> </h3>
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
                                    <th class="col-1 text-center">STT</th>
                                    <th class="col-3 text-center">Năm học </th>
                                    <th class="col-3 text-center">Số TC </th>
                                    <th class="col-1 text-center">Hệ 4</th>
                                
                                    <th class="col-3 text-center">Hệ 10</th>
                                           
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
                                    <td class="text-center"><?php echo $row['nam_hoc'] ?></td>
                                    <td class="text-center"><?php echo $row['tinchi'] ?></td>
                                    <td class="text-center"><?php if($row['so_mon']>0){echo $row['tong2'];} ?></td>
                                    <td class="text-center"><?php if($row['so_mon']>0){echo $row['tong'];} ?></td>
                                   
                                    <td class="text-center">
                                    
                                     
                                    </td>
                                    
                                </tr>
                                <?php
                                }
                                ?>
                                <?php 
                                $i = 0;
                                while($row = mysqli_fetch_array($query_danhsach1)){
                                    $i++;
                                ?>
                                <tr>
                                
                                    <th class="text-center"> Tổng</th>
                                    <th class="text-center">Điểm TBC</th>
                                    <td class="text-center"><?php echo $row['tinchi'] ?></td>
                                    <td class="text-center"><?php if($row['so_mon']>0){echo $row['tong'];} ?></td>
                                    <td class="text-center"><?php if($row['so_mon']>0){echo $row['tong2'];} ?></td>
                                   
                                    <td class="text-center">
                                    
                                     
                                    </td>
                                    
                                </tr>
                                <?php
                                }
                                ?>
                                
                            </body>
                        </table>
                        <?php else: ?> 

<h1>Chưa có tham gia học lớp nào</h1>

<?php endif; ?> 
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

</body>