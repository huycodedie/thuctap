
<main id="main" class="main">
    <div class="pagetitle">
        <h2>Thêm giáo viên</h2>
    </div>
    <!-- Begin Form -->
    <form id="form-login" asp-action="Create" method="POST" action="modules/trungchuyen/quanlydanhmuctruyen/tkgv/xulytkgv.php" enctype="multipart/form-data">
    <div class="row">
        <div class="col-12">
            <div class="card recend-sales overflow-auto">
                <div class="card-body mt-4">   
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Tên giáo viên</label>
                        <div class="col-sm-5">
                            <input asp-for="BookName" type="text" class="form-control" placeholder="Nhập" name="tengv" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">email</label>
                        <div class="col-sm-5">
                            <input asp-for="BookName" type="text" class="form-control" placeholder="Nhập" name="email" required>
                            <div class="error-message-email"></div>
                        </div>
                    </div>
                    <?php

                        if (isset($_SESSION['errors'])) {
                             echo '<div class="alert alert-danger">';
                            foreach ($_SESSION['errors'] as $error) {
                            echo '<p>' . htmlspecialchars($error) . '</p>';
                            }
                            echo '</div>';
                            unset($_SESSION['errors']); // Xóa lỗi sau khi hiển thị
                            }
?>
                    <div class="row mb-3">
                        
                        <div class="col-sm-12">
                            <input  asp-for="CreatedBy" value="<?php date_default_timezone_set('Asia/Ho_Chi_Minh'); echo date('Y-m-d H:i:s') ?>"  class="form-control" placeholder="Nhập" name="ngaytao" type="hidden"   readonly >
                        </div>
                    </div>
                    <button type="submit" name="themtkgv" class="btn btn-lg btn-primary p-2"><i class="bi bi-file-plus-fill"></i>Lưu</button>
                    <a href="index.php?action=profile" asp-controller="Book" asp-action="Index" class="btn btn-lg btn-warning p-2">Quay lại</a>
                </div>
            </div>
        </div>
    </div>
    </form>
    <!-- End Form -->

</main>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script>
    $(document).ready(function(){
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


