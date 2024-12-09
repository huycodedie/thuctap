<?php 
$sql_themdiem= "SELECT *
                FROM bangdiem b
                JOIN usergv g
                ON b.magv = g.idgv
                JOIN qllophocphan P
                ON p.malhp = b.malhp
                JOIN usersv s
                ON s.idsv = b.masv
                WHERE b.malhp='$_GET[malhp]'AND b.masv='$_GET[masv]' LIMIT 1 ";

$query_themdiem = mysqli_query($mysqli,$sql_themdiem);
$query_themdiem2 = mysqli_query($mysqli,$sql_themdiem);
?>
<main id="main" class="main">
    <form method="POST" action="modules/mucchinh/xuly.php?madiem=<?php $row = mysqli_fetch_array($query_themdiem2); if($row){echo $row['madiem'];} ?>&malhp=<?php echo $_GET['malhp'] ?>&masv=<?php echo $_GET['masv'] ?>&magv = <?php echo e?>" enctype="multipart/form-data">
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
                                <input asp-for="Name" placeholder="nhập điểm" type="number" name="quatrinh" class="form-control" placeholder="Nhập" required>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Điểm cuối kỳ</label>
                            <div class="col-sm-8">
                                <input asp-for="Name" placeholder="nhập điểm" type="number" name="cuoiky" class="form-control" placeholder="Nhập" required>
                            </div>
                        </div>
                        
                        <button type="button" class="btn btn-lg btn-primary p-2" data-bs-toggle="modal" data-bs-target="#verticalycentered"></i>Lưu</button>
                            
                            <a  href="index.php?action=sv-lop-hoc-phan&idgv=<?php echo $dong['magv'] ?>&malhp=<?php echo $dong['malhp'] ?>" asp-controller="BookCategory" asp-action="Index" class="btn btn-lg btn-warning p-2">Quay lại</a>
                        <?php 
                        }
                        ?>
                        <div class="modal fade" id="verticalycentered" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Thông báo</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
        
                            <div class="modal-body">
                              Chắc chắn xác nhận thông tin nhập vào chính xác
                            </div>
                            <div class="modal-footer">
                            
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Trở lại</button>
                              <button type="submit" name="gvthemdiem" class="btn btn-primary">Xác nhận</button>
                            </div>
        
                          </div>
                        </div>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </form>
</main>

