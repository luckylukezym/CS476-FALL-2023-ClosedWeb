<?php
   session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Shopping Website Main Page</title>

    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="css/index-style.css" />
  </head>

  <body>
    <header>
      <nav>
        <ul class="nav">
          <li>
            <div class="navlogo"><a href="index.php">CLOTHES</a></div>
          </li>
          <li><div class="navlogo">|</div></li>
          <li><a href="" class="Button">About Me</a></li>
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
          <li class="navuser"><a href="<?php
                   if(isset($_SESSION["username"])){
                      echo "cart.php";
                   }else{
                    echo "login.html";
                   }
              ?>">Cart</a></li>
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

    <div class="clothesPic">
      <p class="clothesPic">
        <img class="indexPic" src="file/index.jpg" alt="value" />
      </p>
    </div>

    <div class="serv">
      <ul class="product-container"> </ul>
    </div>
    <footer>
      &#169;2023/11/13 CS476. CS476 Clothing Shopping Website Group All rights
      reserved.
    </footer>

    <script>
  let content = document.querySelector(".product-container");
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
    request.open("POST", "index_process.php", true);
    request.setRequestHeader("content-type","application/x-www-form-urlencoded");
    request.send(`num_product=${content.childElementCount}`);

  setInterval(() => {
    request.open("POST", "index_process.php", true);
    request.setRequestHeader("content-type","application/x-www-form-urlencoded");
    request.send(`num_product=${content.childElementCount}`);
  }, 5000);
 </script>
  </body>
</html>
