<?php

    include_once "../config/dbconnect.php";
    
    $o_id=$_POST['record'];
    $query="DELETE FROM orders where order_id='$o_id'";


    
    $data=mysqli_query($conn,$query);

    
    if($data){
        echo"Order Deleted";
    }
    else{
        echo"Not able to delete";
    }
    
?>