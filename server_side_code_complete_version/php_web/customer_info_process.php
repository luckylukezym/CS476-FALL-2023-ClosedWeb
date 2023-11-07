<?php
  session_start();
  $user_id = $_SESSION['id'];

   
  if(isset($_POST['cell_submit'])){
    $connection = mysqli_connect("localhost", "xin205", "80861649aB", "xin205");
    $query = "
               insert into cells (user_id, cell)
               values ({$user_id}, '{$_POST['cell']}');
             ";
    $result = mysqli_query($connection, $query);
    header("Location: customer.php");
  }


  if(isset($_POST['address_submit'])){
    $connection = mysqli_connect("localhost", "xin205", "80861649aB", "xin205");
    $query = "
               insert into addresses (user_id, address)
               values ({$user_id}, '{$_POST['address']}');
             ";
    $result = mysqli_query($connection, $query);
    header("Location: customer.php");
  }
?>