<?php 
$sql_sualhc = "SELECT*FROM qllophanhchinh c
                JOIN qlkhoa k ON k.idkhoa = c.makhoa
                 WHERE idlhc='$_GET[idlhc]'LIMIT 1 ";
$query_sualhc = mysqli_query($mysqli,$sql_sualhc);
?>



<?php 
$sql_joine = "SELECT * 
               FROM qlkhoa
               ORDER BY idkhoa ASC";
$query_joine= mysqli_query($mysqli, $sql_joine); 

if (!$query_joine) { 
    die("SQL Error: " . $mysqli->error); 
}
?>
<main id="main" class="main">
    <form method="POST" action="modules/trungchuyen/quanlydanhmuctruyen/lophanhchinh/xulylhc.php?idlhc=<?php echo $_GET['idlhc'] ?>" enctype="multipart/form-data">
    <div class="row pb-2">
        <h2>Sửa lớp hành chính</h2>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card recend-sales overflow-auto">
                <div class="card-body mt-4">
                    <form method="post" asp-action="Edit">      
                        <?php 
                        while($dong = mysqli_fetch_array($query_sualhc)){
                        ?>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Tên lớp</label>
                            <div class="col-sm-10">
                                <input asp-for="Name" value="<?php echo $dong['tenlop'] ?>" type="text" name="tenlop" class="form-control" placeholder="Nhập" >
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">khoa</label>
                            <div class="col-sm-10">

                            <select asp-for="BookName" id="search" type="text" class="form-control" placeholder="Nhập" name="makhoa">
                                  <option value="<?php echo $dong ['makhoa']?>" ><?php echo $dong ['tenkhoa']?></option>
                                    
                                    <?php
                                    while($row = mysqli_fetch_array($query_joine)){
                                    ?>
                                        <option value="<?php echo $row['idkhoa'] ?>" ><?php echo $row['tenkhoa']  ?></option>
                                    <?php 
                                    }
                                    ?>
                            </select>
                            </div>
                        </div>
                            <button type="submit" name="sualhc" class="btn btn-lg btn-primary p-2"><i class="bi bi-file-plus-fill"></i>Lưu</button> <a  href="index.php?action=lhc" asp-controller="BookCategory" asp-action="Index" class="btn btn-lg btn-warning p-2">Quay lại</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php 
    }
    ?>
    </form>
</main>
<script>
    $(document).ready(function() {
    $('#search').select2({    
    });
});

</script>
