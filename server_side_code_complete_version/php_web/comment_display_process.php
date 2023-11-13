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
      echo  create_comment($row['username'], $row['created_at'], $row['content']);
     }
    }else{
      echo "xxxnxx";
    }

    
    function create_comment($username, $created_at, $content){
      return "
             <div class='comment'>
                <strong>[{$username} - {$created_at}]:</strong>
                <p>{$content}</p>
             </div>
      ";
    }
?>




