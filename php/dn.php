<?php
// Kết nối database
$conn = mysqli_connect("localhost", "root", "", "webgiapha");

// Lấy dữ liệu từ form
$username = $_POST['username'];
$password = md5($_POST['password']);

// Kiểm tra username và mật khẩu
$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // Đăng nhập thành công
  session_start();
  $_SESSION['username'] = $username;
  header("Location: index.php");
} else {
  // Đăng nhập thất bại
  echo "<script>alert('Tên đăng nhập hoặc mật khẩu không chính xác!'); window.location.href='dn.html';</script>";
}
?>