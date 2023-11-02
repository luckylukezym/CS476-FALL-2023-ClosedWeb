<?php
  session_start();
  $username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Check to pay</title>
    <meta charset = "utf-8">
    <link rel="stylesheet" href="css/index-style.css">
    <link rel="stylesheet" href="css/pay-style.css">

    <link  rel="stylesheet" href="https://fonts.googleapis.com/css?family=Stylish">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<header>
    <nav>
        <ul class="nav">
            <li><div class="navlogo"><a href="index.php">CLOTHES</a></div></li>
            <li><div class="navlogo">|</div></li>
            <li><a href="" class="Button">About Me</a></li>
            <li class="navuser"><?php
                   if(isset($_SESSION["username"])){
                      echo "current login as " . $_SESSION["username"];
                   }else{
                    echo "not logged in";
                   }
              ?></li>
        </ul>
    </nav>
</header>

<h1>Your Cart</h1>

<div class="main">
    <form id="search">
        <i class="fa fa-search"></i>
        <input type="search" id="searchbar" placeholder="Search...">
        <br><br>
    </form>

<div class="left"></div>
<main class="main-center">
        <form id="checklist" method="post">
        
            <br><br>

        </form>
    </main>

    <div class="checkpay">
    <form id="payorder">
        <h2>Pay Order</h2>
            
            <label for="cards">Choose a card:</label>
            <select name="cards" id="cards">
                <option value="Credit">Credit</option>
                <option value="Debit">Debit</option>
                <option value="Charge">Charge</option>
                <option value="Prepaid">Prepaid</option>
            </select>
            <br>
            <input type="text" placeholder="0000-0000-0000-0000"><br><br>

            <label for="cname">Name on Card:</label><br>
            <input type="text" placeholder="Stephen Anderson"><br><br>

            <label for="expDate">Exp date:</label><br>
            <input type="text" placeholder="month/year"><br><br>

            <label for="CVV">CVV:</label><br>
            <input type="text" placeholder="000"><br><br><br>
            </div>

            <input type="submit" value="Checkout" class="add-button">
    </form>
    </div>
    <br><br>
    <div class="right"></div>
</div>
<script>
    let content = document.querySelector("#checklist");
    let request = new XMLHttpRequest();
    request.responseType = "text";
    request.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
      if(this.responseText){
        content.innerHTML = this.responseText;
      }
    }
  };
     
    request.open("POST", "cart_process.php", true);
    request.setRequestHeader("content-type","application/x-www-form-urlencoded");
    request.send();

</script>
</body>
</html>

