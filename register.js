// Sử dụng thư viện jQuery để dễ dàng thực hiện Ajax
$.ajax({
    type: "GET",
    url: "register.php",
    data: {
        username: "test",
        password: "123",
        hvt: "John Doe"
    },
    success: function (response) {
        console.log(response); // Xử lý phản hồi từ server (nếu cần)
    },
    error: function (error) {
        console.log(error); // Xử lý lỗi (nếu cần)
    }
});
