<?php
  session_start();
  include "function.php";
?>
<! DOCTYPE html>
<html>

 <head>
 <meta charset="UTF-8">
 <META name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Page</title>
   <link rel="stylesheet" href="css/index-style.css">
   <link rel="stylesheet" href="css/customer_page_style.css">
  <nav>
            <ul class="nav">
                <li><div class="navlogo"><a href="index.php">CLOTHES</a></div></li>
                <li><div class="navlogo">|</div></li>
                <li><a href='logout_handle.php' class='Button'>Logout</a></li>
                <li class="navuser"><a href="cart.php">Cart</a></li>
                <li class="navuser">|</li>
                <li class="navuser">current login as <?php echo $_SESSION['username']?></li>
            </ul>
        </nav>


 </head>

<body>
  <div class="container">
 <h2>Personal Information and Purchase History</h2>

<h3>Personal Information</h3>
<?php $info = get_customer_info($_SESSION['id'])?>
<p><strong>Name: </strong><?php echo $info['name'];?></p>

<p><strong>Email: </strong><?php echo $info['email'];?></p>

<p><strong>Cellphone number: </strong>
<?php
   if($info['cell'] == 'none'){
    echo "
    <form action='customer_info_process.php' method='POST'>
    <input type='text' name='cell' placeholder='enter cell number'><button name='cell_submit' type='submit'>enter</button>
    </form>
    ";
   }else{
    echo $info['cell'];
   }
?>
</p>
<p><strong>Address: </strong>
<?php
  if($info['address'] == 'none'){
    echo "
    <form action='customer_info_process.php' method='POST'>
    <input type='text' name='address' placeholder='enter your address'><button name='address_submit' type='submit'>enter</button>
    </form>
    ";
  }else{
    echo $info['address'];
   }
?>
</p>
</div>


<div class='content'></div>

</body>


<script>
  let content = document.querySelector(".content");
  let request = new XMLHttpRequest();
  request.responseType = "text";
  request.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
      if(this.responseText){
        content.innerHTML = this.responseText;
      }
    }
  };
     // prefetch products
    request.open("POST", "customer_process.php", true);
    request.setRequestHeader("content-type","application/x-www-form-urlencoded");
    request.send();
 </script>

</html>

