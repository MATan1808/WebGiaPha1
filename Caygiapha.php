<!-- Caygiapha.php -->
<?php
// Include file kết nối đến cơ sở dữ liệu
include 'db_connect.php';

// Truy vấn dữ liệu từ bảng 'generations'
$query = "SELECT * FROM generations";
$result = mysqli_query($conn, $query);

if (!$result) {
    // Xử lý lỗi truy vấn
    error_log('Lỗi truy vấn: ' . mysqli_error($conn));
    exit('Có lỗi xảy ra, vui lòng thử lại sau.');
}
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cay Gia Pha</title>
    <link rel="stylesheet" href="Caygiapha.css">
    <link rel="stylesheet" href="Chatbot.css">
    <link rel="stylesheet" href="hienthi_caygiapha.css">
    <link href="./css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="./css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="btnback.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
   
    </style>
</head>

<body>
    <div class="container-fluide" style="background-color:  #ecde429e;">
        <div class="container">
            <button id="backButton" onclick="goBack()">
                <i class="fas fa-arrow-left"></i>
            </button>
            <div class="row">
                <div class="col-lg-2 " style="padding-left: -12px;">
                    <a href="Trangchu.html">
                        <img src="./image/logo.gif" width="190" height="100">
                    </a>
                    <!-- thong bao them doi-->
                    <div id="success-message" class="success-message">
                        <i class="fas fa-check-circle"></i> Đã tạo thành công một đời mới!
                    </div>

                    <!--thong bao xac nhan xoa-->
                    <div class="confirm-dialog">
                        <div class="confirm-dialog-content">
                            <p>Bạn có chắc chắn muốn xóa đời này không?</p>
                            <div class="confirm-buttons">
                                <button class="confirm-yes">Có</button>
                                <button class="confirm-no">Không</button>
                            </div>
                        </div>
                    </div>

                    <!-- thong bao xoa-->
                    <div id="delete-success-message" class="success-message">
                        <i class="fas fa-check-circle"></i> Đã xóa đời thành công!
                    </div>

                </div>
                <div class="col-lg-6" style="float:right">

                    <ul class="nav">
                        <li>
                            <a class="nav-link  " style="color: rgb(14, 15, 15)   ;" href="#">Trang chủ</a>
                        </li>
                        <li>
                            <a class="nav-link" style="color: rgb(14, 15, 15)  ;" href="#">Giới thiệu</a>
                        </li>

                        </li>
                        <li>
                            <a class="nav-link" style="color: rgb(7, 7, 7)   ;" href="dn.php">Đăng nhập</a>
                        </li>
                        <li>
                            <a class="nav-link" style="color: rgb(12, 12, 12)   ;" href="dk.php">Đăng ký</a>
                        </li>
                    </ul>
                    <div class="col-lg-6" style="float:right">
                        <!-- Thanh tìm kiếm -->
                        <input type="text" id="newGenerationInput" class="form-control"
                            placeholder="Nhập thông tin đời mới và nhấn Enter">
                        <button id="addGenerationButton" class="btn btn-primary">Thêm Đời</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- them doi  -->

    <!-- anh backgourd -->
    </div>
    <div class="container-fluide">
        <div class="rounded-box">
            <div class="thanhdecu" <a href="#" class="l" style=" color: white; text-decoration: none;">
                <h2
                    style="color: rgba(133, 9, 9, 0.726); font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; font-size: 35px">
                    Các cây gia phả </h2>

            </div>
        </div>
    </div>
    <div class="container-fluid" style="background-color: #ecde429e;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="rectangle-frame">
                        <div class="generation-grid">
                            <!-- Generation Node 1 -->
                            <!-- <div class="generation-node" id="TranThaiTong">
                                <img src="./image/TranThaiTong.jpeg" alt="Vua Trần Thái Tông">
                                <div class="generation-info">
                                    <h3 class="generation-name">Vua Trần Thái Tông</h3>
                                    <p class="generation-lifespan">(1218–1277)</p>
                                    <button class="btn btn-primary view-more-button" onclick="editInfo('personA')">xem
                                        thêm</button>
                                </div>
                            </div> -->
                            <!-- Hiển thị dữ liệu từ bảng 'generations' -->
                            <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<div class="generation-node">';
                                echo '<h3 class="generation-name">' . $row['name_member'] . '</h3>';
                                echo '<div class="generation-buttons">';
                                echo '<button class="btn btn-primary view-more-button">Xem thêm</button>';
                                echo '<button class="btn btn-danger delete-button">Xóa</button>';
                                echo '</div>'; // Kết thúc div generation-buttons
                                echo '</div>'; // Kết thúc div generation-node
                            }
                            ?>

                            <!-- Repeat for other generation nodes -->
                            <!-- Ô thế hệ hiện tại 2 -->
                            <!-- <div class="generation-node" id="TranAnhTong">
                                <img src="./image/VoTranNhanTong.jpg" alt="Vua Trần Anh Tông">
                                <div class="generation-info">
                                    <h3 class="generation-name">Vua Trần Anh Tông</h3>
                                    <p class="generation-lifespan">(1258–1308)</p>
                                    <button class="btn btn-primary view-more-button">xem thêm</button>
                                </div>
                            </div> -->

                            <!-- Ô thế hệ mới 3 -->
                            <!-- <div class="generation-node" id="newGeneration3">
                                <img src="./image/TranNhanTong.jpg" alt="Vua Trần Nhân Tông">
                                <div class="generation-info">
                                    <h3 class="generation-name">Vua Trần Nhân Tông</h3>
                                    <p class="generation-lifespan">(1279–1330)</p>
                                    <button class="btn btn-primary view-more-button">xem thêm</button>
                                </div>
                            </div> -->

                            <!-- Ô thế hệ mới 4 -->
                            <!-- <div class="generation-node" id="newGeneration4">
                                <img src="./image/LyChieuHoang.jpg" alt="Thêm thông tin mới">
                                <div class="generation-info">
                                    <h3 class="generation-name">Tên Thế Hệ Mới</h3>
                                    <p class="generation-lifespan">(Năm Sinh–Năm Mất)</p>
                                    <button class="btn btn-primary view-more-button">xem thêm</button>
                                </div>
                            </div> -->


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</body>
<footer>
    <div class="container">
        <p class="copyright">Copyright &copy; 2024 Ma Nguyễn Nhật Tân</p>
        <ul class="social-media">
            <li>
                <a href="https://www.facebook.com/profile.php?id=100095393522926">
                    <i class="fab fa-facebook-f"></i>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fab fa-instagram"></i>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fab fa-youtube"></i>
                </a>
            </li>
        </ul>
    </div>
