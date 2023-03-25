// // 取得 Logout 按鈕的參考
// const logoutBtn = document.querySelector('#logout-btn');

// // 當使用者點擊 Logout 按鈕時，執行以下程式碼
// logoutBtn.addEventListener('click', (event) => {
//   event.preventDefault(); // 防止瀏覽器直接跳轉

//   // 使用 AJAX 發送 POST 請求到 log_out.php，並等待回應
//   fetch('./backend/log_out.php', {
//     method: 'POST',
//     credentials: 'same-origin'
//   })
//   .then((response) => {
//     // 如果回應狀態碼為 200 OK，表示登出成功，重新載入當前頁面
//     if (response.ok) {
//       window.location.replace('./index.html');
//       alert('登出成功');
//     }
//   }).catch((error) => {
//     alert('登出失敗');
//     console.error(error);
//   });
// });


// 取得 Logout 按鈕的參考
const logoutBtn = document.querySelector('#logout-btn');

// 當使用者點擊 Logout 按鈕時，執行以下程式碼
logoutBtn.addEventListener('click', (event) => {
  event.preventDefault(); // 防止瀏覽器直接跳轉

  // 使用 AJAX 發送 POST 請求到 log_out.php，並等待回應
  fetch('./backend/log_out.php', {
    method: 'POST',
    credentials: 'same-origin'
  })
  .then((response) => {
    // 解析回應中的 JSON 格式資料
    return response.json();
  })
  .then((data) => {
    // 根據回應中的內容執行不同的操作
    if (data.success) {
      window.location.replace('./index.html');
      alert(data.message);
    } else {
      alert(data.message);
    }
  })
  .catch((error) => {
    alert('登出失敗2');
    console.error(error);
  });
});
