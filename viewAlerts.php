<?php
if($alertInserted){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Congratulations, </strong>your item has been successfully inserted.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}
      if($delete){
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Success</strong> Your item has been deleted.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>";
      }
      if($update){
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong> Success</strong> Your Item has been updated.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>";
      }

?>