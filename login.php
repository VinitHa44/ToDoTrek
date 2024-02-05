<?php
include 'dbSelect.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <style>
    @import url('https://fonts.googleapis.com/css?family=Roboto:300,400');

* {
    margin:0;
    padding:0
}
a,a:hover{
  text-decoration: none;
}
.myform-area{
  overflow: hidden;
  padding: 60px 0;
  /* background: #0c0032; */
  position: relative;
  padding-top: 100px;
  padding-bottom: 100px;
}
.myform-area .form-area{
  position: relative;
  background: rgba(103,58,183,0.7);
  width: 100%;
  height: 400px;
  overflow: hidden;
  /* box-shadow: 0 0 40px 0 #e1e1e1; */
}

.myform-area .form-area .form-content,
.myform-area .form-area .form-input{
    position: relative;
    width: 50%;
    height: 100%;
    float: left;
    box-sizing: border-box;
}

.myform-area .form-area .form-content{
  width: 50%;
  padding: 40px 30px;
}

.myform-area .form-area .form-content h2{
  color: #fff;
}
.myform-area .form-area .form-content p{
  color: #fff;
}
.myform-area .form-area .form-content ul{
  margin-top: 50px;
}

.myform-area .form-area .form-content ul li{
  display: inline-block;
  margin-right: 10px;
}
.myform-area .form-area .form-content a i{
    margin-right: 10px;
}

.myform-area .form-area .form-content .facebook{
  display: block;
  padding: 10px 20px;
  background: #3B579D;
  color: #fff;
  font-size: 15px;
  text-transform: capitalize;
  border-radius: 4px;
  border: 1px solid #3B579D;
  -webkit-transition: all .5s;
  -o-transition: all .5s;
  transition: all .5s;
}

.myform-area .form-area .form-content .facebook:hover,
.myform-area .form-area .form-content .facebook:focus{
    background: transparent;
}

.myform-area .form-area .form-content .twitter{
  display: block;
   padding: 10px 20px;
   /* background: #00ACED; */
   color: #fff;
   font-size: 15px;
   text-transform: capitalize;
   border-radius: 4px;
   border: 1px solid #00ACED;
   -webkit-transition: all .5s;
   -o-transition: all .5s;
   transition: all .5s;
}

.myform-area .form-area .form-content .twitter:hover,
.myform-area .form-area .form-content .twitter:focus{
    background: transparent;
}
.myform-area .form-area .form-input{
  background-color: white;
  position: relative;
  overflow: hidden;
  /* box-shadow: 0 0 40px 0 #e1e1e1; */
}
.myform-area .form-area .form-input{
    width: 50%;
    background: #fff;
    padding: 40px 30px;
}

.myform-area .form-area .form-input h2{
  margin-bottom: 20px;
    color: #07315B;
}

.myform-area .form-area .form-input input{
    position: relative;
    height: 60px;
    padding: 20px 0;
}
.myform-area .form-area .form-input textarea{
    height: 120px;
    padding: 20px 0;
}

.myform-area .form-area .form-input input,
.myform-area .form-area .form-input textarea{
    text-transform: capitalize;
    width: 100%;
    box-sizing: border-box;
    outline: none;
    border: none;
    border-bottom: 2px solid #e1e1e1;
    color: #07315B;
}
.myform-area .form-area .form-input form .form-group{
    position: relative;
}
.myform-area .form-area .form-input form .form-group label{
    position: absolute;
    /* text-transform: capitalize; */
    top: 20px;
    left: 0;
    pointer-events: none;
    font-size: 14px;
    color: #595959;
    margin-bottom: 0;
    transition: all .6s;
}
.myform-area .form-area .form-input input:focus ~ label,
.myform-area .form-area .form-input textarea:focus ~ label,
.myform-area .form-area .form-input input:valid ~ label,
.myform-area .form-area .form-input textarea:valid ~ label{
    top: -5px;
    opacity: 0;
    left: 0;
    color: rgba(103,58,183);
    font-size: 12px;
    color: #07315B;
    font-weight: bold;
}
.myform-area .form-area .form-input input:focus,
.myform-area .form-area .form-input textarea:focus,
.myform-area .form-area .form-input input:valid,
.myform-area .form-area .form-input textarea:valid{
    border-bottom: 2px solid rgba(103,58,183);
}
.myform-area .form-area .form-text{
    margin-top: 30px;
}
.myform-area .form-area .form-text span a{
    color: rgba(103,58,183);
}
.myform-area .form-area .myform-button{
    margin-top: 30px;
}
.myform-area .form-area .myform-button .myform-btn{
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
.myform-area .form-area .myform-button .myform-btn:hover{
    background: #07315B;
}
  </style>
  <body style="background-color: #0c0032;" >
  <?php
  require 'nav.php';
  ?>
  <hr style="margin-top: 20px; background-color:	#BFA181;">
  <?php
  if($login){
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success</strong> You are logged in.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
      </div>';
      
  }
  if($showError){
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Error</strong> '.$showError.'
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
      </div>';
      
  }
?>
  <section class="myform-area">
              <div class="container">
                  <div class="row justify-content-center">
                      <div class="col-lg-8">
                          <div class="form-area login-form">
                              <div class="form-content">
                                  <h2>Login</h2>
                                  <p style="margin-top: 30px;">Welcome back! Log in to your To-Do List account and reignite your productivity. Your tasks and goals are ready and waiting for you to conquer. Seamless organization and efficient planning await on the other side of login. Let's make progress together!</p>
                              </div>
                              <div class="form-input">
                                  <h2>Login Form</h2>
                                  <form action="login.php" method="post">
                                      <div class="form-group">
                                          <input type="text"  id="name" autocomplete="off" name="name" required>
                                          <label for="username">User Name</label>
                                      </div>
                                      <div class="form-group">
                                          <input type="password" id="pass" name="pass" required>
                                          <label for="pass">password</label>
                                          <a href="forgetPassword.php" style="font-size: 13px; margin-right: 50px;">Forget Password</a>
                                      </div>
                                      <div class="myform-button">
                                          <button class="myform-btn">Login</button>
                                          <small>Don't have an account? </small><a href="signup.php" style="font-size: 13px; margin-right: 50px;">Register Here</a>
                                      </div>
                                  </form>
                              </div>
                          </div>
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