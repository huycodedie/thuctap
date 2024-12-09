<?php 
$sql_danhsach = "SELECT * FROM bangdiem b
                JOIN qllophocphan p ON p.malhp = b.malhp 
                JOIN qlhocphan h ON h.mahp = p.mahp
                JOIN usersv s ON s.idsv = b.masv
                WHERE masv ='$_GET[idsv]' ORDER BY madiem"; 
$query_danhsach = mysqli_query($mysqli,$sql_danhsach);
$query_danhsach2 = mysqli_query($mysqli,$sql_danhsach);
?>
< id="main" class="main">

<?php if ($query_danhsach->num_rows > 0){ ?> 

<?php          
        $row = mysqli_fetch_array($query_danhsach2);
        if($row){   
        ?>
    <div class="pagetitle">
    <h1>Danh sách điểm: <?php echo $row['usernamesv'] ?></h1>
    <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php?action=khoa&idgv=<?php echo $row['idgv'] ?>">Home</a></li>
      <li class="breadcrumb-item"><a href="index.php?action=danh-sach-sv&idgv=<?php echo $_GET['idgv'] ?>&idlhc=<?php echo $row['malhc'] ?>">danh sách</a></li>
      <li class="breadcrumb-item"><a href="index.php?action=diem-sinh-vien&idsv=<?php echo $_GET['idsv'] ?>&idlhc=<?php echo $row['malhc'] ?>">danh sách</a></li>
    </nav>
</div>
<?php } ?>
    <section class="section dashboard">
        <div class="row">
            <div class="col-12">
                <div class="card recend-sales overflow-auto">
                    <div class="card-body mt-4">
                   
                        <table class="table table-broderless datatable">
                            <thead>
                                <tr>
                                    <th class="col-0 text-center">STT</th>
                                    <th class="col-3 text-center">Tên HP </th>
                                    <th class="col-1 text-center">số TC</th>
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
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php }else: ?> 

<h1>Chưa học môn nào</h1>

<?php endif; ?> 
</main>