<main id="main" class="main">
    <div class="pagetitle">
        <h2>Thêm khoa mới</h2>
    </div>
    <!-- Begin Form -->
    <form asp-action="Create" method="POST" action="modules/trungchuyen/quanlydanhmuctruyen/khoa/xulykhoa.php" id="form-login" enctype="multipart/form-data">
        <div class="row">
            <div class="col-12">
                <div class="card recend-sales overflow-auto">
                    <div class="card-body mt-4">   
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Tên khoa</label>
                            <div class="col-sm-10">
                                <input asp-for="BookName" type="text" class="form-control" placeholder="Nhập" name="tenkhoa">
                            </div>
                            <div class="error-message" style="color: red;">
                                <!-- Error message will be displayed here -->
                            </div>
                        </div>
                        <button type="submit" name="themkhoa" class="btn btn-lg btn-primary p-2"><i class="bi bi-file-plus-fill"></i>Lưu</button>
                        <a href="index.php?action=khoa" asp-controller="Book" asp-action="Index" class="btn btn-lg btn-warning p-2"><i class="bi bi-arrow-left me-1"></i>Quay lại</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- End Form -->
</main>

<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script>
$(document).ready(function() {
    $('#form-login').on('submit', function(e) {
        e.preventDefault(); // Ngăn chặn hành vi submit mặc định của form

        var password = $('input[name="tenkhoa"]').val(); 
        var errorMessage = '';

        // Kiểm tra độ dài tên khoa
        if (password.length < 9) {
            errorMessage += 'Tên khoa phải dài hơn 8 ký tự.<br>';
        }
        
        // Kiểm tra và hiển thị thông báo lỗi nếu có
        if (errorMessage) {
            $('.error-message').html(errorMessage).show(); // Hiển thị thông báo lỗi
        } else {
            $('.error-message').hide(); // Ẩn thông báo lỗi
            
            // Gửi form sau khi không có lỗi
            this.submit();
        }
    });
});
</script>
