<?php 
$user_id = mysqli_real_escape_string($mysqli, $_SESSION['user_id']);
$sql_danhsach = "SELECT * FROM bangdiem b
                JOIN qllophocphan p ON p.malhp = b.malhp 
                JOIN qlhocphan h ON h.mahp = p.mahp
                JOIN usersv s ON s.idsv = b.masv      
                WHERE masv ='$_GET[idsv]' ORDER BY madiem"; 
$query_danhsach = mysqli_query($mysqli,$sql_danhsach);
$sql_danhsach2 = "SELECT * FROM bangdiem b
                JOIN qllophocphan p ON p.malhp = b.malhp 
                JOIN qlhocphan h ON h.mahp = p.mahp
                JOIN usersv s ON s.idsv = b.masv      
                WHERE masv ='$_GET[idsv]' ORDER BY madiem"; 
$query_danhsach2 = mysqli_query($mysqli,$sql_danhsach2);

?>
<main id="main" class="main">
<?php          
        $row = mysqli_fetch_array($query_danhsach2);
        if($row){   
        ?>
    <div class="pagetitle">
    <h1>Danh sách điểm: <?php echo $row['usernamesv'] ?></h1>
    <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php?action=khoa&idgv=<?php echo $user_id ?>">Home</a></li>
      <li class="breadcrumb-item"><a href="index.php?action=danh-sach-sv&idgv=<?php echo $user_id ?>&idlhc=<?php echo $row['malhc'] ?>">danh sách</a></li>
      <li class="breadcrumb-item"><a href="index.php?action=diem-sinh-vien&idsv=<?php echo $_GET['idsv'] ?>">Điểm</a></li>
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
                                    <th class="col-1 text-center">STT</th>
                                    <th class="col-3 text-center">Tên HP </th>
                                    <th class="col-1 text-center">Số TC</th>
                                    <th class="col-3 text-center">Điểm quá trình</th>
                                   
                                    <th class="col-3 text-center">Điểm cuối kỳ</th>
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
                                    <td class="text-center"><?php echo $row['tenlhp'] ?></td>
                                    <td class="text-center"><?php echo $row['sotinchi'] ?></td>
                                    <td class="text-center"><?php echo $row['quatrinh'] ?></td>
                                
                                    <td class="text-center"><?php echo $row['cuoiky'] ?></td>
                                    <td class="text-center">
                                    
                                     
                                    </td>
                                </tr>
    
                                <?php
                                }
                                ?>
                            </body>
                        </table>
                        <?php else: ?> 

<h1>Chưa học môn nào</h1>

<?php endif; ?> 
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>