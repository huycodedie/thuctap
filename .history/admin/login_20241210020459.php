<?php 
  session_start();
  include('config/config.php');
  
  if(isset($_POST['dangnhap'])){
      $email = $_POST['tentk'];
      $matkhau = $_POST['matkhau'];
  
      // Prepared Statement để tránh SQL Injection
      $stmt = $mysqli->prepare("SELECT * FROM users WHERE email = ? LIMIT 1");
      $stmt->bind_param("s", $email);
      $stmt->execute();
      $result = $stmt->get_result();
      $errorstk[]="Sai tài khoản";
      $errorsmk[]="Sai mật khẩu";
      if ($result->num_rows > 0) {
          $user = $result->fetch_assoc();
          if (md5($matkhau) === $user['password']) {
            
          
              $_SESSION['dangnhap'] = $user['username'];
              header("Location:index.php");
              exit();
          } else {
            $_SESSION['errorsmk'] = $errorsmk;
          }
      } else {
        $_SESSION['errorstk'] = $errorstk;
      }
  }
  
?>
<!DOCTYPE html>
<html>
<head>
<link href="https://congsv.vinhuni.edu.vn/sv/assets/images/eUniversity/logo_dhvinh.png" rel="icon">
<link href="https://congsv.vinhuni.edu.vn/sv/assets/images/eUniversity/logo_dhvinh.png" rel="apple-touch-icon">
    <title>Đăng nhập giảng viên</title>
    <link rel="stylesheet" href="login/login.css">
</head>
<body>
    <div class="leaves-container">
        <!-- Add 20 leaves to the container -->
        <div class="leaf"><img src="login/leave2.png"></div>
        <div class="leaf"><img src="login/leave2.png"></div>
        <div class="leaf"><img src="login/leave2.png"></div>
        <div class="leaf"><img src="login/leave2.png"></div>
        <br>
        <div class="leaf"><img src="login/leave1.png"></div>
        <div class="leaf"><img src="login/leave1.png"></div>
        <div class="leaf"><img src="login/leave1.png"></div>
        <div class="leaf"><img src="login/leave1.png"></div>
        <div class="leaf"><img src="login/leave1.png"></div>
        <div class="leaf"><img src="login/leave1.png"></div>
        <div class="leaf"><img src="login/leave1.png"></div>
        <div class="leaf"><img src="login/leave1.png"></div>
        <div class="leaf"><img src="login/leave1.png"></div>
        <div class="leaf"><img src="login/leave1.png"></div>
        <div class="leaf"><img src="login/leave1.png"></div>
        <div class="leaf"><img src="login/leave1.png"></div>
        <div class="leaf"><img src="login/leave1.png"></div>
        <div class="leaf"><img src="login/leave1.png"></div>
        <div class="leaf"><img src="login/leave1.png"></div>
        <div class="leaf"><img src="login/leave1.png"></div>
        <div class="leaf"><img src="login/leave1.png"></div>
        <div class="leaf"><img src="login/leave1.png"></div>
    </div>

    <div class="login-box">
        <h2 style="text-align: center;font-family: 'Poppins', sans-serif;">Đănh Nhập</h2>
        <br>
        <form action="" method="POST" autocomplete="off">
    <label for="username">Tên đăng nhập</label>
    <input type="text" id="username" name="tentk" placeholder="Username" required>

    <label for="password">Mât</label>
    <input type="password" id="password" name="matkhau" placeholder="Password" required>

    <?php
    // Hiển thị lỗi nếu tồn tại
    if (isset($_SESSION['errorstk']) || isset($_SESSION['errorsmk'])) {
        echo '<div class="alert alert-danger">';
        // Hiển thị lỗi tài khoản
        if (isset($_SESSION['errorstk'])) {
            foreach ($_SESSION['errorstk'] as $error) {
                echo '<p>' . htmlspecialchars($error) . '</p>';
            }
            unset($_SESSION['errorstk']); // Xóa lỗi sau khi hiển thị
        }
        // Hiển thị lỗi mật khẩu
        if (isset($_SESSION['errorsmk'])) {
            foreach ($_SESSION['errorsmk'] as $error) {
                echo '<p>' . htmlspecialchars($error) . '</p>';
            }
            unset($_SESSION['errorsmk']); // Xóa lỗi sau khi hiển thị
        }
        echo '</div>';
    }
    ?>

    <input type="submit" value="Login" name="dangnhap">
</form>

        
    </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</body>
</html>
