<?php
// Include file kết nối đến cơ sở dữ liệu
include 'db_connect.php';

// Kiểm tra xem yêu cầu gửi lên có phải là phương thức POST không
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy tên đời cần xóa từ dữ liệu gửi lên
    $generationName = $_POST['generationName'];

    // Chuẩn bị truy vấn SQL để xóa đời có tên tương ứng
    $query = "DELETE FROM generations WHERE name_member = ?";
    
    // Chuẩn bị và thực thi câu lệnh xóa sử dụng prepared statement để tránh SQL injection
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $generationName);
    mysqli_stmt_execute($stmt);

    // Kiểm tra và thông báo kết quả
    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo "Đã xóa đời '$generationName' thành công.";
    } else {
        echo "Không thể xóa đời '$generationName'.";
    }

    // Đóng prepared statement và kết nối
    mysqli_stmt_close($stmt);
}

// Đóng kết nối đến cơ sở dữ liệu
mysqli_close($conn);
?>
