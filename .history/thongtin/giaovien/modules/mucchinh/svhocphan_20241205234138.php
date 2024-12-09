<?php 
$user_id = mysqli_real_escape_string($mysqli, $_SESSION['user_id']);
$sql_danhsach = "SELECT*FROM usergv g
                 left JOIN bangdiem b ON b.magv = g.idgv
                 JOIN qllophocphan p ON p.malhp = b.malhp
                 JOIN usersv s ON s.idsv = b.masv
                WHERE b.magv = '$_GET[idgv]'AND b.malhp = '$_GET[malhp]'ORDER BY b.madiem";         
$query_danhsach = mysqli_query($mysqli,$sql_danhsach);



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
                                    <th class="col-2 text-center">Mã sinh viên</th></th>
                                    <th class="col-2 text-center">Tên sinh viên</th>
                                    <th class="col-1 text-center">Quá trình</th>                                  
                                    <th class="col-3 text-center">Cuối kỳ</th>
                                    <th class="col-3 text-center">Điểm thi lại</th>
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
                                    <td class="text-center"><?php echo $row['masv'] ?></td>
                                    <td class="text-center"><?php echo $row['usernamesv'] ?></td>
                                    <th class="text-center" scope="row"> <?php echo $row['quatrinh'] ?> </th>  
                                    <th class="text-center" scope="row"> <?php echo $row['cuoiky'] ?> </th>

                                    <th class="text-center" scope="row"> <?php echo $row['cuoiky'] ?> </th>

                                    <td class="text-center">
                                       <?php $sua = $row['sua']; 
                                        if($sua < 1){
                                       ?> 
                                        <a href="index.php?action=them-diem-sinh-vien&malhp=<?php echo $row['malhp'] ?>&masv=<?php echo $row['masv'] ?>" class="btn btn-primary btn-sm" title="sua noi dung"><i class="bi bi-file-earmark-text me-1"></i></a>
                                       <?php }else{ ?>
                                        
                                        <?php } ?>
                                    </td>
                                    
                                </tr>
    
                                <?php
                                }
                                ?>
                            </body>
                        </table>
                        <?php else: ?> 

<h1>Chưa có lớp hành chính nào</h1>

<?php endif; ?> 
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>