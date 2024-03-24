<!-- cap_nhap_vai_tro.php -->
<?php
// Kết nối CSDL
include('db_connect.php');

// Kiểm tra xem yêu cầu cập nhật có hợp lệ không
if(isset($_GET['id']) && isset($_GET['role'])) {
    $userId = $_GET['id'];
    $newRole = $_GET['role'];

    // Thực hiện truy vấn cập nhật
    $sql = "UPDATE tbl_user SET role = '$newRole' WHERE id = $userId";
    $result = mysqli_query($conn, $sql);

    if($result) {
        // Trả về kết quả cập nhật thành công
        echo json_encode(array('status' => 'success', 'message' => 'Cập nhật vai trò thành công'));
    } else {
        // Trả về thông báo lỗi nếu cập nhật không thành công
        echo json_encode(array('status' => 'error', 'message' => 'Lỗi khi cập nhật vai trò'));
    }
} else {
    // Trả về thông báo lỗi nếu yêu cầu không hợp lệ
    echo json_encode(array('status' => 'error', 'message' => 'Yêu cầu không hợp lệ'));
}

// Đóng kết nối CSDL
mysqli_close($conn);
?>
