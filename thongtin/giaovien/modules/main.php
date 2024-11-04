<?php
    if(isset($_GET['action']) ){
        $tam=$_GET['action'];
       
    }else{
        $tam='';
        
    }
    if($tam=='khoa'){
        //menu
        include("modules/mucchinh/khoa.php");
    }else if($tam=='lhc'){
        include("modules/mucchinh/lophanhchinh.php");
    }else if($tam=='lhp'){
        include("modules/mucchinh/lophocphan.php");
        
   
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
    }
    
    
    else{
        include("modules/trungchuyen/backround.php");  
    }
        
?>