</footer>
<!-- Chatbox Icon -->
<div class="chat-icon" id="chat-icon">
    <!-- <i class="fab fa-facebook-messenger fa-spin"></i> -->
    <!-- <i class="fab fa-teamspeak" style="color: #B197FC;"></i> -->
    <i class="fab fa-teamspeak fa-lg-spin" style="color: #B197FC;"></i>
</div>

<div class="chat-window" id="chat-window">
    <div class="chat-window-header">
        <h2
            style="text-shadow: 2px 2px 5px rgb(29, 26, 26); color: rgb(225, 29, 29); animation: shake 0.5s ease-in-out 0s infinite alternate;">
            TanMa.com</h2>
        <button id="close-button">&times;</button>
    </div>
    <div class="chat-window-body" id="chat-window-body">
        <!-- Nội dung chat sẽ được thêm vào đây -->
    </div>
    <div class="chat-window-footer">
        <input type="text" id="window-message-input" placeholder="Nhập tin nhắn..." />
        <button id="window-send-button">Gửi</button>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        fetchAndDisplayData();
    });

    // Lấy dữ liệu từ server và hiển thị trong rectangle-frame
    function fetchAndDisplayData() {
        fetch('lay_du_lieu_caygiapha.php')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Có lỗi xảy ra khi lấy dữ liệu.');
                }
                return response.json(); // Trả về dữ liệu JSON từ PHP
            })
            .then(data => {
                const rectangleFrame = document.querySelector('.rectangle-frame');

                // Xóa nội dung cũ trong rectangle-frame trước khi thêm dữ liệu mới
                rectangleFrame.innerHTML = '';

                // Duyệt qua mảng dữ liệu và hiển thị name_member của mỗi phần tử
                data.forEach(generation => {
                    const generationName = generation.name_member;
                    const generationNode = document.createElement('div');
                    generationNode.classList.add('generation-node');
                    generationNode.innerHTML = `
                <div class="generation-info">
                    <h3 class="generation-name">${generationName}</h3>
                </div>
            `;
                    rectangleFrame.appendChild(generationNode);
                });
            })
            .catch(error => {
                console.error('Lỗi:', error);
            });
    }

    // Hàm để thêm một thế hệ mới và hiển thị trên giao diện
    function addNewGeneration() {
        // Lấy giá trị mà người dùng nhập vào ô nhập liệu
        const newGenerationName = document.getElementById('newGenerationInput').value;

        // Kiểm tra xem người dùng đã nhập gì vào ô nhập liệu chưa
        if (newGenerationName.trim() === '') {
            // Nếu ô nhập liệu trống, hiển thị thông báo và không thực hiện gửi dữ liệu
            alert('Vui lòng nhập thông tin đời mới.');
            return; // Dừng lại và không thực hiện tiếp
        }

        // Tạo một đối tượng FormData để chứa dữ liệu cần gửi
        const formData = new FormData();
        formData.append('newGenerationName', newGenerationName);

        // Sử dụng Fetch API để gửi dữ liệu lên luu_doi_moi.php
        fetch('luu_doi_moi.php', {
            method: 'POST',
            body: formData
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Có lỗi xảy ra khi gửi dữ liệu.');
                }
                return response.text(); // Trả về dữ liệu từ PHP
            })
            .then(data => {
                // Hiển thị dữ liệu trả về từ PHP trên giao diện
                const generationGrid = document.querySelector('.generation-grid');
                const newGenerationNode = document.createElement('div');
                newGenerationNode.classList.add('generation-node');
                newGenerationNode.innerHTML = `
        <div class="generation-info">
            <h3 class="generation-name">${newGenerationName}</h3>
            <button class="btn btn-primary view-more-button">Xem thêm</button>
            <button class="btn btn-danger delete-button">Xóa</button>
        </div>
    `;
                generationGrid.appendChild(newGenerationNode);

                // Xóa nội dung trong ô nhập liệu sau khi thêm thành công
                document.getElementById('newGenerationInput').value = '';

                // Hiển thị thông báo khi thêm thành công
                showSuccessMessage();
            })
            .catch(error => {
                console.error('Lỗi:', error);
            });
    }

    // Lắng nghe sự kiện khi người dùng nhấn nút "Thêm Đời"
    const addGenerationButton = document.getElementById('addGenerationButton');
    addGenerationButton.addEventListener('click', addNewGeneration);

    // Lắng nghe sự kiện khi người dùng nhập dữ liệu và nhấn phím Enter
    const newGenerationInput = document.getElementById('newGenerationInput');
    newGenerationInput.addEventListener('keyup', function (event) {
        if (event.key === 'Enter') {
            addNewGeneration(); // Thêm thế hệ mới
            newGenerationInput.value = ''; // Xóa nội dung trong ô nhập liệu
        }
    });


    // Lắng nghe sự kiện khi người dùng nhấn nút xóa
    const deleteButtons = document.querySelectorAll('.delete-button');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function () {
            const generationNode = this.closest('.generation-node');
            const generationName = generationNode.querySelector('.generation-name').textContent;

            // Hiển thị hộp thoại xác nhận
            const confirmDialog = document.querySelector('.confirm-dialog');
            confirmDialog.style.display = 'block';

            // Lắng nghe sự kiện khi người dùng nhấn nút "Có"
            const confirmYesButton = document.querySelector('.confirm-yes');
            confirmYesButton.addEventListener('click', function () {
                // Gửi yêu cầu xóa đời đến server
                fetch('xoa_doi.php', {
                    method: 'POST',
                    body: JSON.stringify({ generationName: generationName }),
                    headers: {
                        'Content-Type': 'application/json'
                    }
                })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Có lỗi xảy ra khi xóa đời.');
                        }
                        return response.text(); // Trả về dữ liệu từ PHP
                    })
                    .then(data => {
                        // Hiển thị thông báo xóa đời thành công
                        const deleteSuccessMessage = document.getElementById('delete-success-message');
                        deleteSuccessMessage.style.display = "block"; // Hiển thị thông báo
                        setTimeout(function () {
                            deleteSuccessMessage.style.display = "none"; // Ẩn thông báo sau 3 giây
                        }, 3000); // Thời gian hiển thị thông báo (3000ms = 3 giây)

                        // Xóa đời khỏi giao diện
                        generationNode.remove();

                        // Ẩn hộp thoại xác nhận
                        confirmDialog.style.display = 'none';
                    })
                    .catch(error => {
                        console.error('Lỗi:', error);
                    });
            });

            // Lắng nghe sự kiện khi người dùng nhấn nút "Không"
            const confirmNoButton = document.querySelector('.confirm-no');
            confirmNoButton.addEventListener('click', function () {
                // Ẩn hộp thoại xác nhận
                confirmDialog.style.display = 'none';
            });
        });
        
    });



