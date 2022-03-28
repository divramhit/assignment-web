<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="login_signup.css">
  <title>Sign Up Page</title>
</head>

<header class="sign-up-header">
  <ul class="sign-up-nav">
    <li><a href="login.php">Login</a></li>
    <li><a href="index.php">Home</a></li>
  </ul>
</header>

<body>
  <div class="sign-up-container">
    <div class="title-and-form-container">
      <div class="title">
        <div class="name"><h1>MICRO LOGICS LTD</h1></div>
        <div>Your No.1 Destination For Your Electric Needs.</div>
      </div>
      <div class="signup-form">
        <form class="sign-up-email">
          <div>
            <input class="input-group" type="text" placeholder="First Name" name="firstname" required>
          </div>
          <div>
            <input class="input-group" type="text" placeholder="Last Name" name="lastname" required>
          </div>
          <div>
            <input class="input-group" type="text" placeholder="Date Of Birth" name="DOB" onfocus="(this.type='date')" onblur="(this.type='text')" required>
          </div>
          <div>
            <input class="input-group" type="tel" id="phone" name="phone" placeholder="230-58395467" pattern="[0-9]{3}-[0-9]{8}">
          </div>
          <div>
            <input id="email" class="input-group" type="email" placeholder="123@example.com" name="email"required>
          </div>
          <div>
            <input id="password" class="input-group" type="password" placeholder="Password" name="password" required>
          </div>
          <div>
            <input id="retype_password" class="input-group" type="password" placeholder="Re-Type Password" name="confirm_password" required>
          </div>
          <div>
            <input type="button" onclick="goToHome();" class="form-button" value="Create Account">
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
<script>
        const goToHome = () => {
            let email = document.getElementById("email").value;
            let password = document.getElementById("password").value;

            //validations
            //check for empty fields
            if (email === "" || password === "") {
                alert("Some fields are missing");
                return false;
            }
            else {
                location.href = "index.php";
            }

            //using ajax to post data to signupHandler
            // let request = new XMLHttpRequest();
            //
            // request.onload = () => {
            //     if (request.status === 200) {
            //         let responseData = request.responseText;
            //         alert(responseData)
            //         location.replace("index.php");
            //     }
            //     else {
            //         alert(request.responseText);
            //     }
            // };

            // request.open("POST", "loginHandler.php");
            // request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            // request.send("username=" + username + "&password=" + password);
        }
</script>
</html>
