<?php
  session_start();
  $username = $_SESSION['username'];
  $user_id = $_SESSION['id'];
  $connection = mysqli_connect("localhost", "xin205", "80861649aB", "xin205");

  if($connection){
    $query = "
              select name, sum(price) as total, count(*) as quantity, image_url from 
              cart_items left join products 
              on product_id = products.id
              where user_id = {$user_id}
              group by product_id, name, image_url;";
    $result = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($result)){
      echo "
      <article>
      <label for='item1'>
          <img
              src='{$row['image_url']}'
              alt='cloth1'
              class='images'
          />
          <h3>{$row['name']}</h3>
          <p>{$row['total']}$</p>
          <p>qty: {$row['quantity']}</p>
      </label>
      </article>
      ";
    }
  }
?>



