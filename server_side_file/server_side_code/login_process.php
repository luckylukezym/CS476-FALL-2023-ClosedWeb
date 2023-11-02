<?php
  if(isset($_POST["submit"])){
    $username = $_POST["username"];
    $password = $_POST["password"];

    // connect to database
    $connection = mysqli_connect("localhost", "xin205", "80861649aB", "xin205");
    if($connection){
      // make database query
      $query = "select * from users where username = '$username'";
      $result = mysqli_query($connection, $query);
      if(mysqli_num_rows($result)){
        $row = mysqli_fetch_assoc($result);
        if($row["password"] == $password){
          session_start();
          $_SESSION["username"] = $username;
          header("Location: index.php");
        }else{
          header("Location: login.html");
        }
      }else{
        header("Location: login.html");
      }
    }else{
      die("connection failed");
    }
  }
?>



