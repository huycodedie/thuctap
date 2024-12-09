<?php 
$sql_danhsach = "SELECT * FROM bangdiem b
                JOIN qllophocphan p ON p.malhp = b.malhp 
                JOIN qlhocphan h ON h.mahp = p.mahp
                JOIN usersv s ON s.idsv = b.masv
                WHERE b.masv ='$_GET[masv]' ORDER BY madiem"; 
$query_danhsach = mysqli_query($mysqli,$sql_danhsach);
$query_danhsach2 = mysqli_query($mysqli,$sql_danhsach);
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
                                    <th class="col-0 text-center">STT</th>
                                    <th class="col-3 text-center">Tên HP </th>
                                    <th class="col-1 text-center">số TC</th>
                                    <th class="col-3 text-center">Điểm thành phần</th>
                                    <th class="col-1 text-center">Hệ 10</th>
                                    <th class="col-2 text-center">Hệ 4</th>
                                    <th class="col-3 text-center">Điểm chữ</th>
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
                                    <td class="text-center"><?php echo $row['tenhp'] ?></td>
                                    <td class="text-center"><?php echo $row['sotinchi'] ?></td>
                                    <td class="text-center">QT:<?php echo $row['quatrinh'] ?>   CK:<?php echo $row['cuoiky'] ?></td>
                                    <td class="text-center"><?php echo ($row['quatrinh']+$row['cuoiky'])/2; ?></td>
                                    <td class="text-center"><?php
                                                            $average = ($row['quatrinh'] + $row['cuoiky']) / 2;
                                                            if ($average >= 8.5) {
                                                                $gpa = 4.0;
                                                            } elseif ($average >= 7.0) {
                                                                $gpa = 3.0;
                                                            } elseif ($average >= 5.5) {
                                                                $gpa = 2.0;
                                                            } elseif ($average >= 4.0) {
                                                                $gpa = 1.0;
                                                            } else {
                                                                $gpa = 0.0;
                                                            }

                                                            echo $gpa;
                                                            ?></td>
                                    <td class="text-center"><?php
                                                            $average = ($row['quatrinh'] + $row['cuoiky']) / 2;
                                                        
                                                            // Chuyển đổi điểm trung bình sang thang điểm hệ 4
                                                            if ($average >= 8.5) {
                                                                $gpa = 'A';
                                                            } elseif ($average >= 8) {
                                                                $gpa = 'B+';
                                                            } elseif ($average >= 7.0) {
                                                                $gpa = 'B';
                                                            } elseif ($average >= 6.5) {
                                                                $gpa = 'C+';
                                                            } elseif ($average >= 5.5) {
                                                                $gpa = 'C';
                                                            } elseif ($average >= 5) {
                                                                $gpa = 'D+';
                                                            } elseif ($average >= 4.0) {
                                                                $gpa = 'D';
                                                            } else {
                                                                $gpa = 'F';
                                                            }
                                                        
                                                            echo $gpa;
                                                            ?></td>
                                    <td class="text-center">
                                    
                                     
                                    </td>
                                </tr>
    
                                <?php
                                }
                                ?>
                            </body>
                        </table>
                        <?php else: ?> 

<h1>Chưa có học lớp nào</h1>

<?php endif; ?> 
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

</body>