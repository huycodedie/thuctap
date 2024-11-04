<?php 
$sql_danhsach = "SELECT *
               FROM qlkhoa k
               JOIN qllophanhchinh c ON c.makhoa = k.idkhoa
               WHERE c.makhoa='$_GET[idkhoa]'
              " ; 
$query_danhsach = mysqli_query($mysqli,$sql_danhsach);
$query_danhsach2 = mysqli_query($mysqli,$sql_danhsach);
?>

<main id="main" class="main">
    <div class="pagetitle">
        <h3>Danh sách lớp hành chính</h3>
    </div>
    <p>                 
        <a href="index.php?action=khoa" type="button" class="btn btn-success">
            <i class="bi bi-file-earmark-text me-1"></i>Trở lại
        </a>
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
                                    <td class="text-center"><?php echo $row['idlhc'] ?></td>
                                    <th class="text-center" scope="row"> <?php echo $row['tenlop'] ?> </th>  
                                    <th class="text-center" scope="row"> <?php echo $row['tenkhoa'] ?> </th>    
                                    <td class="text-center">
                                        <a href="index.php?action=lhp&idlhc=<?php echo $row['idlhc'] ?>" class="btn btn-primary btn-sm" title="sua noi dung"><i class="bi bi-file-earmark-text me-1"></i></a>
                                       
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