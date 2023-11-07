<?php 
  session_start();
  include 'staff_process.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/index-style.css" />
    <link rel="stylesheet" type="text/css" href="css/staff_page_style1.css" />
    <nav>
            <ul class="nav">
                <li><div class="navlogo"><a href="index.php">CLOTHES</a></div></li>
                <li><div class="navlogo">|</div></li>
                <?php
            if(!isset($_SESSION['username'])){
              echo "
              <li><a href='signup.html' class='Button'>Sign up</a></li>
              <li><a href='login.html' class='Button'>Login</a></li>
              ";
            }else{
              echo "<li><a href='logout_handle.php' class='Button'>Logout</a></li>";
            }
          ?>
                <li class="navuser"><?php
                   if(isset($_SESSION["username"])){
                      echo "current login as " . $_SESSION["username"];
                   }else{
                    echo "not logged in";
                   }
              ?></li></li>
            </ul>
        </nav>
    
    <title>Staff Page</title>

</head>
<body>
    <div class="container">
        <h2>Add new product</h2>
        <form action="staff_process.php" method="POST">
            <div class="form-group">
                <label for="product-name">product name:</label>
                <input type="text" id="product-name" name="product-name" required placeholder="enter product name" required>
            </div>
            
            <div class="form-group">
                <label for="product-quantity">product quantity:</label>
                <input type="number" id="product-quantity" name="product-quantity" required placeholder="enter product quantity">
            </div>

            <div class="form-group">
                <label for="product-price">product price:</label>
                <input type="number" id="product-price" name="product-price" required placeholder="enter product price">
            </div>

            <div class="form-group">
                <label for="shipping">free shipping(1 or 0):</label>
                <input type="number" id="shipping" name="shipping" required placeholder="enter 1 for free, 0 for not free">
            </div>

            <div class="form-group">
                <label for="product-image">product image(URL):</label>
                <input type="text" id="product-image" name="product-image" required placeholder="enter image URL">
            </div>

            <div class="form-group">
                <label for="product-desc">product description:</label>
                <input type="text" id="product-desc" name="product-desc" required placeholder="enter production description">
            </div>

            <div class="form-group">
                <label for="bullet-one">bullet points one:</label>
                <input type="text" id="bullet-one" name="bullet-one" required placeholder="enter bullet one">
            </div>

            <div class="form-group">
                <label for="bullet-two">bullet points two:</label>
                <input type="text" id="bullet-two" name="bullet-two" required placeholder="enter bullet two">
            </div>

            <div class="form-group">
                <label for="bullet-three">bullet points three:</label>
                <input type="text" id="bullet-three" name="bullet-three" required placeholder="enter bullet three">
            </div>

            <input type="submit" value="submit" name="submit">
        </form>
    </div>
    <h3>Product List</h3>
    <table>
        <thead>
            <tr>
                <th>Product name</th>
                <th>Product price($)</th>
                <th>Product quantity</th>
            </tr>
        </thead>
        <tbody>
            <!-- 目前这只是一个例子，实际的数据需要连接到后端数据库获取  -->
            <?php
                display_products();
            ?>
        </tbody>
    </table>
</body>
</html>
