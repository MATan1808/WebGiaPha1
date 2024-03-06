<?php
include('db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $username = $_GET['username'];
    $password = $_GET['password'];
    $hvt = $_GET['hvt'];

    $sql = "INSERT INTO users (username, password, hvt) VALUES ('$username', '$password', '$hvt')";
    if ($conn->query($sql) === TRUE) {
        echo "Đăng ký thành công!";
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
