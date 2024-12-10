<?php 
$sql_themdiem= "SELECT *
                FROM bangdiem b
                JOIN usergv g
                ON b.magv = g.idgv
                JOIN qllophocphan P
                ON p.malhp = b.malhp
                JOIN usersv s
                ON s.idsv = b.masv
                WHERE b.madiem='$_GET[madiem]'LIMIT 1 ";

$query_themdiem = mysqli_query($mysqli,$sql_themdiem);
?>

<main id="main" class="main">
    <form method="POST" action="modules/trungchuyen/quanlydanhmuctruyen/bangdiem/xulydiem.php?madiem=<?php echo $_GET['madiem'] ?>" enctype="multipart/form-data">
    <div class="row pb-2">
        <h2>Nhập điểm cho sinh viên</h2>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card recend-sales overflow-auto">
                <div class="card-body mt-4">
                    <form method="post" asp-action="Edit">                    
                        <?php 
                        while($dong = mysqli_fetch_array($query_themdiem)){
                        ?>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Tên lớp học phần</label>
                            <div class="col-sm-8">
                                <input asp-for="Name" value="<?php echo $dong['tenlhp'] ?>" type="text"  class="form-control" placeholder="Nhập" readonly >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Tên sinh viên</label>
                            <div class="col-sm-3">
                                <input asp-for="Name" value="<?php echo $dong['usernamesv'] ?>" type="text"  class="form-control" placeholder="Nhập" readonly>
                            </div>
                        
                            <label class="col-sm-2 col-form-label">Tên giáo viên</label>
                            <div class="col-sm-4">
                                <input asp-for="Name" value="<?php echo $dong['username'] ?>" type="text"  class="form-control" placeholder="Nhập" readonly >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Điểm quá trình</label>
                            <div class="col-sm-8">
                                <input asp-for="Name" placeholder="nhập điểm" type="text" name="quatrinh" class="form-control" placeholder="Nhập" required>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Điểm cuối kỳ</label>
                            <div class="col-sm-8">
                                <input asp-for="Name" placeholder="nhập điểm" type="text" name="cuoiky" class="form-control" placeholder="Nhập" required>
                            </div>
                        </div>
                        <?php 
                        }
                        ?>
                        
                            <button type="submit" name="themdiem" class="btn btn-lg btn-primary p-2"><i class="bi bi-file-plus-fill"></i>Lưu</button>
                            <a  href="index.php?action=diem" asp-controller="BookCategory" asp-action="Index" class="btn btn-lg btn-warning p-2">Quay lại</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </form>
</main>

