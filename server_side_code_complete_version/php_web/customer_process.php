<?php
  session_start();
  $user_id = $_SESSION['id'];

  $connection = mysqli_connect("localhost", "xin205", "80861649aB", "xin205");
  if($connection){
    $query = "
               select * from orders where user_id = {$user_id}
               order by created_at desc;
             ";
    $result = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($result)){
       echo "
       <div class='section'>
       <h3>order info: </h3>
       <table>
           <thead>
               <tr>
                   <th>order number</th>
                   <th>order date</th>
                   <th>payment method</th>
                   <th>card number</th>
               </tr>
           </thead>
           <tbody>
               <tr>
                   <td>{$row['id']}</td>
                   <td>{$row['created_at']}</td>
                   <td>{$row['payment_method']}</td>
                   <td>{$row['card_number']}</td>
               </tr>
           </tbody>
       </table>
  
    <h3>order item:</h3>
    <table>
      <thead>
        <tr>
          <th>Item name</th>
          <th>Item quantity</th>
          <th>total price($)</th>
        </tr>
      </thead>
      <tbody>
            ";
      $subquery = "
      select name, sum(price) as total, count(*) as quantity from 
      purchased_items left join products 
      on product_id = products.id
      where order_id = {$row['id']}
      group by product_id, name;
      ";
      $subresult = mysqli_query($connection, $subquery);
      while($subrow = mysqli_fetch_assoc($subresult)){
        echo "
        <tr>
        <td>{$subrow['name']}</td>
        <td>{$subrow['quantity']}</td>
        <td>{$subrow['total']}</td>
        </tr>
        ";
      }
      echo "
      </tbody>
      </table>
      </div>
        ";
    }
  }
?>





