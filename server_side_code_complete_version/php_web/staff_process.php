<?php
  if(isset($_POST["submit"])){
    $product_name = $_POST["product-name"];
    $product_quantity = $_POST["product-quantity"];
    $product_price = $_POST["product-price"];
    $shipping = $_POST["shipping"];
    $product_image = $_POST["product-image"];
    $description = $_POST["product-desc"];
    $bone = $_POST["bullet-one"];
    $btwo = $_POST["bullet-two"];
    $bthree = $_POST["bullet-three"];

    // connect to database
    $connection = mysqli_connect("localhost", "xin205", "80861649aB", "xin205");
    if($connection){
      // make database query
      $query = "insert into products (name, quantity, price, shipping, image_url, description, bone, btwo, bthree) VALUES 
      ('$product_name', '$product_quantity', '$product_price', 
      '$shipping', '$product_image', '$description', '$bone', '$btwo', '$bthree');";
      $result = mysqli_query($connection, $query);
      if($result){
        header("Location: staff.php");
      }
    }else{
      header("Location: staff.php");
    }
  }
?>


<?php
  function display_products(){
    $connection = mysqli_connect("localhost", "xin205", "80861649aB", "xin205");
    if($connection){
      // make database query
      $query = "select name, price, quantity from products;";
      $result = mysqli_query($connection, $query);
      if($result){
        while($row = mysqli_fetch_assoc($result)){
          echo "
          <tr>
                    <td>{$row['name']}</td>
                    <td>{$row['price']}</td>
                    <td>{$row['quantity']}</td>
          </tr>
          ";
        }
      }
    }else{
      die("query failed!!!");
    }
  }
?>

