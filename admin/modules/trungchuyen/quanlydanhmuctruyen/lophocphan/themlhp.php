<?php 
$sql_danhsach = "SELECT*FROM qlhocphan ORDER BY mahp";
$query_danhsach = mysqli_query($mysqli,$sql_danhsach);
?>
<?php 
$sql_danhsachgv = "SELECT*FROM usergv ORDER BY idgv";
$query_danhsachgv = mysqli_query($mysqli,$sql_danhsachgv);
?>
<main id="main" class="main">
    <div class="pagetitle">
        <h2>Thêm lớp học phần</h2>
    </div>
    <!-- Begin Form -->
    <div class="row">
        <div class="col-12">
            <div class="card recend-sales overflow-auto">
                <div class="card-body mt-4">
                    <form asp-action="Create" method="POST" action="modules/trungchuyen/quanlydanhmuctruyen/lophocphan/xulylhp.php" >           
                            
                    <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Mã học phần</label>
                                <div class="col-sm-3">

                                <select name="mahp" id="mahp" asp-for="CreatedBy" type="text" class="form-control" ><option >chọn học phần</option>
                                <?php 
                                $i = 0;
                                while($row = mysqli_fetch_array($query_danhsach)){
                                    $i++;
                                ?>
                                        <option value="<?php echo $row['mahp'] ?>" ><?php echo $row['tenhp']  ?></option>
                                <?php 
                                } 
                                ?>
                                </select>

                                </div>
                            </div><div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Tên lớp học phần</label>
                                <div class="col-sm-3">
                                    <input asp-for="CreatedBy" type="text" placeholder="nhập tên" class="form-control"  name="tenlhp" required>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">giáo viên phụ trách</label>
                                <div class="col-sm-3">

                                <select name="magv" id="idgv" asp-for="CreatedBy" type="text" class="form-control " ><option >chọn giáo viên</option>
                                <?php 
                                $i = 0;
                                while($row = mysqli_fetch_array($query_danhsachgv)){
                                    $i++;
                                ?>
                                        <option value="<?php echo $row['idgv'] ?>" ><?php echo $row['username']  ?></option>
                                <?php 
                                } 
                                ?>
                                </select>

                                </div>
                            </div>
                            <button type="submit" name="themlhp" class="btn btn-lg btn-primary p-2"><i class="bi bi-file-plus-fill"></i>Lưu</button>
                         <a href="index.php?action=lhp" asp-controller="Book" asp-action="Index" class="btn btn-lg btn-warning p-2">Quay lại</a>  
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Form -->

</main>
<script>
    $(document).ready(function() {
    $('#mahp').select2({    
    });
});

</script>

<script>
    $(document).ready(function() {
    $('#idgv').select2({    
    });
});

</script>
