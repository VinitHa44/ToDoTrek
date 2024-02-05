<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forget Password</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
  </head>
  <style>
    .content{
        background-color: #ffffff;
        width: 50%;
        height: 100%;
    }
    .text-success {
    color: #28a745;
    }
    .text-danger {
        color: #dc3545;
    }
  </style>
  <body style="background-color: #0c0032;" >
  <?php
require 'nav.php';
?>
  <hr style="margin-top: 20px; background-color:	#BFA181;">
  <?php
    include 'dbForgetPass.php';
?>
<?php
if($setPass){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Congratulations, </strong>your Password has been updated successfully.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
  header('location: login.php');
}
?>
<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="my-4 content">
                <form action="forgetPassword.php" method="post">
                <input type="hidden" name="fpass" id="fpass">
                <div class="mb-3 my-4 mx-5">
                        <label for="name" class="form-label">Username</label>
                        <input type="text" class="form-control" id="name" name="name" autocomplete="off" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3 my-4 mx-5">
                        <label for="pass" class="form-label">Set New Password</label>
                        <input type="password" class="form-control" onkeyup="checkPassword()" id="pass" name="pass" aria-describedby="emailHelp">
                        <script type="text/javascript" src="passStrengthcheck.js"></script>
                        <p id="password-feedback"></p>
                    </div>
                    <div class="mb-3 my-4 mx-5">
                        <label for="cpass" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" onkeyup="checkPasswordMatch()" name="cpass" id="cpass">
                        <div class="registrationFormAlert" id="divCheckPasswordMatch"></div>
                    </div>
                    <script>
                        <?php
                        require("passStrengthcheck.js");
                        require("passwordcheck.js");
                        ?>
                    </script>
                    <button type="submit" class="btn btn-primary mx-5 mb-4">Save Password</button>
                </form>
            </div>
        </div>
    </div>
</section>
    <?php
     require('footer.php');
    ?>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
