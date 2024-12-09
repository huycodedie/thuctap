<?php 
$sql_danhsach = "SELECT *
                FROM bangdiem b
                JOIN usergv g
                ON b.magv = g.idgv
                JOIN qllophocphan P
                ON p.malhp = b.malhp
                JOIN usersv s
                ON s.idsv = b.masv
                ORDER BY b.madiem ";

$query_danhsach = mysqli_query($mysqli,$sql_danhsach);
?>
<main id="main" class="main">
    <div class="pagetitle">
        <h3>Danh sách điểm</h3>
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
                                    <th class="col-1 text-center">STT</th>
                                    <th class="col-1 text-center">Tên sv</th>
                                    <th class="col-2 text-center">Tên lớp học phần</th>
                                    <th class="col-1 text-center">Tên giáo viên</th>                                  
                                    <th class="col-1 text-center">Quá trình</th>                 
                                    <th class="col-1 text-center">Cuối Kỳ</th>
                                    <th class="col-2 text-center">Thêm</th>

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
                                    
                                    <th class="text-center" scope="row"> <?php echo $row['usernamesv'] ?> </th>
                                    <th class="text-center" scope="row"> <?php echo $row['tenlhp'] ?> </th>  
                                    <th class="text-center" scope="row"> <?php echo $row['username'] ?> </th>  
                                    <th class="text-center" scope="row"> <?php echo $row['quatrinh'] ?> </th>       
                                    <th class="text-center" scope="row"> <?php echo $row['cuoiky'] ?> </th>   
                                    
                                    <td class="text-center">
                                        <div class="form-check form-switch">
                                        <form action="modules/trungchuyen/quanlydanhmuctruyen/bangdiem/xulydiem.php?madiem=<?php echo $row['madiem']; ?>" method="POST" style="display: inline;">
                                        <input type="hidden" name="madiem" value="<?php echo $row['madiem']; ?>">
                                        <input type="hidden" name="sua" value="1">
                                        <input name="sua" type="checkbox" class="form-check-input" title="Cấp quyền sửa điểm" onchange="this.form.submit();"  <?php echo ($row['sua'] == 1) ? 'checked' : ''; ?>></form>
                                        </div>
                                        <a href="index.php?action=themdiem&madiem=<?php echo $row['madiem'] ?>" class="btn btn-success btn-sm" title="thêm điểm cho sinh viên"><i class="bi bi-pencil"></i></a>
                                        <a href="javascript:void(0);" onclick="confirmDeletion(<?php echo $row['madiem']; ?>);" class="btn btn-danger btn-sm" title="xóa"><i class="bi bi-trash"></i></a>
                                    </td>
                                </tr>
    
                                <?php
                                }
                                ?>
                            </body>
                        </table>
                        <?php else: ?> 

<h1>Chưa có học sinh nào trong lớp học phần</h1>

<?php endif; ?> 
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<script>
    function confirmDeletion(madiem){
        var result =confirm("Bạn chắc chắn muốn xóa sinh viên này khỏi lớp này");
        if(result){
            window.location.href = "modules/trungchuyen/quanlydanhmuctruyen/bangdiem/xulydiem.php?madiem=" + madiem;
        }
    }
</script>