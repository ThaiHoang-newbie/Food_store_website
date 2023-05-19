<?php
if(isset($_POST['record'])) {
    $order_id = $_POST['record'];

    // Perform the necessary actions to update the order status to "done" with the given ID
    // Assuming you have a database connection established
    $conn = new mysqli("localhost", "root", "", "food_store");

    // Check if the connection is successful
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the SQL statement to update the order status
    $sql = "UPDATE orders SET pstatus = 'done' WHERE order_id = $order_id";

    // Execute the SQL statement
    $conn->query($sql);
        

    // Close the database connection
    $conn->close();
}
?>
