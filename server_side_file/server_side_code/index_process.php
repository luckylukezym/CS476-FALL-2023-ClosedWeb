<?php

     session_start();
     $current_num_product = $_POST["num_product"];

     $connection = mysqli_connect("localhost", "xin205", "80861649aB", "xin205");
     if($connection){
      // query database 
      $query = "select count(*) as num from products";
      $result = mysqli_query($connection, $query);
      if($result){
       $row = mysqli_fetch_assoc($result);

       if($row['num'] != $current_num_product){
        $content_query = "select * from products";
        $content_result = mysqli_query($connection, $content_query);
        while($content_row = mysqli_fetch_assoc($content_result)){
          echo "
          <li>
          <div class='list'>
            <p class='clothesPic'>
              <img
                class='imageFloat'
                src='{$content_row['image_url']}'
                height='200'
                width='150'
                alt='value'
              />
            </p>
            <p class='clothesName'>{$content_row['name']}</p>
            <p class='clothesDetail'><a href='product.php?name={$content_row['name']}'>detail</a></p>
          </div>
        </li>
               ";
        }
       }else{
        echo "xxxnxx";
       }
      }else{
       die("signup failed");
      }
     }else{
       die("connection failed.");
     }

  ?>




