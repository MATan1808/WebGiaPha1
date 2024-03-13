<!-- admin.php -->
<?php
include('db_connect.php');

$sql = "SELECT * FROM tbl_user";
$result = mysqli_query($conn, $sql);
if (!$result) {
  die('Query failed: ' . mysqli_error($conn));
} else {
  echo "  Query successful";
}
?>
<!-- admin.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="./css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="./css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="Admin.css">
    <link rel="stylesheet" href="btnback.css">
    <!-- <link rel="stylesheet" href="thong.css.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

</head>
<!-- s -->
<style>
    .custom-table th,
    .custom-table td {
        color: black;
    }

    .custom-table th {
        font-weight: bold;
    }

    .custom-table .btn {
        font-weight: bold;
    }

    footer {
        color: black;
        font-family: 'Arial', sans-serif;
        font-size: 20px;
        font-weight: bold;
    }

    /* thong bao */
    .notifications {
        position: fixed;
        top: 10px;
        right: 10px;
        z-index: 999;
      }
    
      .notification {
        display: flex;
        align-items: center;
        padding: 10px;
        margin-bottom: 10px;
        border-radius: 5px;
        transition: opacity 0.5s ease-out, transform 0.5s ease-out;
      }
    
      .notification.success {
        background-color: #4caf50;
        color: #fff;
      }
    
      .notification.error {
        background-color: #f44336;
        color: #fff;
      }
    
      .notification i {
        margin-right: 10px;
      }
</style>
<!-- s -->
<body>
  <div class="container-fluide" style="background-color:  #ecde429e;">
    <div class="container">
                  <!-- Thêm nút quay về -->
                  <!-- <a href="#" id="backButton">
                    <span>&#9664;</span> Quay về
                </a> -->
        <div class="row">
            <div class="col-lg-2 " style="padding-left: -12px;">
                <a href="Trangchu.html">
                    <img src="./image/logo.gif" width="190" height="100">
                </a>
            </div>
            <div class="col-lg-6 thanhheader" style="float:right">

                <!-- <ul class="nav">
                    <li>
                        <a class="nav-link  " style="color: rgb(14, 15, 15)   ;" href="#">Trang chủ</a>
                    </li>
                    <li>
                        <a class="nav-link" style="color: rgb(14, 15, 15)  ;" href="#">Giới thiệu</a>
                    </li>

                    </li>
                </ul> -->
                <!-- Thêm nút quay về -->
                <button id="backButton" onclick="goBack()">
                  <i class="fas fa-arrow-left"></i> 
              </button>
             
            </div>
             <!--thanhheader-->
            <div class="row"> 
            <div class="col-lg-12 taikhoan">
              <div class="">
                <a>
                    <p>Tài Khoản</p>
                </a>
              </div>
            </div>
            </div>
        </div>
    </div>

    <!-- anh backgourd -->
</div>
<div class="notifications"></div>
<div class="container" style="margin-top: 20px;">
        <h2>Quản Lý Tài Khoản</h2>
        <table class="table table-bordered custom-table table-custom">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Tài Khoản</th>
                    <th>Mật Khẩu</th>
                    <th>Chức Vụ</th>
                    <th>Họ Và Tên</th>
                    <th class="text-center">Chức Năng</th>
                </tr>
            </thead>
            <tbody style="color:rgb(255, 255, 255);">
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td>{$row['email']}</td>";
                    echo "<td>{$row['user']}</td>";
                    echo "<td>{$row['pass']}</td>";
                    echo "<td>" . ($row['role'] == 1 ? 'Admin' : 'User') . "</td>";
                    echo "<td>{$row['name']}</td>";
                    echo "<td>
                    <div class='buttons'>
                    <button class='btn btn-danger' data-id='{$row['id']}' onclick='xoaTaiKhoan(this)'>Xóa</button>
                        <button class='btn btn-warning' id='chinhsua'>Chỉnh sửa</button>
                        <button class='btn btn-success' id='them'>Thêm</button>
                    </div>
                </td>";
                }
                ?>
            </tbody>
        </table>
    </div>
  
      <footer>
          <!-- Phần footer của trang web của bạn -->
          &copy; 2024 Tan Web. All rights reserved.
          <!-- <div class="container">
            <div class="col-3">
                <h1 class="tacgia">Ma Nguyen Nhat Tan</h1>
                <h1 class="tacgia">Nguyen Phuoc Tho</h1>
                <h1 class="tacgia">Hue Hy</h1>
            </div>
          </div> -->
      </footer>
</body>
<!-- admin.php -->
<script>
function xoaTaiKhoan(button) {
    var userId = button.getAttribute('data-id');

    // Gửi yêu cầu Ajax để xóa tài khoản
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4) {
            if (this.status == 200) {
                // Xóa hàng từ bảng khi xóa thành công
                var row = button.closest('tr');
                row.parentNode.removeChild(row);

                // Thông báo xóa thành công
                showNotification('Xóa thành công', 'success');
            } else {
                // Thông báo lỗi khi xóa
                showNotification('Lỗi khi xóa: ' + this.responseText, 'error');
            }
        }
    };
    xhttp.open("GET", "xoa_tai_khoan.php?id=" + userId, true);
    xhttp.send();
}

function showNotification(message, type) {
    var notifications = document.querySelector('.notifications');
    var notification = document.createElement('div');
    notification.className = 'notification ' + type;
    notification.innerHTML = '<i class="fas ' + (type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle') + '"></i>' + message;
    notifications.appendChild(notification);

    // Tự động đóng thông báo sau 3 giây
    setTimeout(function() {
        notification.style.opacity = '0';
        notification.style.transform = 'translateY(-50px)';
        setTimeout(function() {
            notifications.removeChild(notification);
        }, 500);
    }, 3000);
}
</script>

<!-- <script src="Admin.js"></script> -->
<script src="thongbao.js"></script>
<script src="btnback.js"></script>
</html>