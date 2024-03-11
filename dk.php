

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng ký </title>
  <!-- Các thẻ link và script khác -->

  <!-- Thêm link đến file CSS của trang đăng ký -->
  <link rel="stylesheet" href="dangky1.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="stylesheet" href="btnback.css">
    <!-- Liên kết đến trang PHP để xử lý đăng ký -->
</head>
<body>
  <button id="backButton" onclick="goBack()">
    <i class="fas fa-arrow-left"></i> 
</button>  <!-- Thêm nút quay về -->
  <!-- Form đăng ký -->
  <div class="signup">
    <div class="signup__container">
      <h1>Đăng Ký</h1>
      <form action="reg.php" method="post">
        <h5>Họ và tên</h5>
        <input type="text" name="name" class="input-signup-username" />
        <h5>email </h5>
        <input type="text " name="email" class="input-signup-password" />
        <h5>địa chỉ</h5>
        <input type="Text " name="address" class="input-signup-pass" />
        <h5>Tên đăng nhập * </h5>
        <input type="text" name="user" class="input-signup-hvt" />
        <h5>Password *</h5>
        <input type="password" name="pass" class="input-signup-password" />
        <!-- Thêm ô nhập mã giới thiệu -->
        <h5>Mã Giới Thiệu *</h5>
        <input type="text" class="input-signup-intro-code" />
        <input type="submit" name="giftcode" class="signup__signInButton" name="btn-reg" value="Đăng ký">
        <?php
            if(isset($txt_erro) && $txt_erro != "") {
                echo "<p style='color: red;'>".$txt_erro."</p>";
            }
            ?>
      </form>
      <!-- Thêm liên kết đến trang đăng nhập -->
      <a href="dn.html" class="signup__registerButton">Đăng nhập tài khoản</a>
    </div>
  </div>
  

</body>
</html>
