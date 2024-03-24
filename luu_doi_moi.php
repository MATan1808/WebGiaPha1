// luu_doi_moi.php
include 'db_connect.php'; // Đảm bảo rằng đã kết nối đến cơ sở dữ liệu

$name = $_POST['name'];
$birth_year = $_POST['birth_year'];
$death_year = $_POST['death_year'];

// Xử lý tải ảnh lên server
$avatar = $_FILES['avatar']['name'];
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["avatar"]["name"]);

if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
    echo "Ảnh đại diện đã được tải lên.";
} else {
    echo "Có lỗi khi tải ảnh đại diện.";
}

// Lưu thông tin vào database
$query = $conn->prepare("INSERT INTO generations (name, birth_year, death_year, avatar_url) VALUES (?, ?, ?, ?)");
$query->bind_param("ssss", $name, $birth_year, $death_year, $target_file);

if ($query->execute()) {
    echo "Đã tạo đời mới thành công!";
    // Chuyển hướng người dùng trở lại trang cây gia phả
    header("Location: Caygiapha.php");
} else {
    echo "Có lỗi xảy ra: " . $query->error;
}

$conn->close();
