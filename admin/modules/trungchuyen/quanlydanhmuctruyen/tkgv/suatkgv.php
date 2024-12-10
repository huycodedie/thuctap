<?php 
$sql_suakhoa = "SELECT*FROM qlkhoa WHERE idkhoa='$_GET[idkhoa]'LIMIT 1 ";
$query_suakhoa = mysqli_query($mysqli,$sql_suakhoa);
?>
<main id="main" class="main">
    <form method="POST" action="modules/trungchuyen/quanlydanhmuctruyen/khoa/xulykhoa.php?idkhoa=<?php echo $_GET['idkhoa'] ?>" enctype="multipart/form-data">
        <div class="row pb-2">
            <h2>Sửa khoa</h2>
        </div>
    <div class="row">
        <div class="col-12">
            <div class="card recend-sales overflow-auto">
                <div class="card-body mt-4">
                    <form method="post" asp-action="Edit">
                    <?php 
                        while($dong = mysqli_fetch_array($query_suakhoa)){
                        ?>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Tên khoa</label>
                            <div class="col-sm-10">
                                <input asp-for="Name" value="<?php echo $dong['tenkhoa'] ?>" type="text" name="tenkhoa" class="form-control" >
                            </div>
                       </div>
                        <?php 
             }
                        ?>

                        <button type="submit" name="suakhoa" class="btn btn-lg btn-primary p-2"><i class="bi bi-file-plus-fill"></i>Lưu</button> <a href="http://localhost/cnpm/admin/index.php?action=khoa" asp-controller="BookCategory" asp-action="Index" class="btn btn-lg btn-warning p-2">Quay lại</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    </form>
</main>

