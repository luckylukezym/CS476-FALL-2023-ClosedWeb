<?php
    $connection = mysqli_connect("localhost", "xin205", "80861649aB", "xin205");
    $product_name = $_GET['name'];

    $query = "
               select id from products where name = '{$product_name}';
             ";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);
    $product_id = $row['id'];


    $num_comment = $_POST['num_comment'];
    $query = "select count(*) as num from comments where product_id = {$product_id}";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);
    $db_num_comment = $row['num'];

    if($num_comment != $db_num_comment){
     $query = "select * from comments left join users 
      on user_id = users.id
      where product_id = {$product_id}
      order by created_at desc;
     ";
     $result = mysqli_query($connection, $query);
     while($row = mysqli_fetch_assoc($result)){
      echo "
             <div class='comment'>
                <strong>[{$row['username']} - {$row['created_at']}]:</strong>
                <p>{$row['content']}</p>
             </div>
      ";
     }
    }else{
      echo "xxxnxx";
    }
?>




