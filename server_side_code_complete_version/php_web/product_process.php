<?php
  function fetch_product_info($name){
  $product_info = ['name' => '', 'quantity' => '', 'price' => '', 'shipping' => '',
                   'image_url' => '', 'description' => '', 'bone' => '', 'btwo' => '', 'bthree' => ''];
  $connection = mysqli_connect("localhost", "xin205", "80861649aB", "xin205");
  if($connection){
    // make database query
    $query = "select * from products where name = '{$name}'";
    $result = mysqli_query($connection, $query);
    if(mysqli_num_rows($result)){
      $row = mysqli_fetch_assoc($result);
      $product_info['name'] = $row['name'];
      $product_info['quantity'] = $row['quantity'];
      $product_info['price'] = $row['price'];
      $product_info['shipping'] = $row['shipping'];
      $product_info['image_url'] = $row['image_url'];
      $product_info['description'] = $row['description'];
      $product_info['bone'] = $row['bone'];
      $product_info['btwo'] = $row['btwo'];
      $product_info['bthree'] = $row['bthree'];
    }else{
      die("unable to fetch product");
    }
  }else{
    die("connection failed");
  }
  return $product_info;
  }
?>


