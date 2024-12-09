<?php 
  session_start();
  include('config/config.php');
  
  if(isset($_POST['dangnhap'])){
      $taikhoan = $_POST['tentk'];
      $matkhau = $_POST['matkhau'];
  
      // Prepared Statement để tránh SQL Injection
      $stmt = $mysqli->prepare("SELECT * FROM usersv WHERE usernamesv = ? LIMIT 1");
      $stmt->bind_param("s", $taikhoan);
      $stmt->execute();
      $result = $stmt->get_result();
  
      if ($result->num_rows > 0) {
          $user = $result->fetch_assoc();
          if (md5($matkhau, $user['password'])) {
              $_SESSION['usersv'] = $user['idsv'];
              $_SESSION['dangnhap'] = $user['usernamesv'];
              header("Location:index.php");
              exit();
          } else {
              echo '<p style="color:red">Sai mật khẩu!</p>';
          }
      } else {
          echo '<p style="color:red">Sai tài khoản!</p>';
      }
  }
  
?>
<!DOCTYPE html>
<html>
<head>
    <title>Falling Leaves Animation</title>
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
        <h2 style="text-align: center;font-family: 'Poppins', sans-serif;">Sign In</h2>
        <br>
        <form action="" method="POST" autocomplete="off">
            <label for="username">Username</label>
            <input type="text" id="username" name="tentk" placeholder="Username" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="matkhau" placeholder="Password" required>

            <input type="submit" value="Login" name="dangnhap">
        </form>
        <p style="text-align: left; padding-left: 20px; width: 50%;">Forgot Password</p>
    </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</body>
</html>
