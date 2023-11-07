<?php
  include 'product_process.php';
  include 'comment_form_display_process.php';
  $info = fetch_product_info($_GET['name']);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>product page</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="css/index-style.css" />
    <link rel="stylesheet" href="css/product-style.css" />

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
  </head>

  <body>
    <header>
    <nav>
        <ul class="nav">
          <li>
            <div class="navlogo"><a href="index.php">CLOTHES</a></div>
          </li>
          <li><div class="navlogo">|</div></li>
          <li><a href="<?php echo isset($_SESSION['username']) ? 'customer.php' : 'login.html'; ?>" class="Button">About Me</a></li>
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
          <li>
            <?php
              if(isset($_SESSION["username"])){
                if($_SESSION['username'] == "admin"){
                  echo "<a href='staff.php' class='Button'>staff</a>";
                }
              }
            ?>
          </li>
          <li>
            <a href="database_display.php" class="Button">database-display</a>
          </li>
          <li class="navuser"><a href="<?php echo isset($_SESSION['username']) ? 'cart.php' : 'login.html'; ?>">Cart</a></li>
          <li class="navuser">|</li>
          <li class="navuser">  
              <?php
                   if(isset($_SESSION["username"])){
                      echo "current login as " . $_SESSION["username"];
                   }else{
                    echo "not logged in";
                   }
              ?></li>
        </ul>
      </nav>
    </header>

    <div class="main">
      <div class="left"></div>
      <main class="main-center">
        <h2 class="product-title"><?php echo $info['name']?></h2>
        <img src="<?php echo $info['image_url']?>" alt="clothes image" class="image" />

        <div class="text">
          <p class="price"><strong><?php echo $info['price']?>$</strong></p>
          <p class="shipping">Free shipping</p>
          <p><?php echo $info['description']?></p>

          <h3 class="list-header">Product Details</h3>
          <ul class="detail-list">
            <li>
            <?php echo $info['bone']?>
            </li>
            <li>
            <?php echo $info['btwo']?>
            </li>
            <li>
            <?php echo $info['bthree']?>
            </li>
          </ul>
        </div>
      </main>

      <button class="add-button">
        <i class="fa fa-shopping-cart"></i>
        add to cart
      </button>

      <?php
         if(isset($_SESSION['id'])){
          display_comment_form($_GET['name'], $_SESSION['id']);
         }
       ?>

      <h4>Comments:</h4>
      <div class="comments-section">
      </div>

      <div class="right"></div>
    </div>
    <script src='product.js'></script>

    <script>
  let content = document.querySelector(".comments-section");
  let request = new XMLHttpRequest();
  request.responseType = "text";
  request.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
      if(!String(this.responseText).includes("xxxnxx")){
        content.innerHTML = this.responseText;
      }
    }
  };
     // prefetch products
    request.open("POST", "comment_display_process.php?name=<?php echo $_GET['name']?>", true);
    request.setRequestHeader("content-type","application/x-www-form-urlencoded");
    request.send(`num_comment=${content.childElementCount}`);

  setInterval(() => {
    request.open("POST", "comment_display_process.php?name=<?php echo $_GET['name']?>", true);
    request.setRequestHeader("content-type","application/x-www-form-urlencoded");
    request.send(`num_comment=${content.childElementCount}`);
  }, 5000);
 </script>
  </body>
</html>





