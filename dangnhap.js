const inputUsername = document.querySelector(".input-login-username");
const inputPassword = document.querySelector(".input-login-password");
const btnLogin = document.querySelector(".login__signInButton");

btnLogin.addEventListener("click", (e) => {
  e.preventDefault();

  // Lấy thông tin người dùng từ localStorage
  const user = JSON.parse(localStorage.getItem(inputUsername.value));

  // Kiểm tra đặc biệt nếu tài khoản là admin mặc định
  if (inputUsername.value === "admin1" && inputPassword.value === "1") {
    alert("Đăng Nhập Thành Công (Admin)");
    window.location.href = "admin.html";
    return;
  }

  if (!user) {
    // Nếu không có tài khoản, hiển thị thông báo
    alert("Tài khoản không tồn tại. Vui lòng đăng ký.");
  } else {
    // Nếu có tài khoản, kiểm tra mật khẩu
    if (user.password === inputPassword.value) {
      // Đăng nhập thành công, kiểm tra nếu là tài khoản admin
      if (inputUsername.value === "1") {
        // alert("Đăng Nhập Thành Công (Admin)");
        window.location.href = "admin.html";
      } else {
        alert("Đăng Nhập Thành Công");
        window.location.href = "Trangchu.html";
      }
    } else {
      // Sai mật khẩu, hiển thị thông báo
      alert("Sai Mật Khẩu");
    }
  }
});
