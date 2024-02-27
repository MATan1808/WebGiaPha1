const inputUsernameRegister = document.querySelector(".input-signup-username");
const inputPasswordRegister = document.querySelector(".input-signup-password");
const inputPassRegister=document.querySelector(".input-signup-pass")
const inputhvtRegister=document.querySelector(".input-signup-hvt")
const btnRegister = document.querySelector(".signup__signInButton");

// validation form register and register user local storage

btnRegister.addEventListener("click", (e) => {
  e.preventDefault();
  if (
    inputUsernameRegister.value === "" ||
    inputPasswordRegister.value === "" ||
    inputPassRegister.value    ===  "" ||
    inputhvtRegister.value ===""

  ) {
    alert("vui lòng không để trống");
  } if (
    inputUsernameRegister.value === "admin" 
    // inputPasswordRegister.value === "" ||
    // inputPassRegister.value    ===  "" ||
    // inputhvtRegister.value ===""

  ) {
    alert("tài khoản đã dk");
  }
  else if( inputPasswordRegister.value != inputPassRegister.value  ){
    alert("nhập lại password chưa đúng ")
  }
  else {
    // array user
    const user = {
      username: inputUsernameRegister.value,
      password: inputPasswordRegister.value,
      pass:inputPassRegister.value,
      hvt:inputhvtRegister.value,
    };


    
    let json = JSON.stringify(user);
    localStorage.setItem(inputUsernameRegister.value, json);
    alert("Đăng Ký Thành Công");
    window.location.href = "dn.html";
  }
});