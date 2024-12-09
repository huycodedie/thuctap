<?php
    if(isset($_GET['action']) ){
        $tam=$_GET['action'];
       
    }else{
        $tam='';
        
    }
    if($tam=='khoa'){
        include("modules/mucchinh/khoa.php");
    }else if($tam=='sv-lop-hoc-phan'){
        include("modules/mucchinh/svhocphan.php");
    }else if($tam=='lop-hoc-phan'){
        include("modules/mucchinh/lophocphan.php");
    }else if($tam=='danh-sach-sv'){
        include("modules/mucchinh/danhsachsv.php");
    }else if($tam=='ho-so-giao-vien'){
        include("modules/mucchinh/hoso.php");
    }else if($tam=='diem-sinh-vien'){
        include("modules/mucchinh/diemsv.php");
    }else if($tam=='them-diem-sinh-vien'){
        include("modules/mucchinh/themdiemsv.php");
    }else if($tam=='test'){
        include("modules/mucchinh/test.php");
   
    }else if($tam=='1'){
        
            // Xóa phiên đăng nhập
            unset($_SESSION['dangnhap']);
            // Chuyển hướng đến trang đăng nhập
            header("Location: login.php");
            exit(); // Dừng thực thi mã sau khi chuyển hướng
        
        
        // Kết thúc quá trình đệm đầu ra và gửi tới trình duyệt
        ob_end_flush();  
    }else if($tam=='profile'){
        include("modules/trungchuyen/profile.php");  
    }else if($tam=='suaback'){
        include("modules/trungchuyen/quanlydanhmuctruyen/suabackground.php");  
    }else if($tam=='backr'){
        include("modules/trungchuyen/backround.php");  
    }else{
        include("modules/dashboard.php");
    }
    
    
    
        
?>