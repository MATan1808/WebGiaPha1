const inputUsernameRegister = document.querySelector(".input-signup-username");
const inputPasswordRegister = document.querySelector(".input-signup-password");
const inputPassRegister = document.querySelector(".input-signup-pass");
const inputhvtRegister = document.querySelector(".input-signup-hvt");
const inputIntroCode = document.querySelector(".input-signup-intro-code");
const btnRegister = document.querySelector(".signup__signInButton");

// validation form register and register user local storage

btnRegister.addEventListener("click", (e) => {
  e.preventDefault();

  // Kiểm tra các trường dữ liệu nhập liệu không hợp lệ
  if (
    inputUsernameRegister.value === "" ||
    inputPasswordRegister.value === "" ||
    inputPassRegister.value === "" ||
    inputhvtRegister.value === "" ||
    inputIntroCode.value === ""
  ) {
    alert("Vui lòng điền đầy đủ thông tin.");
  } else {
    // Kiểm tra mã giới thiệu
    const introCode = "Nhattan";

    if (inputIntroCode.value !== introCode) {
      alert("Mã giới thiệu không đúng.");
    } else {
      // Kiểm tra xem tài khoản đã tồn tại chưa
      if (localStorage.getItem(inputUsernameRegister.value)) {
        alert("Tài khoản đã được đăng ký.");
      } else {
        // Kiểm tra nhập lại mật khẩu
        if (inputPasswordRegister.value !== inputPassRegister.value) {
          alert("Nhập lại mật khẩu chưa đúng.");
        } else {
          // Tạo đối tượng user
          const user = {
            username: inputUsernameRegister.value,
            password: inputPasswordRegister.value,
            pass: inputPassRegister.value,
            hvt: inputhvtRegister.value,
          };

          // Lưu user vào localStorage
          let json = JSON.stringify(user);
          localStorage.setItem(inputUsernameRegister.value, json);

          alert("Đăng Ký Thành Công");
          window.location.href = "dn.html";
        }
      }
    }
  }
});
