<?php 
$sql_danhsach = "SELECT*FROM usergv g
                JOIN bangdiem b ON b.magv = g.idgv
                JOIN qllophocphan p ON p.malhp = b.malhp
                JOIN usersv s ON s.idsv = b.masv
                WHERE b.magv = '$_GET[idgv]'AND b.malhp = '$_GET[malhp]'ORDER BY b.madiem";         
$query_danhsach = mysqli_query($mysqli,$sql_danhsach);
$query_danhsach2 = mysqli_query($mysqli,$sql_danhsach);

?>
<main id="main" class="main">
    <?php          
        $row = mysqli_fetch_array($query_danhsach2);
        if($row){   
        ?>
    <div class="pagetitle">
        <h3>Danh sách lớp <?php echo $row['tenlhp'] ?></h3>
    </div>
    <p>                 
        <a href="index.php?action=lop-hoc-phan&idgv=<?php echo $row['idgv'] ?>" type="button" class="btn btn-success">
            <i class="bi bi-file-earmark-text me-1"></i>Trở lại
        </a>
    </p>
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
                                    <th class="col-0 text-center">Tên sinh viên</th>
                                    <th class="col-3 text-center">Quá trình</th>                                  
                                  
                                    <th class="col-3 text-center">Cuối kỳ</th>
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
                                    <td class="text-center"><?php echo $row['usernamesv'] ?></td>
                                    <th class="text-center" scope="row"> <?php echo $row['quatrinh'] ?> </th>  
                                    
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