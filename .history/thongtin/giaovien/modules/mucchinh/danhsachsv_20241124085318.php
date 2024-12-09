<?php 
$sql_danhsach = "SELECT * FROM usersv
                WHERE malhc ='$_GET[idlhc]' ORDER BY idsv"; 
$query_danhsach = mysqli_query($mysqli,$sql_danhsach);
$query_danhsach2 = mysqli_query($mysqli,$sql_danhsach);
?>
<main id="main" class="main">
    <div class="pagetitle">
        <h3>Danh sách sinh viên</h3>
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
                                    <th class="col-3 text-center">Tên sinh viên</th>
                                    <th class="col-3 text-center">Email</th>
                                    <th class="col-3 text-center">Số điện thoại</th>
                                    <th class="col-3 text-center">Địa chỉ</th>
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
                                    <td class="text-center"><?php echo $row['email'] ?></td>
                                    <td class="text-center"><?php echo $row['sdt'] ?></td>
                                    <td class="text-center"><?php echo $row['diachi'] ?></td>
                                    <td class="text-center">
                                      <a href="index.php?action=diem-sinh-vien&idsv=<?php echo $row['idsv'] ?>" class="btn btn-primary btn-sm" title="sua noi dung"><i class="bi bi-file-earmark-text me-1"></i></a> 
                                     
                                    </td>
                                </tr>
    
                                <?php
                                }
                                ?>
                            </body>
                        </table>
                        <?php else: ?> 

<h1>Chưa có sinh viên nào</h1>

<?php endif; ?> 
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>