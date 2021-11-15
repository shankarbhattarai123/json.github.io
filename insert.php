<?php
include "connect.php";
if (isset($_POST['submit'])){
    if(!empty($_POST['place_name']) && !empty($_POST['address']) && !empty($_POST['description'])){
      
      $name=$_POST['place_name'];
      $address=$_POST['address'];
      $des=$_POST['description'];
      $sql = "INSERT INTO `addplace1` (`Place Name`, `Address`, `Description`) VALUES ('$name', '$address', '$des')";
  $result = mysqli_query($conn,$sql);
  if ($result) {
      echo "
      <div class='alert alert-success' role='alert'>
  Record has been successfully inserted!
</div>

      ";
    } else {
      echo "Error creating database ". mysqli_error($conn);
    }
  
    }else{
      echo "all field required";
    }}
?>