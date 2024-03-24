<?php
function connection(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "web_giapha"; // Thêm tên cơ sở dữ liệu vào đây

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Đặt chế độ lỗi của PDO thành chế độ ném ngoại lệ
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn; // Trả về đối tượng kết nối PDO
    } catch(PDOException $e) {
        // Xử lý nếu có lỗi xảy ra trong quá trình kết nối
        // Ví dụ: Log lỗi, hiển thị thông báo lỗi, hoặc thực hiện hành động khác
        echo "Connection failed: " . $e->getMessage();
        return null; // Trả về null nếu có lỗi
    }
}
?>
