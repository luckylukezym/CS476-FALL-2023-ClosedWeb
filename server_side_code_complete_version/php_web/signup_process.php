<?php
  if(isset($_POST["submit"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    // connect to database
    $connection = mysqli_connect("localhost", "xin205", "80861649aB", "xin205");
    if($connection){
      // make database query
      $query = "insert into users (username, password, email) VALUES ('$username', '$password', '$email');";
      $result = mysqli_query($connection, $query);
      if($result){
        session_start();
        $_SESSION["username"] = $username;
        $query = "select id from users where username = '{$username}'";
        $result = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($result);
        $_SESSION['id'] = $row['id'];

        header("Location: index.php");
      }
    }else{
      die("connection failed");
    }
  }
?>

