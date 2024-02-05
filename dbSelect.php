<?php
$login = false;
$showError = false;
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  include 'dbconnect.php';
  $name = $_POST["name"];
  $pass = $_POST["pass"];

  $sql = "SELECT * FROM `users` where `name` = '$name' AND `pass` ='$pass'";
  $result = mysqli_query($conn,$sql);
  $num = mysqli_num_rows($result);
  if($num == 1){
    $login = true;
    session_start();
    $_SESSION['loggedin'] = true;
    $_SESSION['name'] = $name;
    header("Location: view.php");
  } 
  else{
    $showError = "Invalid Credentials";
  }
}
?>
