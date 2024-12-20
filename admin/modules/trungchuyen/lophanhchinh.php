<?php 
$sql_danhsach = "SELECT *
               FROM qllophanhchinh c
               JOIN qlkhoa k ON c.makhoa = k.idkhoa
               LEFT JOIN viewusergv_khoa v ON v.malhc = c.idlhc
               LEFT JOIN usergv g ON g.idgv = v.magv
               ORDER BY c.idlhc"; 
$query_danhsach = mysqli_query($mysqli,$sql_danhsach);
?>


<main id="main" class="main">
    <div class="pagetitle">
        <h3>Danh sách lớp hành chính</h3>
    </div>
    <p>
        <a href="index.php?action=themlhc" type="button" class="btn btn-success">
            <i class="bi bi-file-earmark-text me-1"></i>Thêm lớp hành chính
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
                                    
                                    <th class="col-3 text-center">Tên lớp</th> 
                                    <th class="col-2 text-center">Tên giáo viên</th>                                 
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
                                    <th class="text-center" scope="row"> <?php echo $row['tenlop'] ?> </th>  
                                    <th class="text-center" scope="row"> <?php echo $row['username'] ?> </th>  
                                    <th class="text-center" scope="row"> <?php echo $row['tenkhoa'] ?> </th>
                                    <td class="text-center">
                                        <a href="index.php?action=phutrach&idlhc=<?php echo $row['idlhc'] ?>" class="btn btn-success btn-sm" title="thêm người phụ trách"><i class="bi bi-person"></i></a>
                                        <a href="index.php?action=sualhc&idlhc=<?php echo $row['idlhc'] ?>" class="btn btn-primary btn-sm" title="sửa nội dung"><i class="bi bi-pencil"></i></a>
                                        <a href="modules/trungchuyen/quanlydanhmuctruyen/lophanhchinh/xulylhc.php?idlhc=<?php echo $row['idlhc'] ?>" class="btn btn-danger btn-sm" title="xóa lớp hành chính"><i class="bi bi-trash"></i></a>
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