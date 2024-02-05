<?php
  $alertInserted = false;
  $update = false;
  $delete = false;
    include 'dbconnect.php';
    include 'delupin.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <title>TodoTrek</title>
  </head>
  <style>
    .myform-button{
      background: #07315B;
    background: rgba(103,58,183);
    border: none;
    border-radius: 30px;
    color: #fff;
    cursor: pointer;
    -webkit-transition: all .5s;
    -o-transition: all .5s;
    transition: all .5s;
    }
  </style>
  <body style="background: #0c0032; color:#ffffff;">
  <?php
include 'nav.php';
?>
<hr style="margin-top: 20px; background-color:	#BFA181">
  <!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true" style="color: #000000;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Update this Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">x</span>
        </button>
      </div>
      <form action="/phpt/ToDoList/view.php" method="POST">
        <div class="modal-body">
            <input type="hidden" name="snoEdit" id="snoEdit">
            <div class="form-group">
              <label for="task">Title</label>
              <input type="text" class="form-control" id="titleEdit" name="titleEdit" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
              <label for="desce">Description</label>
              <textarea class="form-control" id="descriptionEdit" name="descriptionEdit" rows="3"></textarea>
            </div>
        </div>
        <div class="modal-footer d-block mr-auto">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php
include 'viewAlerts.php';
    ?>
    
    <div class="container pt-4">
    <h2 style="color: #ffffff; font-family:colonna MT ;">Greetings, <?php echo $tab; ?> We extend our warm welcome to you.</h2>
    <br>
        <div id="carouselExampleFade" touch="true" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS5It37-EJcGrgirfROs81vNMHjgwAEz-2LFw&usqp=CAU" width="70px" height="300px" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="love-g17c0b3432_1280.jpg" width="50px" height="300px" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="a-thing-to-do-g7805d6026_1280.jpg" width="70px" height="300px" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        </div>
    </div>



    <div class="container my-4" style="color: #ffffff;">
    <h2>Add Item to To-Do List</h2>
        <form action="/phpt/ToDoList/view.php" method="post">
            <div class="form-group">
                <label for="task">Title</label>
                <input type="text" class="form-control" id="task" style="background-image: linear-gradient(to right top, #ffffff, #dedede, #bdbdbd, #9d9d9d, #7f7f7f);" name="task" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
            <label for="desc">Description</label>
            <textarea class="form-control" style="background-image: linear-gradient(to right top, #ffffff, #dedede, #bdbdbd, #9d9d9d, #7f7f7f);" id="desce" name="desce" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary myform-button">Add Item</button>
        </form>
    </div>
      <div class="container my-4" style="color: #ffffff;">
          <div class="container mr-5">            
            <hr style='margin-top: 20px; background-color:	#BFA181;' >
            <table>
            <dl>
          <?php
          $servername = "localhost";
          $username = "root";
          $password = "";
          $database = "task";

          $conn = mysqli_connect($servername,$username,$password,$database);
          if(!$conn){
              die("Connection failed: ".mysqli_connect_error());
          }
          else{
                $sql = "SELECT * FROM `$tab`";
                $result = mysqli_query($conn,$sql);
                $sno = 0;
                if(mysqli_num_rows($result)>=0){
                while($row = mysqli_fetch_assoc($result)){
                  $sno = $sno +1;
                echo "<tr><div class='row'>
                  <div class='col'>
                      <dt><tr><b>". $row['task'] ."</b></tr></dt>
                  </div>
                  </div>
                <div class='row'>
                  <div class='col'>
                    <dd><tr><p style='margin-left:50px;'>-". $row['desce'] ."<p></tr></dd>
                    <tr><dd style='margin-left:50px;'><button class='edit btn btn-primary myform-button' id=".$row['sno'].">Edit</button><button class='delete btn btn-primary myform-button' style='margin-left:10px;' id=d".$row['sno'].">Delete</button></dd></tr>
                  </div>
                </div><hr style='margin-top: 20px; background-color:	#BFA181'></tr>
                ";
                }
            }
            else{
              echo "error".mysqli_error($conn);
            }
          }
           ?>
        </table>
            </dl>
        </div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script>
    </script>
    <script>
      edits = document.getElementsByClassName('edit');
      Array.from(edits).forEach((element)=>{
        element.addEventListener("click", (e) => {
          console.log("edit ");
          tr = e.target.parentNode.parentNode;
          title = tr.getElementsByTagName("tr")[0].innerText;
          description = tr.getElementsByTagName("tr")[1].innerText;
          console.log(title, description);
          titleEdit.value = title;
          descriptionEdit.value = description;
          snoEdit.value = e.target.id;
          console.log(e.target.id)
          $('#editModal').modal('toggle');
        })
    })

    deletes = document.getElementsByClassName('delete');
      Array.from(deletes).forEach((element)=>{
        element.addEventListener("click", (e) => {
          console.log("edit ");
          sno = e.target.id.substr(1);
          
          if(confirm("Are you sure you want to delete this Item!")){
            console.log("yes");
            window.location = `/phpt/ToDoList/view.php?delete=${sno}`;
          }
          else{
            console.log("no");
          }
        })
    })
    </script>
    <?php
     include 'footer.php';
    ?>
    <?php
      mysqli_close($conn);
    ?>
</body>
</html>




