

    
    <h1>sâs</h1>    
    <h1>âsasa</h1>
        <!-- Thanh chức năng cố định -->
        
        <a href="#" class="load-content" data-action="sv-lop-hoc-phan">Lớp học phần</a>

        <a href="#" class="load-content" data-action="doi">doi</a>

        
    
    <form id="search-form">
        <input type="text" name="search" id="search" placeholder="Nhập tên sinh viên..." autocomplete="off">
        <button type="submit">Tìm kiếm</button>
    </form>
    <div id="content">
    
        <!-- Nội dung thay đổi sẽ được tải vào đây -->
       
        <?php include("svhocphan2.php"); // Nội dung mặc định ?>
    </div>

    <script>
        // Sử dụng AJAX để thay đổi nội dung động
        $(document).on('click', '.load-content', function (e) {
    e.preventDefault();
    
    const action = $(this).data('action');
    console.log("Action selected: ", action); // Kiểm tra action đã chọn

    $.get("load_content.php", { action: action }, function (data) {
        console.log("Received data: ", data); // Kiểm tra dữ liệu nhận được
        $("#content").html(data);
    });
});

    </script>
   


