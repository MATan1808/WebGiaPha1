<!-- lay_du_lieu_caygiapha.php -->

<?php
include('db_connect.php');

// Thực hiện truy vấn SQL để lấy dữ liệu từ bảng generations
$sql = "SELECT * FROM generations";
$result = mysqli_query($conn, $sql);

if ($result) {
    // Mảng để lưu trữ dữ liệu
    $data = array();

    // Lặp qua các hàng kết quả và lưu vào mảng $data
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    // Trả về dữ liệu dưới dạng JSON
    echo json_encode($data);
} else {
    // Trả về thông báo lỗi nếu có lỗi trong quá trình truy vấn
    echo json_encode(array("error" => "Lỗi khi truy vấn dữ liệu từ cơ sở dữ liệu"));
}

// Đóng kết nối CSDL
mysqli_close($conn);
?>