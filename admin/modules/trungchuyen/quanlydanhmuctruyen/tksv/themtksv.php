<?php 
$sql_lhc = "SELECT*FROM qllophanhchinh c
                    JOIN qlkhoa k 
                    ON c.makhoa = k.idkhoa
                     ORDER BY idlhc ";
$query_danhsach = mysqli_query($mysqli,$sql_lhc);
?>
<main id="main" class="main">
    <div class="pagetitle">
        <h2>Thêm sinh viên</h2>
    </div>
    <!-- Begin Form -->
    <form id="form-login" asp-action="Create" method="POST" action="modules/trungchuyen/quanlydanhmuctruyen/tksv/xulytksv.php" enctype="multipart/form-data">
    <div class="row">
        <div class="col-12">
            <div class="card recend-sales overflow-auto">
                <div class="card-body mt-4">   
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Tên tài khoản</label>
                        <div class="col-sm-10">
                            <input asp-for="BookName" type="text" class="form-control" placeholder="Nhập" name="tensv">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">email</label>
                        <div class="col-sm-10">
                            <input asp-for="BookName" type="text" class="form-control" placeholder="Nhập" name="email">
                            <div class="error-message-email" style="color: red;"  ></div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">email</label>
                        <div class="col-sm-10">
                            <select asp-for="BookName" id="search" class="form-control" placeholder="Nhập" name="malhc" ><option >chọn lớp</option>
                                <?php 
                                $i = 0;
                                while($row = mysqli_fetch_array($query_danhsach)){
                                    $i++;
                                ?>

                                        <option  ><?php echo $row['idlhc'] ?> - <?php echo $row['tenlop']  ?> - <?php echo $row['tenkhoa']  ?></option>
                                <?php 
                                } 
                                ?>
                                </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        
                        <div class="col-sm-12">
                            <input  asp-for="CreatedBy" value="<?php date_default_timezone_set('Asia/Ho_Chi_Minh'); echo date('Y-m-d H:i:s') ?>"  class="form-control" placeholder="Nhập" name="ngaytao" type="hidden"   readonly >
                        </div>
                    </div>
                    <button type="submit" name="themtksv" class="btn btn-lg btn-primary p-2"><i class="bi bi-file-plus-fill"></i>Lưu</button>
                    <a href="index.php?action=profile" asp-controller="Book" asp-action="Index" class="btn btn-lg btn-warning p-2">Quay lại</a>
                </div>
            </div>
        </div>
    </div>
    </form>
    <!-- End Form -->

</main>
<script>
    $(document).ready(function() {
        // Khởi tạo select2 cho phần tử với id 'search'
        $('#search').select2();

        // Xử lý sự kiện submit của form với id 'form-login'
        $('#form-login').on('submit', function(e) {
            var email = $('input[name="email"]').val(); // Nhận giá trị của email
            var emailError = '';

            // Kiểm tra định dạng email bằng regex
            if (!/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/.test(email)) {
                emailError += 'Email không đúng định dạng.<br>';
            }

            if (emailError) {
                e.preventDefault();
                $('.error-message-email').html(emailError).show(); // Hiển thị lỗi email
            } else {
                $('.error-message-email').hide(); // Ẩn thông báo lỗi email
                this.submit(); // Gửi form nếu không có lỗi
            }
        });
    });
</script>






