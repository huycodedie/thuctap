<?php 
$sql_sualhp = "SELECT*FROM qlhocphan WHERE mahp='$_GET[mahp]'LIMIT 1 ";
$query_sualhp = mysqli_query($mysqli,$sql_sualhp);
?>

<?php 
$sql_joine2 = "SELECT * 
               FROM  qllophanhchinh c
               JOIN qlkhoa k
               ON k.idkhoa = c.makhoa             
               ORDER BY idlhc ASC";
$query_joine2= mysqli_query($mysqli, $sql_joine2); 
?>
<main id="main" class="main">
    <form method="POST" action="modules/trungchuyen/quanlydanhmuctruyen/hocphan/xulyhp.php?mahp=<?php echo $_GET['mahp'] ?>" enctype="multipart/form-data">
    <div class="row pb-2">
        <h2>Sửa lớp học phần</h2>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card recend-sales overflow-auto">
                <div class="card-body mt-4">
                    <form method="post" asp-action="Edit">                    
                        <?php 
                        while($dong = mysqli_fetch_array($query_sualhp)){
                        ?>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Tên học phần</label>
                            <div class="col-sm-10">
                                <input asp-for="Name" value="<?php echo $dong['tenhp'] ?>" type="text" name="tenhp" class="form-control" placeholder="Nhập" >
                            </div>
                        </div>
                        <?php 
                        }
                        ?>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Lớp hành chính</label>
                            <div class="col-sm-10">

                            <select asp-for="BookName" id="search" class="form-control" placeholder="Nhập" name="malhc">

                                    <?php
                                    while($row = mysqli_fetch_array($query_joine2)){
                                    ?>
                                        <option ><?php echo $row['idlhc'] ?> - <?php echo $row['tenlop']  ?> - <?php echo $row['tenkhoa']  ?></option>
                                    <?php 
                                    }
                                    ?>
                            </select>
                            </div>
                        </div>
                            <button type="submit" name="suahp" class="btn btn-lg btn-primary p-2"><i class="bi bi-file-plus-fill"></i>Lưu</button> <a  href="index.php?action=hp" asp-controller="BookCategory" asp-action="Index" class="btn btn-lg btn-warning p-2">Quay lại</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </form>
</main>
<script>
    $(document).ready(function() {
    $('#search').select2({    
    });
});

</script>
