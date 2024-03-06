document.addEventListener("DOMContentLoaded", function () {
    // Hiển thị danh sách người dùng từ localStorage
    displayUsers();
  
    // Bắt sự kiện khi có người dùng mới được đăng ký hoặc chỉnh sửa
    window.addEventListener("storage", function (e) {
      if (e.key !== "introCode" && e.newValue) {
        // Cập nhật lại danh sách người dùng khi có sự thay đổi
        displayUsers();
      }
    });
  });
  
  // Hàm hiển thị danh sách người dùng trên bảng Admin
  function displayUsers() {
    const tableBody = document.querySelector(".custom-table tbody");
    tableBody.innerHTML = "";
  
    // Lấy danh sách người dùng từ localStorage
    const users = getAllUsers();
  
    // Hiển thị danh sách người dùng trên bảng
    users.forEach((user, index) => {
      const row = tableBody.insertRow(index);
      row.innerHTML = `
        <td>${index + 1}</td>
        <td>${user.username}</td>
        <td>${user.password}</td>
        <td>${user.role}</td>
        <td>${user.hvt}</td>
        <td>
          <button class="btn btn-danger" onclick="deleteUser('${user.username}')">Xóa</button>
          <button class="btn btn-warning" onclick="editUser('${user.username}')">Chỉnh sửa</button>
          <button class="btn btn-success">Thêm</button>
        </td>`;
    });
  }
  
  // Hàm lấy danh sách người dùng từ localStorage
  function getAllUsers() {
    const users = [];
    for (let i = 0; i < localStorage.length; i++) {
      const key = localStorage.key(i);
      if (key !== "introCode") {
        const user = JSON.parse(localStorage.getItem(key));
        users.push({
          username: user.username,
          password: user.password,
          role: "User", // Chức vụ có thể cần phải được cập nhật tùy thuộc vào dữ liệu của bạn
          hvt: user.hvt,
        });
      }
    }
    return users;
  }
  
  // Hàm xóa người dùng khỏi localStorage
  function deleteUser(username) {
    if (confirm(`Bạn có chắc chắn muốn xóa tài khoản "${username}" không?`)) {
      localStorage.removeItem(username);
      // Sau khi xóa, cập nhật lại danh sách người dùng trên bảng
      displayUsers();
    }
  }
  
  // Hàm chỉnh sửa thông tin người dùng
  function editUser(username) {
    const user = JSON.parse(localStorage.getItem(username));
  
    // Tạo form chỉnh sửa thông tin
    const form = document.createElement("form");
    form.innerHTML = `
      <label for="editedUsername">Tài Khoản:</label>
      <input type="text" id="editedUsername" name="editedUsername" value="${user.username}" readonly>
      <br>
      <label for="editedPassword">Mật Khẩu:</label>
      <input type="password" id="editedPassword" name="editedPassword" value="${user.password}">
      <br>
      <label for="editedRole">Chức Vụ:</label>
      <input type="text" id="editedRole" name="editedRole" value="${user.role}" readonly>
      <br>
      <label for="editedHvt">Họ Và Tên:</label>
      <input type="text" id="editedHvt" name="editedHvt" value="${user.hvt}">
      <br>
      <button type="button" onclick="saveEditedUser('${username}')">Lưu</button>
    `;
  
    // Hiển thị form chỉnh sửa trong thông báo
    const confirmation = confirm("Bạn có muốn chỉnh sửa thông tin không?");
    if (confirmation) {
      // Hiển thị form chỉnh sửa trong hộp thoại
      const result = window.confirm("Chỉnh sửa thông tin người dùng", form);
    }
  }
  
  // Hàm lưu thông tin người dùng đã chỉnh sửa
  function saveEditedUser(originalUsername) {
    const editedUsername = document.getElementById("editedUsername").value;
    const editedPassword = document.getElementById("editedPassword").value;
    const editedRole = document.getElementById("editedRole").value;
    const editedHvt = document.getElementById("editedHvt").value;
  
    // Lưu thông tin người dùng đã chỉnh sửa vào localStorage
    localStorage.setItem(editedUsername, JSON.stringify({
      username: editedUsername,
      password: editedPassword,
      role: editedRole,
      hvt: editedHvt,
    }));
  
    // Xóa thông tin người dùng cũ nếu tên tài khoản đã thay đổi
    if (originalUsername !== editedUsername) {
      localStorage.removeItem(originalUsername);
    }
  
    // Cập nhật lại danh sách người dùng trên bảng
    displayUsers();
  }
  