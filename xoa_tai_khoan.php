<!-- xoa_tai_khoan.php -->
<?php
include('db_connect.php');

if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    // Thực hiện truy vấn xóa
    $sql = "DELETE FROM tbl_user WHERE id = $userId";
    $result = mysqli_query($conn, $sql);

    // if ($result) {
    //     echo "Xóa thành công moi ";
    // } else {
    //     echo "Lỗi khi xóa: " . mysqli_error($conn);
    // }
} else {
    echo "USER không hợp lệ";
}
?>
