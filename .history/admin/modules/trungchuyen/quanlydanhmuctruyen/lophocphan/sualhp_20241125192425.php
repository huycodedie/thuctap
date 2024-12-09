<?php 
$sql_sualhp = "SELECT*FROM qllophocphan a
                    JOIN qlhocphan b ON a.mahp = b.mahp
                    LEFT JOIN viewusergv_lhp v ON v.malhp = a.malhp
                    LEFT JOIN usergv g ON g.idgv = v.magv
                     WHERE a.malhp='$_GET[malhp]'LIMIT 1 ";
$query_sualhp = mysqli_query($mysqli,$sql_sualhp);
$query_sualhp2 = mysqli_query($mysqli,$sql_sualhp);
$query_sualhp3 = mysqli_query($mysqli,$sql_sualhp);
?>

<?php 
$sql_joine2 = "SELECT * 
               FROM  qlhocphan              
               ORDER BY mahp ASC";
$query_joine2= mysqli_query($mysqli, $sql_joine2); 

$sql_joine = "SELECT * 
               FROM  usergv             
               ORDER BY idgv ASC";
$query_joine= mysqli_query($mysqli, $sql_joine); 
?>
<main id="main" class="main">
    <form method="POST" action="modules/trungchuyen/quanlydanhmuctruyen/lophocphan/xulylhp.php?malhp=<?php echo $_GET['malhp'] ?>" enctype="multipart/form-data">
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
                            <label class="col-sm-2 col-form-label">Tên lớp học phần</label>
                            <div class="col-sm-10">
                                <input asp-for="Name" value="<?php echo $dong['tenlhp'] ?>" type="text" name="tenlhp" class="form-control" placeholder="Nhập" >
                            </div>
                        </div>
                        <?php 
                        }
                        ?>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Lớp học phần</label>
                            <div class="col-sm-10">

                            <select asp-for="BookName" id="search" class="form-control" placeholder="Nhập" name="mahp">
                                    <?php $row = mysqli_fetch_array($query_sualhp2); if($row){ ?>

                                    <option value="<?php echo $row['mahp']?>"> <?php echo $row['tenhp']?><?php } ?></option>
                                   
                                   <?php
                                    while($row = mysqli_fetch_array($query_joine2)){
                                    ?>
                                        <option value="<?php echo $row['mahp'] ?>"> <?php echo $row['tenhp']  ?></option>
                                    <?php 
                                    }
                                    ?>
                            </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Giáo viên</label>
                            <div class="col-sm-10">

                            <select asp-for="BookName" id="search1" class="form-control" placeholder="Nhập" name="magv">
                                    <?php $row = mysqli_fetch_array($query_sualhp3); if($row) { ?>
                                    
                                        <option value="<?php echo $row['idgv'] ?>"><?php echo $row['username']?></option>
                                    
                                        <?php } ?>
                                    
                                    <?php
                                    while($row = mysqli_fetch_array($query_joine)){
                                    ?>
                                        <option value="<?php echo $row['idgv'] ?>"><?php echo $row['username']  ?></option>
                                    <?php 
                                    }
                                    ?>
                            </select>
                            </div>
                        </div>
                            <button type="submit" name="sualhp" class="btn btn-lg btn-primary p-2"><i class="bi bi-file-plus-fill"></i>Lưu</button> <a  href="index.php?action=lhp" asp-controller="BookCategory" asp-action="Index" class="btn btn-lg btn-warning p-2">Quay lại</a>
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
<script>
    $(document).ready(function() {
    $('#search1').select2({    
    });
});
</script>