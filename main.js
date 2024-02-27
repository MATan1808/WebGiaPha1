const inputUsername = document.querySelector(".input-login-username");
const inputPassword = document.querySelector(".input-login-password");
const btnLogin = document.querySelector(".login__signInButton");

btnLogin.addEventListener("click", (e) => {
  e.preventDefault();
  
  if (inputUsername.value === "" || inputPassword.value === "") {
    alert("Vui lòng không để trống");
  } else {
    const user = JSON.parse(localStorage.getItem(inputUsername.value));
    
    if (!user) {
      alert("Tên Đăng Nhập Chưa Đăng ký");
    } else if (user.password !== inputPassword.value) {
      alert("Sai Mật Khẩu");
    } else {
      if (inputUsername.value === "admin" && inputPassword.value === "admin" ) {
        alert("Đăng Nhập Thành Công (Admin)");
        window.location.href = "admin.html";
      } else {
        alert("Đăng Nhập Thành Công");
        window.location.href = "Trangchu.html";
      }
    }
  }
});