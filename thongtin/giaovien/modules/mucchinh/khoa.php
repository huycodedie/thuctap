<?php 
$sql_danhsach = "SELECT*FROM qlkhoa k
                JOIN usergv g ON k.idkhoa = g.makhoa        
                WHERE g.idgv = '$_GET[idgv]' ORDER BY k.idkhoa";
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
                                    <th class="col-1 text-center">Mã khoa</th>
                                    <th class="col-2 text-center">Tên Khoa</th>
                                   
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
                                    

                                    <td class="text-center">
                                        <a href="index.php?action=lhc&idkhoa=<?php echo $row['idkhoa'] ?>" class="btn btn-primary btn-sm" title="noi dung"><i class="bi bi-file-earmark-text me-1"></i></a>
                                        
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