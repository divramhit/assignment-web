<!DOCTYPE html>
<?php include_once("header_login.php"); ?>
<html lang="en">
<head>
  <?php commonLogin("Sign Up Page"); ?>
</head>

<?php outputHeader("Log In", "login") ?>

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
            <input id= "firstname" class="input-group" type="text" placeholder="First Name" name="firstname" required>
          </div>
          <div>
            <input id = "lastname" class="input-group" type="text" placeholder="Last Name" name="lastname" required>
          </div>
          <div>
            <input id = "DOB" class="input-group" type="text" placeholder="Date Of Birth" name="DOB" onfocus="(this.type='date')" onblur="(this.type='text')" required>
          </div>
          <div>
            <input id= "phoneNum" class="input-group" type="tel" id="phone" name="phone" placeholder="230-58395467" pattern="[0-9]{3}-[0-9]{8}">
          </div>
          <div>
            <input id="street" class="input-group" type="text" placeholder="Street" name="street" required>
          </div>
          <div>
            <input id="city" class="input-group" type="text" placeholder="City" name="city" required>
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
<?php include_once("footer.php"); ?>
<script>
        const goToHome = () => {
            let email = document.getElementById("email").value;
            let password = document.getElementById("password").value;
            let firstname = document.getElementById("firstname").value;


            //validations
            //check for empty fields
            if (email === "" || password === "" || firstname === "") {
                alert("Some fields are missing");
                return false;
            }


            //using ajax to post data to signupHandler
            let request = new XMLHttpRequest();

            request.onload = () => {
                if (request.status === 200) {
                    let responseData = request.responseText;
                    alert(responseData)
                    location.replace("login.php");
                }
                else {
                    alert(request.responseText);
                }
            };

            request.open("POST", "signupHandler.php");
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send("email=" + email + "&password=" + password);
        }
</script>
</html>
