<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>signup</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <style>
    .myform-button{
      background: #07315B;
      width: 100%;
    height: 50px;
    font-size: 17px;
    background: rgba(103,58,183);
    border: none;
    border-radius: 50px;
    color: #fff;
    cursor: pointer;
    -webkit-transition: all .5s;
    -o-transition: all .5s;
    transition: all .5s;
    }
    .text-success {
    color: #28a745;
    }
    .text-danger {
        color: #dc3545;
    }
  </style>
  <script>
      function validateEmail() {
            const emailInput = document.getElementById('eadd');
            const emailValue = emailInput.value;
            const emailPattern = /^[a-zA-Z0-9._%+-]+@(gmail\.com|yahoo\.com|[^.]+(\.com|\.in))$/;
            const startsWithSpecialChar = /^[^a-zA]/.test(emailValue);
            const repeatsSpecialChar = /(.)\1/.test(emailValue);
            const domainPart = emailValue.split('@')[1];

            const errorElement = document.getElementById('error');

            if (emailPattern.test(emailValue) && !startsWithSpecialChar && !repeatsSpecialChar && domainPart) {
                errorElement.textContent = '';
                emailInput.style.border = '1px solid #ccc';
            } else {
                errorElement.textContent = 'Please enter a valid email address with an allowed domain, without starting with a special character, without repeating special characters, and with a valid domain.';
                emailInput.style.border = '1px solid red';
            }
        }
        // email validation
        function checkEmail() {
            const emailInput = document.getElementById("eadd");
            const email = emailInput.value;
            const feedback = document.getElementById("email-feedback");
            const emailPattern = /^[a-zA-Z0-9._-]+@(.*(gmail|yahoo)+(\.com|\.in))$/;
            if (emailPattern.test(email)) {
              feedback.textContent = "Valid email address.";
              feedback.style.color = "green";
            } else {
              feedback.textContent = "Invalid email address.";
              feedback.style.color = "red";
            }
          }
          function checkfName() {
              const nameInput = document.getElementById("fname");
              const name = nameInput.value;
              const feedback = document.getElementById("fname-feedback");

              const namePattern = /^[a-zA-Z]+$/;

              if (namePattern.test(name)) {
                feedback.textContent = "Valid name.";
                feedback.style.color = "green";
              } else {
                feedback.textContent = "Invalid First Name. Should only contain letters.";
                feedback.style.color = "red";
              }
            }

            // Last Name validation
            function checklName() {
              const nameInput = document.getElementById("lname");
              const name = nameInput.value;
              const feedback = document.getElementById("lname-feedback");

              const namePattern = /^[a-zA-Z]+$/;

              if (namePattern.test(name)) {
                feedback.textContent = "Valid name.";
                feedback.style.color = "green";
              } else {
                feedback.textContent = "Invalid Last Name. Should only contain letters.";
                feedback.style.color = "red";
              }
            }


            // username check
            function checkUsername() {
              const usernameInput = document.getElementById("name");
              const username = usernameInput.value;
              const feedback = document.getElementById("username-feedback");
              const usernamePattern = /^[a-zA-Z0-9_]{3,20}$/;
              const startsWithNumber = /^\d/;
              if (usernamePattern.test(username) && !startsWithNumber.test(username)) {
                feedback.textContent = "Valid username.";
                feedback.style.color = "green";
              } else {
                feedback.textContent = "Invalid username. Username should be 3 to 20 characters and should not start with numbers and can only contain letters, numbers, and underscores.";
                feedback.style.color = "red";
              }
            }
            // password Strength
            function checkPassword() {
                const passwordInput = document.getElementById("pass");
                const password = passwordInput.value;
                const feedback = document.getElementById("password-feedback");

                const lengthPattern = /.{8,}/; // At least 8 characters
                const uppercasePattern = /[A-Z]/;
                const lowercasePattern = /[a-z]/;
                const numberPattern = /\d/;
                const specialCharPattern = /[!@#$%^&*()_+{}\[\]:;<>,.?~\\/-]/;

                const validLength = lengthPattern.test(password);
                const hasUppercase = uppercasePattern.test(password);
                const hasLowercase = lowercasePattern.test(password);
                const hasNumber = numberPattern.test(password);
                const hasSpecialChar = specialCharPattern.test(password);

                if (validLength && hasUppercase && hasLowercase && hasNumber && hasSpecialChar) {
                  feedback.textContent = "Strong password.";
                  feedback.style.color = "green";
                } else {
                  feedback.textContent = "Password should be at least 8 characters long and include at least one uppercase letter, one lowercase letter, one number, and one special character.";
                  feedback.style.color = "red";
                }
              }

              // password match
              function checkPasswordMatch() {
                  var password = $("#pass").val();
                  var confirmPassword = $("#cpass").val();

                  if (password != confirmPassword)
                      $("#divCheckPasswordMatch").html("Passwords do not match!").addClass('text-danger').removeClass('text-success');

                  else
                      $("#divCheckPasswordMatch").html("Passwords match.").addClass('text-success').removeClass('text-danger');
              }

  </script>
  <body style="background-color: #0c0032">
  
<?php
require 'nav.php';
?>
<hr style="margin-top: 20px; background-color:	#BFA181">
<?php
  include 'dbUserInsert.php';
?>
<?php
if($insert){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>you have been successfully Signed Up. </strong> Please login to your acount
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
  header('location: index.php');
  $insert = true;
  
}
?>

    <!-- Section: Design Block -->
<section class="">
  <!-- Jumbotron -->
  <div class="px-4 py-5 px-md-5 text-center text-lg-start">
    <div class="container">
      <div class="row gx-lg-5 align-items-center">
        <div class="col-lg-6 mb-5 mb-lg-0">
          <h1 class="my-5 display-3 fw-bold ls-tight" style="color: #fff; font-family:britannic bold;">
          Your to-do list: <br/>
            <span class="text" style="color: rgba(103,58,183); font-family:britannic bold;">your path to productivity.</span>
          </h1>
          <p style="color: hsl(217, 10%, 50.8%); font-family:britannic bold;">
          "Welcome to our TodoTrek platform, 
          where organization meets productivity! 
          Sign up today to gain access that is 
          designed to help you take charge of your tasks and 
          accomplish more than ever before. With our intuitive interface, 
          you can easily create, prioritize, and manage your tasks, turning 
          your goals into actionable steps. Whether you're striving for personal growth 
          or professional success, our TodoTrek platform empowers you to plan, 
          track, and celebrate your achievements. Say goodbye to overwhelm and 
          hello to a more organized, efficient you. Join us now and start your journey 
          towards a more productive future!"
          </p>
        </div>

        <div class="col-lg-6 mb-5 mb-lg-0">
          <div class="card">
            
            <div class="card-body py-5 px-md-5">
            <h2 class="fw-bold mb-5">Sign up now</h2>
              <form action="signup.php" method="post">
                  <div class="form-group" style="text-align: left;">
                      <input type="text" id="fname" onkeyup="checkfName()" class="form-control" autocomplete="off" name="fname" />
                      <label class="form-label" for="fname">First Name</label>
                      <p id="fname-feedback"></p>

                    </div>
                    <div class="form-group" style="text-align: left;">
                      <input type="text" id="lname" onkeyup="checklName()" class="form-control" autocomplete="off" name="lname" />
                      <label class="form-label" for="lname">Last Name</label>
                      <p id="lname-feedback"></p>
                    </div>
                <div class="form-group" style="text-align: left;">
                  <input type="email" id="eadd" onkeyup="checkEmail()" name="eadd" autocomplete="off" required class="form-control" />
                  <div id="error" style="color: red;"></div>
                  <label class="form-label" for="eadd">Email address</label>
                  <p id="email-feedback"></p>
                </div>

                <div class="form-group" style="text-align: left;">
                      <input type="text" id="name" onkeyup="checkUsername()" autocomplete="off" class="form-control" name="name" />
                      <label class="form-label" for="name">Username</label>
                      <p id="username-feedback"></p>

                    </div>

                <!-- Password input -->
                <div class="form-group" style="text-align: left;">
                  <input type="password" id="pass" onkeyup="checkPassword()" name="pass" class="form-control" />
                  <label class="form-label" for="pass">Password</label>
                  <script type="text/javascript" src="passStrengthcheck.js"></script>
                  <p id="password-feedback"></p>
                </div>
                <div class="form-group" style="text-align: left;">
                  <input type="password" id="cpass" onkeyup="checkPasswordMatch()" name="cpass" class="form-control" />
                  <label class="form-label" for="cpass">Confirm Password</label>
                  <div class="registrationFormAlert" id="divCheckPasswordMatch"></div>
                </div>

                <!-- Submit button -->
                <button type="submit" class="myform-button">Sign up</button>
                <small>Already have an account? </small><a href="login.php" style="font-size: 13px; margin-right: 50px;">Login Here</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Jumbotron -->
</section>

<?php
     require('footer.php');
?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>