// Lắng nghe sự kiện khi người dùng nhấn nút "Xóa"
document.addEventListener('click', function(event) {
    // Kiểm tra xem phần tử được nhấn có class là 'delete-button' hay không
    if (event.target.classList.contains('delete-button')) {
        // Lấy phần tử cha của nút "Xóa" để xác định ô thế hệ cần xóa
        const generationNode = event.target.closest('.generation-node');

        // Lấy tên thế hệ cần xóa
        const generationName = generationNode.querySelector('.generation-name').textContent;

        // Xác nhận trước khi xóa
        if (confirm(`Bạn có chắc chắn muốn xóa đời "${generationName}" không?`)) {
            // Thực hiện xóa đời trên giao diện
            generationNode.remove();

            // Thực hiện xóa đời trong cơ sở dữ liệu
            deleteGeneration(generationName);
        }
    }
});

// Hàm để xóa đời trong cơ sở dữ liệu
function deleteGeneration(generationName) {
    // Tạo một đối tượng FormData để chứa tên đời cần xóa
    const formData = new FormData();
    formData.append('generationName', generationName);

    // Sử dụng Fetch API để gửi yêu cầu xóa đời lên file PHP xử lý
    fetch('xoa_doi.php', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Có lỗi xảy ra khi xóa đời.');
        }
        return response.text(); // Trả về dữ liệu từ PHP
    })
    .then(data => {
        // Hiển thị thông báo khi xóa thành công
        console.log('Đã xóa đời ' + generationName + ' thành công.');
    })
    .catch(error => {
        console.error('Lỗi:', error);
    });
}



    // Lấy phần tử thông báo và lưu vào biến
    var successMessage = document.getElementById("success-message");

    // Hàm hiển thị thông báo
    function showSuccessMessage() {
        successMessage.style.display = "block"; // Hiển thị thông báo
        setTimeout(function () {
            successMessage.style.display = "none"; // Ẩn thông báo sau 3 giây
        }, 3000); // Thời gian hiển thị thông báo (3000ms = 3 giây)
    }
</script>



<script src="chatbot.js"></script>
<script src="btnback.js"></script>

</html>