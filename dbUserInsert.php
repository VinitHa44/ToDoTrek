<?php
  $insert = false;
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $name = $_POST['name'];
        $eadd = $_POST['eadd'];
        $pass = $_POST['pass'];
        $cpass = $_POST['cpass'];
        $errors = array();

        if(empty($name) OR empty($eadd) OR empty($pass) OR empty($cpass)){
          array_push($errors , "All fields are required");
        }
        if(!filter_var($eadd, FILTER_VALIDATE_EMAIL)){
          array_push($errors,"Email is invalid");
        }

        $number = preg_match('@[0-9]@', $pass);
        $uppercase = preg_match('@[A-Z]@', $pass);
        $lowercase = preg_match('@[a-z]@', $pass);
        $specialChars = preg_match('@[^\w]@', $pass);
        $specialCharsInUsername = preg_match('@[^\w]@', $name);
        $specialCharsInLname = preg_match('@[^\w]@', $fname);
        $specialCharsInFname = preg_match('@[^\w]@', $lname);
        $numberInFname = preg_match('@[0-9]@', $fname);
        $numberInLname = preg_match('@[0-9]@', $lname);


        if(strlen($pass)<8){
          array_push($errors,"Passwords must be at least 8 cha long");
        }
        if(!$uppercase){
          array_push($errors,"password should have atleast one uppercase letter");
        }
        if(!$lowercase){
          array_push($errors,"password should have atleast one lowercase letter");
        }
        if(!$specialChars){
          array_push($errors,"password should have atleast one special character");
        }
        if($pass !== $cpass){
          array_push($errors,'passwords do not match');
        }
        if($specialCharsInUsername){
          array_push($errors, "username can't contain any special characters");
        }
        if($specialCharsInFname){
          array_push($errors, "First Name can't contain any special characters");
        }
        if($specialCharsInLname){
          array_push($errors, "Last Name can't contain any special characters");
        }
        if($numberInFname){
          array_push($errors, "First name cannot contain numbers");
        }
        if($numberInLname){
          array_push($errors, "Last name cannot contain numbers");
        }


        include 'dbconnect.php';
        
        $sql = "SELECT * FROM users WHERE eadd = '$eadd'";
        $res = mysqli_query($conn,$sql);
        $rowCount = mysqli_num_rows($res);

        if($rowCount>0){
          array_push($errors,"User already exists with this Email address");
        }

        $sql3 = "SELECT * FROM users WHERE name = '$name'";
        $resu = mysqli_query($conn,$sql3);
        $rowCountInName = mysqli_num_rows($resu);

        if($rowCountInName>0){
          array_push($errors,"User already exists with this Username");
        }



        if(count($errors)>0){
            foreach($errors as $error){
              echo "<div class='alert alert-danger'>$error</div>";
            }
        }
        else{

        //  if($pass == $cpass){
            $sql = "INSERT INTO `users` (`fname`,`lname`,`eadd`,`name`,`pass`,`cpass`) VALUES ('$fname','$lname','$eadd','$name','$pass','$cpass')";
            if(mysqli_query($conn,$sql)){
              $insert = true;
              $sql1 = "CREATE TABLE `task`.`$name` (`sno` INT NOT NULL AUTO_INCREMENT , `task` VARCHAR(30) NOT NULL , `desce` VARCHAR(30) NOT NULL , PRIMARY KEY (`sno`))";
              if (mysqli_query($conn, $sql1)) {
                // echo "Table MyGuests created successfully";
                $insert = true;
              } 
              else {
                echo "Error creating table: " . mysqli_error($conn);
              }
            }
            else{
              echo "Error" . mysqli_error(($conn));
            }
         }
        //  else{
        //     echo "Passwords not match";
        //  }    
    // }
        }
?>