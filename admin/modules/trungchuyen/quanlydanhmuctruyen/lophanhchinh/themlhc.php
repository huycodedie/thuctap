<?php 
$sql_danhsach = "SELECT*FROM qlkhoa ORDER BY idkhoa";
$query_danhsach = mysqli_query($mysqli,$sql_danhsach);
?>
<main id="main" class="main">
    <div class="pagetitle">
        <h2>Thêm lớp hành chính</h2>
    </div>
    <form asp-action="Create" method="POST" action="modules/trungchuyen/quanlydanhmuctruyen/lophanhchinh/xulylhc.php" >           
    <div class="row">
        <div class="col-12">
            <div class="card recend-sales overflow-auto">
                <div class="card-body mt-4">      
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Tên lớp hành chính</label>
                        <div class="col-sm-10">
                            <input asp-for="CreatedBy" type="text" placeholder="nhập tên" class="form-control"  name="tenlop">
                        </div>
                    </div>
                    <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Mã khoa</label>
                        <div class="col-sm-10">

                        <select name="makhoa" id="search" asp-for="CreatedBy" type="text" class="form-control" ><option >chọn khoa</option>
                        <?php 
                        $i = 0;
                        while($row = mysqli_fetch_array($query_danhsach)){
                            $i++;
                        ?>

                                <option  ><?php echo $row['idkhoa'] ?> - <?php echo $row['tenkhoa']  ?></option>
                        <?php 
                        } 
                        ?>
                        </select>

                        </div>
                    </div>
                    <button type="submit" name="themlhc" class="btn btn-lg btn-primary p-2"><i class="bi bi-file-plus-fill"></i>Lưu</button>
                    <a href="index.php?action=lhc" asp-controller="Book" asp-action="Index" class="btn btn-lg btn-warning p-2">Quay lại</a>
                </div>
            </div>
        </div>
    </div>
    </form>
    <!-- End Form -->

</main>
<script>
    $(document).ready(function() {
    $('#search').select2({    
    });
});

</script>



