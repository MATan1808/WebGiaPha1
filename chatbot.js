
document.addEventListener("DOMContentLoaded", function() {
  var chatIcon = document.getElementById("chat-icon");
  var chatWindow = document.getElementById("chat-window");
  var closeButton = document.getElementById("close-button");
  var windowSendButton = document.getElementById("window-send-button");
  var windowMessageInput = document.getElementById("window-message-input");
  var chatWindowBody = document.getElementById("chat-window-body");
  var scrollUpButton = document.getElementById("scroll-up-button");

  chatIcon.addEventListener("click", function() {
    chatWindow.style.display = "block";
    showHint("Xin chào! Bạn cần giúp gì?");
  });

  closeButton.addEventListener("click", function() {
    chatWindow.style.display = "none";
    clearChatHistory();
  });

  windowSendButton.addEventListener("click", sendMessage);
  windowMessageInput.addEventListener("keydown", function(event) {
    if (event.key === "Enter") {
      sendMessage();
    }
  });

  function sendMessage() {
    var message = windowMessageInput.value;
    if (message !== "") {
      showMessage(message, "user");
      processUserInput(message);
      windowMessageInput.value = "";
      scrollChatWindowToBottom();
    }
  }
  // xử lý link
  // function simulateResponse(question) {
  //   setTimeout(() => {
  //     const responseText = getResponseText(question);
  //     const responseDiv = document.createElement('div');
  //     responseDiv.className = 'response';
  
  //     // Biến link được thêm vào phạm vi toàn cục
  //     let link;
  
  //     // Kiểm tra xem có nên tạo liên kết hay không
  //     if (responseText.toLowerCase() === "trangchu.html") {
  //       link = document.createElement('a');
  //       link.href = responseText;
  //       link.textContent = responseText;
  //       responseDiv.appendChild(link);
  //     } else {
  //       link = document.createElement('div');
  //       link.textContent = responseText;
  //       responseDiv.appendChild(link);
  //     }
  
  //     chatWindowBody.appendChild(responseDiv);
  
  //     // Scroll to the bottom to show the latest response
  //     chatWindowBody.scrollTop = chatWindowBody.scrollHeight;
  
  //     // Thêm sự kiện onclick sau khi biến link đã được tạo
  //     if (link) {
  //       link.onclick = function() {
  //         // Thực hiện chuyển hướng khi link được click
  //         window.location.href = responseText;
  //         return false; // Ngăn chặn mặc định của thẻ a
  //       };
  //     }
  //   }, 1000);
  // }
  
  // link.onclick = function() {
  //   console.log("Link clicked");
  //   window.location.href = responseText;
  //   return false;
  // };
  function processUserInput(message) {
    message = message.toLowerCase();
  
    if (message.includes("tài khoản admin")) {
      showMessage("Tài khoản Admin1:\n- Tài khoản: admin1 \n- Mật khẩu: 1", "bot");
      showMessage("Tài khoản Admin2:\n- Tên khoản: 1\n- Mật khẩu: 1", "bot");
    } else if (message.includes("xin chào")) {
      showMessage("Chào bạn! Cần hỗ trợ gì hôm nay?", "bot");
    } else if (message.includes("không")) {
      showMessage("Rất tiếc nếu có vấn đề. Bạn có thể cho mình biết chi tiết hơn được không?", "bot");
    } else if (message.includes("cảm ơn")) {
      showMessage("Không có gì. Hãy giữ tinh thần lạc quan!", "bot");
    } else if (message.includes("hết cập nhập")) {
      showMessage("Chúng tôi luôn cố gắng cập nhật nhanh nhất có thể. Bạn muốn biết về chủ đề nào?", "bot");
    } else if (message.includes("cách sử dụng web")) {
      showMessage("Hướng dẫn sử dụng có sẵn trên trang chủ. Bạn có thắc mắc gì cụ thể?", "bot");
    } else if (message.includes("thời gian hoạt động")) {
      showMessage("Thời gian hoạt động của chúng tôi là từ 8 giờ sáng đến 5 giờ chiều, từ thứ 2 đến thứ 6.", "bot");
    } else if (message.includes("liên hệ")) {
      showMessage("Bạn có thể liên hệ qua email support@webgiapha.com hoặc số điện thoại 0123-456-789.", "bot");
    } else if (message.includes("giá dịch vụ")) {
      showMessage("Thông tin về giá dịch vụ hiện có trên trang chủ. Còn gì tôi có thể giúp bạn?", "bot");
    } else if (message.includes("dịch vụ đặc biệt")) {
      showMessage("Chúng tôi cung cấp các dịch vụ đặc biệt như tư vấn, hỗ trợ kỹ thuật và nhiều hơn nữa. Bạn muốn biết thêm?", "bot");
    } else if (message.includes("ảnh đẹp")) {
      showMessage("Chúng tôi có một bộ sưu tập ảnh đẹp trên trang chủ. Bạn muốn xem ảnh nào?", "bot");
    } else {
      showMessage("Xin lỗi, tôi không hiểu yêu cầu của bạn. Bạn có thể hỏi về các vấn đề khác nhé.", "bot");
    }
  }
  

  function showHint(hint) {
    var hintElement = document.createElement("div");
    hintElement.classList.add("message");
    hintElement.classList.add("bot");
    hintElement.innerText = hint;
    chatWindowBody.appendChild(hintElement);
    scrollChatWindowToBottom();
  }

  function showMessage(message, sender) {
    var messageElement = document.createElement("div");
    messageElement.classList.add("message");
    messageElement.classList.add(sender);
    messageElement.innerText = message;
    chatWindowBody.appendChild(messageElement);
    scrollChatWindowToBottom();
    hideExcessMessages();
  }

  function clearChatHistory() {
    chatWindowBody.innerHTML = "";
  }

  function scrollChatWindowToBottom() {
    chatWindow.scrollTop = chatWindow.scrollHeight;4
  }

  function hideExcessMessages() {
    var messages = chatWindowBody.getElementsByClassName("message");
    var visibleMessages = Array.from(messages).slice(-10); // Hiển thị tối đa 10 tin nhắn cuối cùng
    Array.from(messages).forEach(function(message) {
      if (!visibleMessages.includes(message)) {
        message.style.display = "none";
      } else {
        message.style.display = "block";
      }
    });
  }

  scrollUpButton.addEventListener("click", function() {
    chatWindow.scrollTop = 0;
  });
});


