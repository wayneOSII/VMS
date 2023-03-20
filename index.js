// 監聽navbar連結的點擊事件
// $(document).on('click', '.navbar-nav a', function(event) {
//     event.preventDefault(); // 阻止默認跳轉行為
//     var target = $(this).data('target'); // 獲取目標元素的ID
//     $(target)[0].scrollIntoView({behavior: 'smooth'}); // 滾動到目標元素
//   });
  

// $(document).ready(function() {
//     // 获取所有导航链接元素
//     var links = $('.nav-link');
    
//     // 为每个链接添加点击事件监听器
//     links.click(function(event) {
//       event.preventDefault(); // 阻止默认的页面跳转行为
      
//       // 获取目标页面的URL
//       var url = $(this).attr('href');
      
//       // 获取目标页面内容应该显示的位置的ID
//       var targetID = $(this).attr('data-target');
      
//       // 异步加载目标页面的内容，并将其显示在相应的位置上
//       $('#' + targetID).load(url);
//     });
//   });


// $(document).ready(function() {
//     // 監聽導航鏈接的點擊事件
//     $('.nav-link').click(function(e) {
//       e.preventDefault(); // 阻止默認行為
//       var target = $(this).data('attend'); // 獲取要顯示的內容區塊的ID
//       $('#' + target).show().siblings().hide(); // 顯示目標內容區塊並隱藏其它內容區塊
//     });
//   });


// $(document).ready(function(){
//   $(".nav-link").click(function(){
//     $("attend").show();
//   });
// });

  
// var attendLink = document.getElementById("attend-link");
// var attendIframe = document.getElementById("attend-iframe");

// attendLink.addEventListener("click", function(event) {
//   event.preventDefault();
//   attendIframe.src = "attend.html";
// });


// // 找到 "值勤簽到" 項目的 a 元素
// const attendLink = document.querySelector('[data-target="attend"]');

// // 在 a 元素上註冊點擊事件監聽器
// attendLink.addEventListener('click', function(event) {
//   // 阻止默認的連結跳轉行為
//   event.preventDefault();

//   // 找到要顯示的 iframe 元素
//   const iframe = document.querySelector('#attend-iframe');

//   // 設置 iframe 的 src 屬性為要顯示的 HTML 文件的 URL
//   iframe.src = 'attend.html';
// });

$(document).ready(function(){
    $(".nav-link").click(function(){
      $("iframe").show();
    });
  });


const links = document.querySelectorAll('nav a');
      const iframe = document.querySelector('#attend-iframe');
      links.forEach((link) => {
        link.addEventListener('click', (event) => {
          event.preventDefault();
          const target = event.target.dataset.target;
          iframe.src = target;
        });
      });

$(document).ready(function(){
  $(".navbar-brand").click(function(){
    $("iframe").hide();
  });
});

 