<?php 
    session_start();
    include('config/config.php');
    if(isset($_POST['dangnhap'])){
        $taikhoan = $_POST['tentk'];
        $matkhau = md5($_POST['matkhau']);
        $sql = "SELECT * FROM users WHERE username = '".$taikhoan."' AND password='".$matkhau."' LIMIT 1 ";
         $row=mysqli_query($mysqli,$sql);
         $count = mysqli_num_rows($row);
         if($count>0){
            $_SESSION['dangnhap'] = $taikhoan;
            header("Location:index.php");
         }else{
            echo '<p style="color:green"> sai</p>';
            header("Location:login.php");
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
            <span class="toggle-password" onclick="togglePassword()">👁</span>
            <input type="submit" value="Login" name="dangnhap">
        </form>
        <p style="text-align: left; padding-left: 20px; width: 50%;">Forgot Password</p>
    </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById("password");
            const toggleIcon = document.querySelector(".toggle-password");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                toggleIcon.textContent = "👁️‍🗨️"; // Icon khi mật khẩu hiển thị
            } else {
                passwordInput.type = "password";
                toggleIcon.textContent = "👁"; // Icon khi mật khẩu ẩn
            }
        }
    </script>
</body>
</html>
