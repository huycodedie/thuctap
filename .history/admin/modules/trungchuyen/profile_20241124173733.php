
<?php 
$sql_danhsach = "SELECT*FROM usergv ORDER BY idgv";
$query_danhsach = mysqli_query($mysqli,$sql_danhsach);

$sql_danh = "SELECT*FROM usersv s
                JOIN qllophanhchinh c
                ON s.malhc = c.idlhc
                JOIN qlkhoa k ON k.idkhoa = c.makhoa
                ORDER BY idsv";
$query_danh = mysqli_query($mysqli,$sql_danh);
?>

<!-- giáo viên -->
<main id="main" class="main">
    <div class="pagetitle">
        <h3>Tài khoản giáo viên</h3>
    </div>
    <p>
    <a href="index.php?action=themtkgv" type="button" class="btn btn-success">
            <i class="bi bi-file-earmark-text me-1"></i>Thêm giáo viên
        </a>
    
    <a href="index.php?action=themnhieutkgv" type="button" class="btn btn-success">
            <i class="bi bi-file-earmark-text me-1"></i>Thêm nhiều giáo viên
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
                                    <th class="col-1 text-center">MGV</th>
                                    <th class="col-2 text-center">Tên </th>
                                    <th class="col-1 text-center">Email</th>
                                    
                                    <th class="col-5 text-center">Ngày tạo</th>                                  
                                    
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
                                    <td class="text-center"><?php echo $row['username'] ?></td>
                                    <th class="text-center" > <?php echo $row['email'] ?> </th>
                                    
                                    
                                                                    
                                    <td class="text-center" ><?php echo $row['created_at'] ?></td>
                                    
                                    
                                    <td class="text-center">
                                    <a href="javascript:void(0);" onclick="confirmDeletiongv(<?php echo $row['idgv']; ?>);" class="btn btn-danger btn-sm" title="xóa giáo viên"><i class="bi bi-trash"></i></a> 
                                        
                                    </td>
                                </tr>
    
                                <?php
                                }
                                ?>
                            </body>
                        </table>
                        <?php else: ?> 
         
            <h2>Chưa có tài khoản giáo viên</h2>
        <?php endif; ?> 
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- sinh viên -->
    <div class="pagetitle">
        <h3>Tài khoản sinh viên</h3>
    </div>
    <p>
    <a href="index.php?action=themtksv" type="button" class="btn btn-success">
            <i class="bi bi-file-earmark-text me-1"></i>Thêm sinh viên
        </a>
    </p>
    <section class="section dashboard">
        <div class="row">
            <div class="col-12">
                <div class="card recend-sales overflow-auto">
                    <div class="card-body mt-4">
                    <?php if ($query_danh->num_rows > 0): ?> 
                        <table class="table table-broderless datatable">
                        
                            <thead>
                                <tr>
                                    <th class="col-1 text-center">MSV</th>
                                    <th class="col-2 text-center">Tên </th>
                                    <th class="col-1 text-center">Email</th>
                                    <th class="col-2 text-center">Lớp hành chính</th>
                                    <th class="col-2 text-center">khoa</th>
                                    <th class="col-5 text-center">Ngày tạo</th>                                  
                                    
                                </tr>
                            </thead>
                            <body>
                                <?php 
                                $i = 0;
                                while($row = mysqli_fetch_array($query_danh)){
                                    $i++;
                                ?>
                                <tr>
                                    <th class="text-center" scope="row"><?php echo $i ?> </th>
                                    <td class="text-center"><?php echo $row['usernamesv'] ?></td>
                                    <th class="text-center" > <?php echo $row['email'] ?> </th>
                                    <td class="text-center" > <?php echo $row['tenlop'] ?> </td>
                                    <td class="text-center" > <?php echo $row['tenkhoa'] ?> </td>
                                    
                                                                    
                                    <td class="text-center" scope="row"><?php echo $row['created_at'] ?></td>
                                    
                                    
                                    <td class="text-center">
                                        
                                    <a href="javascript:void(0);" onclick="confirmDeletionsv(<?php echo $row['idsv']; ?>);" class="btn btn-danger btn-sm" title="xóa sinh viên"><i class="bi bi-trash"></i></a> 
                                        
                                    </td>
                                </tr>
    
                                <?php
                                }
                                ?>
                            </body>
                            
                        </table>
                        <?php else: ?> 
          
            <h2>Chưa có tài khoản sinh viên</h2>
        <?php endif; ?> 
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<script>
    function confirmDeletiongv(idgv){
        var result =confirm("Bạn chắc chắn muốn xóa tài khoản giáo viên này");
        if(result){
            window.location.href = "modules/trungchuyen/quanlydanhmuctruyen/tkgv/xulytkgv.php?idgv=" + idgv;
        }
    }
</script>
<script>
    function confirmDeletionsv(idsv){
        var result =confirm("Bạn chắc chắn muốn xóa tài khoản sinh viên này");
        if(result){
            window.location.href = "modules/trungchuyen/quanlydanhmuctruyen/tksv/xulytksv.php?idsv=" + idsv;
        }
    }
</script>
