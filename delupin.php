<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
  header("location:login.php");
  exit;
}
$tab = $_SESSION['name'];
if(isset($_GET['delete'])){
    $sno = $_GET['delete'];
    $delete = true;
    $sql = "DELETE FROM `$tab` WHERE `sno` = $sno";
    $result = mysqli_query($conn,$sql);
  }
  if($_SERVER["REQUEST_METHOD"] == "POST"){
      if(isset($_POST['snoEdit'])){
        // echo "yes";
          $sno = $_POST["snoEdit"];
          $title = $_POST["titleEdit"];
          $description = $_POST["descriptionEdit"];
      
          $sql = "UPDATE `$tab` SET `task` = '$title' , `desce` = '$description' WHERE `sno` = $sno";
          $result = mysqli_query($conn, $sql);
          if($result){
            $update = true;
          }
          else{
              echo "WE could not update the record successfully";
          }
      }
      else{
          // echo "Success";
          $task = $_POST['task'];
          $desce = $_POST['desce'];
          $sql = "INSERT INTO `$tab` (`task`,`desce`) VALUES ('$task','$desce')";
          if(mysqli_query($conn,$sql)){
              $alertInserted = true;
          }
          else{
              echo "Error inserting data".mysqli_error($conn);
          }
      }

  }

?>
