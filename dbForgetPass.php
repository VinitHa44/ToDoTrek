<?php
$setPass = false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST['fpass'])){
        $name = $_POST["name"];
        $pass = $_POST["pass"];
        $cpass = $_POST["cpass"];

        $err = array();
        $number = preg_match('@[0-9]@', $pass);
          $uppercase = preg_match('@[A-Z]@', $pass);
          $lowercase = preg_match('@[a-z]@', $pass);
          $specialChars = preg_match('@[^\w]@', $pass);

        if(empty($name) OR empty($pass) OR empty($cpass)){
            array_push($err , "All fields are required");
        }
        if(!empty($pass)){
            if(strlen($pass)<8){
                array_push($err,"Passwords must be at least 8 cha long");
              }
              if(!$uppercase){
                array_push($err,"password should have atleast one uppercase letter");
              }
              if(!$lowercase){
                array_push($err,"password should have atleast one lowercase letter");
              }
              if(!$specialChars){
                array_push($err,"password should have atleast one special character");
              }
              if($pass !== $cpass){
                array_push($err,'passwords do not match');
              }
        }
        include 'dbconnect.php';

        $sql1 = "SELECT * FROM `users` WHERE `name` = '$name'";
        $re = mysqli_query($conn,$sql1);
        $rowCount = mysqli_num_rows($re);

        if($rowCount==0){
        array_push($err,"Enter Valid User Name.");
        }
        if(count($err)>0){
            foreach($err as $error){
              echo "<div class='alert alert-danger'>$error</div>";
            }
        }
        else{
            $sql = "UPDATE `users` SET `pass` = '$pass', `cpass` = '$cpass' WHERE `users`.`name` = '$name'";
            $result = mysqli_query($conn,$sql);
            if($result){
                $setPass = true;
            }
            else{
                echo "error".mysqli_error($conn);
            }
        }
    }
}

?>