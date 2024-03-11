<?php
session_start();
ob_start();
include "./connectdb.php";
include "./user.php";

//$txt_erro = ""; // Khởi tạo biến $txt_erro trước khi sử dụng
// if(isset($_POST['user']) && isset($_POST['pass'])) {
//     $user = $_POST['user'];
//     $pass = $_POST['pass'];
//     $role = checkuser($user, $pass);
//     $_SESSION['role']=$role;
//     header('location: Admin1.php');
    
//         $txt_erro="ko ton tai";
    
//     //header('location: login.php');
// }
if(isset($_POST['dangnhap'])) {
  if(isset($_POST['user']) && isset($_POST['pass'])) {
      $user = $_POST['user'];
      $pass = $_POST['pass'];
      $role = checkuser($user, $pass);
      if($role == 1) {
          $_SESSION['role'] = $role;
          header('location: Admin1.html');
          exit;
      } elseif($role == 0) {
          $_SESSION['role'] = $role;
          header('location: Trangchu.html');
          exit;
      } else {
          $txt_erro = "Tên đăng nhập hoặc mật khẩu không đúng";
      }
  } else {
      $txt_erro = "Vui lòng nhập tên đăng nhập và mật khẩu";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./anh_truyen/logo1.png">
    <title>Đăng nhập </title>
    <link href="./css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="./css/bootstrap.min.css" rel="stylesheet" type="text/css">
    
    <link rel="stylesheet" type="text/css" href="chatbox.css">
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" media="mediatype and|not|only (expressions)" href="print.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="dangky1.css" />
    <link rel="stylesheet" href="btnback.css">
    <!-- font roboto -->
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  </head>
  <style>
    body {
      background-image: url('./image/hinh_15.jpg');
      background-size: cover;
      background-position: center; 
    }
    .login__container {
      box-shadow: 0 5px 10px rgba(0,0,0,0.3); 
      border-radius: 10px;
      background: rgba(255,255,255,0.8);
      
      transition: transform 0.5s; 
    }
    
    .login__container:hover {
      transform: scale(1.05);
    }

    button {
      animation: pulsate 1.5s ease-in-out infinite;
   }
   
   @keyframes pulsate {
     0% {
       box-shadow: 
        0 0 25px #bccd95,
        0 0 50px #a2cf64;
     }

     h1 {
      background: linear-gradient(to right, #84fab0 0%, #8fd3f4 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent; 
    }
   }
  </style>
  <body>
    <button id="backButton" onclick="goBack()">
      <i class="fas fa-arrow-left"></i> 
  </button>  <!-- Thêm nút quay về -->
    <!-- from login -->
    <div class="login">
      <div class="login__container">

        <h1>Đăng Nhập</h1>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
          <h5>Tên Đăng Nhập</h5>
          <input type="text" name="user" class="input-login-username" />
          <h5>Password</h5>
          <input type="password" name="pass" class="input-login-password" />
         
          <input type="submit" class="login__signInButton" name="dangnhap" value="Đăng nhập" >
          <?php
            if(isset($txt_erro) && $txt_erro != "") {
                echo "<p style='color: red;'>".$txt_erro."</p>";
            }
            ?>
        </form>
        <a href="./dk.php" class="login__registerButton"
          >Đăng ký tài khoản mới</a
        >
      </div>
    </div>
    <!-- <script src="dangnhap.js"></script> -->
  </body>
  <script src="btnback.js"></script>
  
</html>