<?php
  session_start();
  $user_id = isset($_SESSION['id']) ? $_SESSION['id'] : 0;

  function display_comment_form($product_name, $user_id){
    $connection = mysqli_connect("localhost", "xin205", "80861649aB", "xin205");
    if($connection){
      $query = "
                 select id from products where name = '{$product_name}' 
      ";
      $result = mysqli_query($connection, $query);
      $row = mysqli_fetch_assoc($result);
      $product_id = $row['id'];

      $query = "
                 select count(*) as num from orders inner join purchased_items
                 on orders.id = order_id
                 where product_id = {$product_id} and user_id = $user_id
               ";
      $result = mysqli_query($connection, $query);
      $row = mysqli_fetch_assoc($result);
      if($row['num'] != 0){
        echo "
        <h4>Leave your comment:</h4>
        <form action='comment_button_process.php?name=$product_name' method='POST'>
          <textarea
            id='userComment'
            name='user_comment'
            rows='4'
            required
            placeholder='Enter your comment here...'
          ></textarea>
          <br/>
          <input type='submit' value='Submit Comment' />
        </form>
        ";
      }
    }
  }
?>