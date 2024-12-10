<main id="main" class="main">
    <div class="pagetitle">
        <h2>Thêm nhiều giáo viên</h2>
    </div>
    <!-- Begin Form -->
    <form id="form-login" method="POST" action="modules/trungchuyen/quanlydanhmuctruyen/tkgv/xulytkgv.php" enctype="multipart/form-data">
        <div class="row">
            <div class="col-12">
                <div class="card recend-sales overflow-auto">
                    <div class="card-body mt-4">
                        <div class="row mb-3">
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
                            <label class="col-sm-2 col-form-label">Danh sách giáo viên</label>
                            <div class="col-sm-10">
                                <textarea id="teacher-input" class="form-control" name="teacher_data" rows="5" placeholder="Nhập dữ liệu, mỗi dòng theo định dạng: tên,email" required></textarea>
                                <div class="error-message-teachers text-danger mt-2"></div>
                            </div>
                        </div>
                        <button type="submit" name="themntkgv" class="btn btn-lg btn-primary p-2">
                            <i class="bi bi-file-plus-fill"></i> Lưu
                        </button>
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
    $(document).ready(function () {
        $('#form-login').on('submit', function (e) {
            const teacherData = $('#teacher-input').val().trim();
            const lines = teacherData.split('\n').filter(line => line.trim() !== '');
            let hasError = false;
            let errorMessage = '';

            lines.forEach((line, index) => {
                const parts = line.split(',').map(item => item.trim());
                if (parts.length !== 2 || !/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/.test(parts[1])) {
                    errorMessage += `Dòng ${index + 1}: Dữ liệu không hợp lệ hoặc email sai định dạng.<br>`;
                    hasError = true;
                }
            });

            if (hasError) {
                e.preventDefault();
                $('.error-message-teachers').html(errorMessage).show();
            } else {
                $('.error-message-teachers').hide();
            }
        });
    });
</script>
