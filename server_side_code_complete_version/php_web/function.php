<?php
   function get_customer_info($user_id){
      $info = ["name" => '', "email" => '', "cell" => '', "address" => ''];
      $connection = mysqli_connect("localhost", "xin205", "80861649aB", "xin205");
      if($connection){
        $query = "select * from users where id = {$user_id};";
        $result = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($result);
        $info['name'] = $row['username'];
        $info['email'] = $row['email'];

        $query = "select * from cells where user_id = {$user_id}";
        $result = mysqli_query($connection, $query);
        if(mysqli_num_rows($result) != 0){
          $row = mysqli_fetch_assoc($result);
          $info['cell'] = $row['cell'];
        }else{
          $info['cell'] = "none";
        }

        $query = "select * from addresses where user_id = {$user_id}";
        $result = mysqli_query($connection, $query);
        if(mysqli_num_rows($result) != 0){
          $row = mysqli_fetch_assoc($result);
          $info['address'] = $row['address'];
        }else{
          $info['address'] = "none";
        }

      }
      return $info;
   }
?>