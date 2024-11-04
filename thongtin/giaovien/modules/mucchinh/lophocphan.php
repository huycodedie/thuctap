<?php 
$sql_danhsach = "SELECT * FROM qllophocphan l
                JOIN qlhocphan p
                ON l.mahp = p.mahp
                JOIN qllophanhchinh c
                ON p.malhc = c.idlhc
                JOIN qlkhoa k
                ON c.makhoa = k.idkhoa
                JOIN usergv g
                ON g.idgv = l.magv
                WHERE p.malhc='$_GET[idlhc]' "; 
$query_danhsach = mysqli_query($mysqli,$sql_danhsach);
?>
<?php 
$sql_danhsach2 = "SELECT * FROM qllophocphan l
                JOIN qlhocphan p
                ON l.mahp = p.mahp
                JOIN qllophanhchinh c
                ON p.malhc = c.idlhc
                JOIN qlkhoa k
                ON c.makhoa = k.idkhoa
                JOIN usergv g
                ON g.idgv = l.magv
                WHERE p.malhc='$_GET[idlhc]'LIMIT 1 "; 

$query_danhsach2 = mysqli_query($mysqli,$sql_danhsach2);
?>
<main id="main" class="main">
    <div class="pagetitle">
        <h3>Danh sách lớp học phần</h3>
    </div>
    <p><?php 
            $i = 0;
            while($row = mysqli_fetch_array($query_danhsach2)){
                $i++;
        ?>
            <a href="index.php?action=lhc&idkhoa=<?php echo $row['idkhoa'] ?>" type="button" class="btn btn-success">
                <i class="bi bi-file-earmark-text me-1"></i>Trở lại
            </a>
        <?php
         } 
        ?>
    </p>
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
                                    <th class="col-0 text-center">Mã lớp</th>
                                    <th class="col-3 text-center">Tên lớp</th>                                  
                                    <th class="col-3 text-center">Tên lớp hành chính</th>
                                    <th class="col-3 text-center">Tên khoa</th>

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
                                    <td class="text-center"><?php echo $row['mahp'] ?></td>
                                    <th class="text-center" scope="row"> <?php echo $row['tenhp'] ?> </th>  
                                    <th class="text-center" scope="row"> <?php echo $row['tenlop'] ?> </th>  
                                    <th class="text-center" scope="row"> <?php echo $row['tenkhoa'] ?> </th>   
                                    <td class="text-center">
                                       <!-- <a href="index.php?action=sualhp&mahp=<?php echo $row['mahp'] ?>" class="btn btn-primary btn-sm" title="sua noi dung"><i class="bi bi-file-earmark-text me-1"></i></a> -->
                                     
                                    </td>
                                </tr>
    
                                <?php
                                }
                                ?>
                            </body>
                        </table>
                        <?php else: ?> 

<h1>Chưa có lớp học phần nào</h1>

<?php endif; ?> 
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>