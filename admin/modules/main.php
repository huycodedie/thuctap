<?php
    if(isset($_GET['action']) ){
        $tam=$_GET['action'];
       
    }else{
        $tam='';
        
    }
    if($tam=='menugiaovien'){
        //menu
        include("modules/trungchuyen/menugv.php");
    }else if($tam=='menusinhvien'){
        include("modules/trungchuyen/menusv.php");
    }
    else if($tam=='themmenugv'){
        include("modules/trungchuyen/quanlydanhmuctruyen/menu/themmenugv.php");
    }else if($tam=='suamenugv'){
        include("modules/trungchuyen/quanlydanhmuctruyen/menu/suamenugv.php");   
    }else if($tam=='themmenusv'){
        include("modules/trungchuyen/quanlydanhmuctruyen/menu/themmenusv.php");
    }else if($tam=='suamenusv'){
        include("modules/trungchuyen/quanlydanhmuctruyen/menu/suamenusv.php");
        //
    }else if($tam=='suakhoa'){
        include("modules/trungchuyen/quanlydanhmuctruyen/khoa/suakhoa.php");
    }else if($tam=='khoa'){
        include("modules/trungchuyen/khoa.php");  
    }else if($tam=='themkhoa'){
        include("modules/trungchuyen/quanlydanhmuctruyen/khoa/themkhoa.php");
        //  
    }else if($tam=='hp'){
        //học phần
        include("modules/trungchuyen/hocphan.php");  
    }else if($tam=='themhp'){
        include("modules/trungchuyen/quanlydanhmuctruyen/hocphan/themhp.php");  
    }else if($tam=='suahp'){
        include("modules/trungchuyen/quanlydanhmuctruyen/hocphan/suahp.php");  
        //tkgv
    }else if($tam=='themtkgv'){
        include("modules/trungchuyen/quanlydanhmuctruyen/tkgv/themtkgv.php");  
    }else if($tam=='suatkgv'){
        include("modules/trungchuyen/quanlydanhmuctruyen/tkgv/suatkgv.php"); 
    }else if($tam=='themtkgvsaiten'){
        include("modules/trungchuyen/quanlydanhmuctruyen/tkgv/themtkgvsaiten.php");  
    }else if($tam=='themtkgvsaiemail'){
         include("modules/trungchuyen/quanlydanhmuctruyen/tkgv/themtkgvsaiemail.php");  
    }
    //thêm tk sv
    else if($tam=='themtksv'){
        include("modules/trungchuyen/quanlydanhmuctruyen/tksv/themtksv.php");  
    }else if($tam=='suatksv'){
        include("modules/trungchuyen/quanlydanhmuctruyen/tksv/suatksv.php"); 
    }else if($tam=='themtksvsaiten'){
        include("modules/trungchuyen/quanlydanhmuctruyen/tksv/themtksvsaiten.php");  
    }else if($tam=='themtksvsaiemail'){
        include("modules/trungchuyen/quanlydanhmuctruyen/tksv/themtksvsaiemail.php");  
    }else if($tam=='lhp'){
        //lớp học phần
        include("modules/trungchuyen/lophocphan.php");  
    }else if($tam=='themlhp'){
        include("modules/trungchuyen/quanlydanhmuctruyen/lophocphan/themlhp.php");  
    }else if($tam=='sualhp'){
        include("modules/trungchuyen/quanlydanhmuctruyen/lophocphan/sualhp.php");
    }else if($tam=='themsvl'){
        include("modules/trungchuyen/quanlydanhmuctruyen/lophocphan/themsvl.php");
        //bảng điểm
    }else if($tam=='diem'){
        include("modules/trungchuyen/bangdiem.php");
        //lớp hành chính
    }else if($tam=='lhc'){
        include("modules/trungchuyen/lophanhchinh.php");  
    }else if($tam=='themlhc'){
        include("modules/trungchuyen/quanlydanhmuctruyen/lophanhchinh/themlhc.php");  
    }else if($tam=='sualhc'){
        include("modules/trungchuyen/quanlydanhmuctruyen/lophanhchinh/sualhc.php");  
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
       // include("modules/trungchuyen/backround.php");  
    }
        
?>