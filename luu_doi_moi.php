<!-- luu_doi_moi.php -->
<?php
include 'db_connect.php'; // Đảm bảo rằng đã kết nối đến cơ sở dữ liệu

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

// Xử lý yêu cầu POST để chèn dữ liệu mới vào cơ sở dữ liệu
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ yêu cầu POST
    $newGenerationName = $_POST['newGenerationName'];

    // Thực hiện truy vấn SQL để chèn dữ liệu vào cơ sở dữ liệu
    $sql = "INSERT INTO `generations` (`name_member`) VALUES ('$newGenerationName')";

    if ($conn->query($sql) === TRUE) {
        // Truy vấn dữ liệu từ cơ sở dữ liệu và trả về kết quả cho frontend
        $sql_select = "SELECT * FROM `generations`";
        $result = $conn->query($sql_select);

        if ($result->num_rows > 0) {
            // Mảng để lưu trữ dữ liệu trả về
            $data = array();

            // Lặp qua các hàng kết quả và lưu vào mảng $data
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }

            // Chuyển mảng $data thành dạng JSON và trả về cho frontend
            echo json_encode($data);
        } else {
            echo json_encode(array("message" => "Không có dữ liệu được truy vấn từ cơ sở dữ liệu."));
        }
    } else {
        echo json_encode(array("message" => "Lỗi: " . $sql . "<br>" . $conn->error));
    }
}
// Đóng kết nối đến cơ sở dữ liệu
$conn->close();
?>
