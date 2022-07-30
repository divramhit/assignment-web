<!DOCTYPE html>
<?php include_once("header_login.php"); ?>
<html lang="en">
<head>
  <?php commonLogin("Log In Page"); ?>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</head>

<?php outputHeader("Sign Up", "signup") ?>

<body>
  <div class= "loginContainer">
    <div class="title-and-form-container">
      <div class="title">
        <div class="name"><h1>MICRO LOGICS LTD</h1></div>
        <div>Your No.1 Destination For Your Electric Needs.</div>
      </div>
      <div class="loginform">
        <form id="login-email" class="login-email" method="post">
          <div>
            <input id="email" class="input-group" type="email" placeholder="123@example.com" name="email" required>
          </div>
          <div>
            <input id="password" class="input-group" type="password" placeholder="Password" name="password" required>
          </div>
          <div>
            <input type="button" onclick="login();" class="form-button" value="Log in">
          </div>
          <div><a href="">Forgot Password?</a></div>
          <div>
            <input type="button" onclick="goToSignup();" class="form-button" value="Sign Up">
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
<?php include_once("footer.php"); ?>
<script>
        const login = () => {
            let email = document.getElementById("email").value;
            let password = document.getElementById("password").value;
            var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

            //validations
            //check for empty fields
            if (email === "" || password === "") {
                alert("Some fields are missing");
                return false;
            }

          //email validation
          if (!email.match(mailformat))
          {
            alert("You have entered an invalid email address!");
            return false;
          }

            // using ajax to post data to signupHandler
            // let request = new XMLHttpRequest();

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
            // request.send("email=" + email + "&password=" + password);
            
            // using (jQuery)ajax to post data to signupHandler
            $.ajax({
              type: "POST",
              url: 'loginHandler.php',
              data: {"email": email, "password": password},
              success: function(response)
              {
                  // var jsonData = JSON.parse(response);
                  var jsonData = response;

                  // user is logged in successfully in the back-end
                  // let's redirect
                  alert(jsonData);
                  if (JSON.parse(jsonData) === "Login success")
                  {
                    location.href = 'index.php';
                  }
              },
              error: function(response)
              {
                alert("Invalid Credentials");
              }
            });
        }

        const goToSignup = () => {
          location.href = "signup.php";
        }
    </script>
</html>
