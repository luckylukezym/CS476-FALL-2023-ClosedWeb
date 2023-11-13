<?php

       session_start();
       $current_num_product = $_POST["num_product"];
       $num_product =  get_num_product();
    
       if($num_product != $current_num_product){
          return get_product_list();
       }else{
        echo "xxxnxx";
       }




     function get_num_product(){
      $connection = mysqli_connect("localhost", "xin205", "80861649aB", "xin205");
      $query = "select count(*) as num from products";
      $result = mysqli_query($connection, $query);
      $row = mysqli_fetch_assoc($result);
      return $row['num'];
     }

     function get_product_list(){
      $product_list = "";
      $connection = mysqli_connect("localhost", "xin205", "80861649aB", "xin205");
      $content_query = "select * from products";
      $content_result = mysqli_query($connection, $content_query);
      while($content_row = mysqli_fetch_assoc($content_result)){
        $product_list += "
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
      return $product_list;
     }

  ?>




