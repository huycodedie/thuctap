<?php 
$sql_lhc2 = "SELECT * FROM qllophanhchinh c
             JOIN qlkhoa k ON k.idkhoa = c.makhoa
             JOIN viewusergv_khoa v ON v.malhc = c.idlhc
             
             JOIN usergv g ON g.idgv = v.magv 
             
             WHERE idlhc='$_GET[idlhc]' LIMIT 1";
                 
$sql_lhc = "SELECT * FROM qllophanhchinh c
            JOIN qlkhoa k ON k.idkhoa = c.makhoa
            WHERE idlhc='$_GET[idlhc]' LIMIT 1";

$sql_danhsach = "SELECT * FROM usergv ORDER BY idgv";
$query_danhsach = mysqli_query($mysqli, $sql_danhsach);
$query_lhc = mysqli_query($mysqli, $sql_lhc);
$query_lhc2 = mysqli_query($mysqli, $sql_lhc2);
?>

<main id="main" class="main">
    <div class="pagetitle">
        <h2>Thêm giáo viên vào lớp hành chính</h2>
    </div>
    <form asp-action="Create" method="POST" action="modules/trungchuyen/quanlydanhmuctruyen/lophanhchinh/xulylhc.php?idlhc=<?php echo $_GET['idlhc'] ?>" enctype="multipart/form-data" >           
        <div class="row">
            <div class="col-12">
                <div class="card recend-sales overflow-auto">
                    <div class="card-body mt-4">
                        <?php 
                        while($row = mysqli_fetch_array($query_lhc)){
                        ?>    
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Khoa</label>
                                <div class="col-sm-10" >
                                    <input asp-for="CreatedBy" type="text" value="<?php echo $row['tenkhoa'] ?>" class="form-control"  readonly>
                                    <input style="display: none;" asp-for="CreatedBy" type="text" value="<?php $row['makhoa'] ?> " class="form-control" name="makhoa" readonly>
                                </div>
                            </div>  
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Lớp hành chính</label>
                                <div class="col-sm-10">
                                    <input asp-for="CreatedBy" type="text" value=" <?php echo $row['tenlop'] ?>" class="form-control"  readonly>
                                    <input style="display: none;" asp-for="CreatedBy" type="text" value="<?php echo $row['idlhc'] ?> " class="form-control" name="tenlop" readonly>
                                </div>
                            </div>
                        <?php } ?>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Giáo viên phụ trách</label>
                            <div class="col-sm-10">
                                <select name="gv" id="search" asp-for="CreatedBy" class="form-control">
                                    
                                    <?php if ($query_lhc2->num_rows > 0): ?> 
                                        <?php 
                                       $row = mysqli_fetch_array($query_lhc2);
                                       if($row){
                                        ?>
                                            <option value="<?php echo $row['idgv'] ?>"><?php echo $row['username'] ?></option>
                                        <?php } ?>
                                    <?php else: ?>
                                        <option value="">Chọn giáo viên</option>
                                    <?php endif;  ?> 
                                    <?php 
                                    while($row = mysqli_fetch_array($query_danhsach)){
                                    ?>
                                        <option value="<?php echo $row['idgv'] ?>"><?php echo $row['username'] ?></option>
                                    <?php 
                                    } 
                                    ?>
                                </select>
                            </div>
                        </div>

                        <button type="submit" name="themphutrach" class="btn btn-lg btn-primary p-2"><i class="bi bi-file-plus-fill"></i>Thêm</button>
                        <a href="index.php?action=lhc" asp-controller="Book" asp-action="Index" class="btn btn-lg btn-warning p-2">Quay lại</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</main>

<script>
    $(document).ready(function() {
        $('#search').select2();    
    });

    function validateSelection() {
        const selectedValue = document.getElementById('search').value;
        if (selectedValue === "") {
            alert("Đã có giáo viên phụ trách hoặc chưa chọn giáo viên phụ trách");
            return false; 
        }
        return true;
    }
</script>
