function showLoginForm() {
    var identity = document.getElementById("identity").value;
    var loginForm = document.getElementById("login-form");
  
    if (identity === "") {
      loginForm.style.display = "none";
    } else {
      loginForm.style.display = "block";
    }
  }
  
  function login() {
    var username = document.getElementById("username").value;
    // var password = document.getElementById("password").value;
    var identity = document.getElementById("identity").value;
  
    // Here you can add code to verify the username, password, and identity
    // For this example, we'll just display an alert with the entered values
    // alert("Username: " + username + "\nIdentity: " + identity);
  }
  