<?php 
$sql_danhsach = "SELECT*FROM qlkhoa 
                  
                    ORDER BY idkhoa";
$query_danhsach = mysqli_query($mysqli,$sql_danhsach);
?>
<main id="main" class="main">
    <div class="pagetitle">
        <h2>Thêm học phần</h2>
    </div>
    <!-- Begin Form -->
    <div class="row">
        <div class="col-12">
            <div class="card recend-sales overflow-auto">
                <div class="card-body mt-4">
                    <form asp-action="Create" method="POST" action="modules/trungchuyen/quanlydanhmuctruyen/hocphan/xulyhp.php" >           
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Tên học phần</label>
                                <div class="col-sm-5">
                                    <input asp-for="CreatedBy" type="text" placeholder="nhập tên" class="form-control"  name="tenhp">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Số tín chỉ</label>
                                <div class="col-sm-5">
                                    <input asp-for="CreatedBy" type="text" placeholder="nhập tên" class="form-control"  name="tinchi">
                                </div>
                            </div>
                            <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Khoa</label>
                                <div class="col-sm-5">

                                <select name="makhoa" id="search" asp-for="CreatedBy" type="text" class="form-control" ><option >Chọn khoa</option>
                                <?php 
                                $i = 0;
                                while($row = mysqli_fetch_array($query_danhsach)){
                                    $i++;
                                ?>

                                        <option value="<?php echo $row['idkhoa'] ?>" ><?php echo $row['tenkhoa']  ?></option>
                                <?php 
                                } 
                                ?>
                                </select>

                                </div>
                            </div>
                            <button type="submit" name="themhp" class="btn btn-lg btn-primary p-2"><i class="bi bi-file-plus-fill"></i>Lưu</button>
                         <a href="index.php?action=hp" asp-controller="Book" asp-action="Index" class="btn btn-lg btn-warning p-2">Quay lại</a>  
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Form -->

</main>
<script>
    $(document).ready(function() {
    $('#search').select2({    
    });
});

</script>


