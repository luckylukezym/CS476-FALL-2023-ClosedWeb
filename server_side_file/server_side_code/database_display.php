<?php
   // connect to database
   $connection = mysqli_connect("localhost", "xin205", "80861649aB", "xin205");
   if($connection){
     // make database query
     $query = "select * from users;";
     $result = mysqli_query($connection, $query);
     if($result){
       while($row = mysqli_fetch_assoc($result)){
        echo "username: " . $row["username"] . "<br>";
        echo "password: " . $row["password"] . "<br>";
        echo "email: " . $row["email"] . "<br><br><br><br>";
       }
     }
   }else{
     die("connection failed");
   }
?>