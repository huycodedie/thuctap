<?php 
$sql_danhsach = "SELECT *
                FROM qllophocphan l
                JOIN qlhocphan p
                ON l.mahp = p.mahp
                JOIN qllophanhchinh c
                ON p.malhc = c.idlhc
                JOIN qlkhoa k
                ON c.makhoa = k.idkhoa
                JOIN usergv g
                ON g.idgv = l.magv
                ORDER BY l.malhp ";




$query_danhsach = mysqli_query($mysqli,$sql_danhsach);
?>
<main id="main" class="main">
    <div class="pagetitle">
        <h3>Danh sách lớp học phần</h3>
    </div>
    <p>
        <a href="index.php?action=themlhp" type="button" class="btn btn-success">
            <i class="bi bi-file-earmark-text me-1"></i>Thêm lớp học phần
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
                                    <th class="col-1 text-center">STT</th>
                                    <th class="col-2 text-center">Mã lớp học phần</th>
                                    <th class="col-2 text-center">Tên lớp học phần</th>
                                    <th class="col-2 text-center">Tên mã học phần</th>                                  
                                    <th class="col-2 text-center">Tên giáo viên phụ trách</th>
                                    <th class="col-2 text-center">Tên khoa</th>

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
                                    <th class="text-center" scope="row"> <?php echo $row['tenlhp'] ?> </th>  
                                    <th class="text-center" scope="row"> <?php echo $row['username'] ?> </th>  
                                    <th class="text-center" scope="row"> <?php echo $row['tenkhoa'] ?> </th>   
                                    <td class="text-center">
                                        <a href="index.php?action=themsvl&malhp=<?php echo $row['malhp'] ?>" class="btn btn-success btn-sm" title="thêm sinh viên vào lớp"><i class="fa fa-plus"></i></a>
                                        
                                        <a href="index.php?action=sualhp&malhp=<?php echo $row['malhp'] ?>" class="btn btn-primary btn-sm" title="sua noi dung"><i class="bi bi-pencil"></i></a>
                                        <a href="modules/trungchuyen/quanlydanhmuctruyen/lophocphan/xulylhp.php?malhp=<?php echo $row['malhp'] ?>" class="btn btn-danger btn-sm" title="xoa lớp hành chính"><i class="bi bi-trash"></i></a>
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