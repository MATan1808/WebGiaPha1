
<?php
require "./connectdb.php";
$conn = connectdb();
if(isset($_POST['btn-reg'])){
    $name = $_POST['name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $giftcode = $_POST['giftcode'];

    // Kiểm tra xem user, pass và giftcode có được cung cấp hay không
    if(empty($user) || empty($pass) || empty($giftcode)) {
        $txt_erro = "Bạn cần nhập đầy đủ thông tin cho TÊN ĐĂNG NHẬP, PASS, MÃ GIỚI THIỆU.";
    } else {
        // Kiểm tra xem mã giới thiệu có đúng không
        if($giftcode !== "nhattan") {
            $txt_erro = "Mã giới thiệu không đúng..";
        } else {
            // Tiến hành thêm người dùng vào cơ sở dữ liệu
            $sql_check_user = "SELECT * FROM `tbl_user` WHERE `user` = '$user'";
            $result_check_user = $conn->query($sql_check_user);

            if ($result_check_user->rowCount() > 0) {
                $txt_erro = "Tên người dùng đã tồn tại. Vui lòng chọn tên người dùng khác.";
            } else {
                // Thêm người dùng vào cơ sở dữ liệu, các trường còn lại có thể trống
                $sql_insert_user = "INSERT INTO `tbl_user`(`name`, `address`, `email`, `user`, `pass`, `giftcode`) VALUES (:name, :address, :email, :user, :pass, :giftcode)";
                $stmt_insert_user = $conn->prepare($sql_insert_user);
                $stmt_insert_user->bindParam(':name', $name);
                $stmt_insert_user->bindParam(':address', $address);
                $stmt_insert_user->bindParam(':email', $email);
                $stmt_insert_user->bindParam(':user', $user);
                $stmt_insert_user->bindParam(':pass', $pass);
                $stmt_insert_user->bindParam(':giftcode', $giftcode);

                if($stmt_insert_user->execute()){
                    $txt_erro = "Thêm thành công";
                    header('location: dn.php');
                } else {
                    $txt_erro = "Lỗi: Không thể thêm người dùng.";
                }
            }
        }
    }
}




?>

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
        <input type="text" name="giftcode" class="input-signup-intro-code" />
        <input type="submit" class="signup__signInButton" name="btn-reg" value="Đăng ký">
        <?php
            if(isset($txt_erro) && $txt_erro != "") {
                echo "<p style='color: red;'>".$txt_erro."</p>";
            }
            ?>
      </form>
      <!-- Thêm liên kết đến trang đăng nhập -->
      <a href="dn.php" class="signup__registerButton">Đăng nhập tài khoản</a>
    </div>
  </div>
  
  
</body>
<script src="btnback.js"></script>
</html>

