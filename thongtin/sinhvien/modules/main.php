<?php
    if(isset($_GET['action']) ){
        $tam=$_GET['action'];
       
    }else{
        $tam='';
        
    }
    if($tam=='danhmuctruyen'){
        //menu
        include("modules/trungchuyen/menu.php");
    }else if($tam=='themmenu'){
        include("modules/trungchuyen/quanlydanhmuctruyen/themmenu.php");
    }else if($tam=='sua'){
        include("modules/trungchuyen/quanlydanhmuctruyen/suamenu.php");
        //truyện
    }else if($tam=='suatruyen'){
        include("modules/trungchuyen/quanlydanhmuctruyen/suatruyen.php");
    }else if($tam=='blocktruyen'){
        include("modules/trungchuyen/truyen.php");  
    }else if($tam=='themtruyen'){
        include("modules/trungchuyen/quanlydanhmuctruyen/themtruyen.php");  
    }else if($tam=='suaanh'){
        include("modules/trungchuyen/quanlydanhmuctruyen/suaanh.php");  
    }else if($tam=='chuong'){
        //chương
        include("modules/trungchuyen/chuong.php");  
    }else if($tam=='themchuong'){
        include("modules/trungchuyen/quanlydanhmuctruyen/themchuong.php");  
    }else if($tam=='suachuong'){
        include("modules/trungchuyen/quanlydanhmuctruyen/suachuong.php");  
    }else if($tam=='theloai'){
        //theloai
        include("modules/trungchuyen/theloai.php");  
    }else if($tam=='themtheloai'){
        include("modules/trungchuyen/quanlydanhmuctruyen/themtheloai.php");  
    }else if($tam=='suatheloai'){
        include("modules/trungchuyen/quanlydanhmuctruyen/suatheloai.php");  
    }else if($tam=='trang'){
        //trang
        include("modules/trungchuyen/trang.php");  
    }else if($tam=='themtrang'){
        include("modules/trungchuyen/quanlydanhmuctruyen/themchap.php");  
    }else if($tam=='suatrang'){
        include("modules/trungchuyen/quanlydanhmuctruyen/suatrang.php");  
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