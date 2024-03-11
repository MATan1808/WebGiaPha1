<?php
function checkuser($user, $pass) {
    $conn = connectdb();
    
    // Sử dụng prepared statements để ngăn chặn cuộc tấn công SQL injection
    $stmt = $conn->prepare("SELECT * FROM tbl_user WHERE user='".$user."' AND pass='".$pass."'");
    // $stmt->bindParam(':user', $user);
    // $stmt->bindParam(':pass', $pass);
    
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    // Lấy kết quả
    $kq = $stmt->fetchAll();
    // return $kq[0]['role']; 
    // Kiểm tra số lượng bản ghi trả về
    // if(count($kq) > 0) {
    //     return $kq[0]['role'];
    // } else {
    //     return 0;
    // }

    if(count($kq) > 0) {
        $role = $kq[0]['role'];
        if ($role == 0 || $role == 1) {
            return $role;
        } else {
            // Xử lý ngoại lệ nếu role không phải 0 hoặc 1
            // Ví dụ: 
            // return -1; // hoặc bất kỳ giá trị nào khác để chỉ ra ngoại lệ
            // hoặc thực hiện các hành động khác tùy theo yêu cầu của bạn
            return -1;
        }
    } else {
        return -1; // Trường hợp không có kết quả từ truy vấn
    }
}

// function getuserinfo($user, $pass) {
//     $conn = connectdb();
    
//     // Sử dụng prepared statements để ngăn chặn cuộc tấn công SQL injection
//     $stmt = $conn->prepare("SELECT * FROM tbl_user WHERE user='".$user."' AND pass='".$pass."'");
//     // $stmt->bindParam(':user', $user);
//     // $stmt->bindParam(':pass', $pass);
//     $stmt->execute();
//     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
//     // Lấy kết quả
//     $kq = $stmt->fetchAll();
//     // return $kq[0]['role']; 
//     // Kiểm tra số lượng bản ghi trả về
//     return $kq;
// }
?>
