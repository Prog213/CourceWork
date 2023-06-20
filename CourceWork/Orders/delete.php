<?php
include '../connect.php';
if (isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
    
    // Delete the order
    $sql_order = "DELETE FROM `Orders` WHERE id=$id";
    $result_order = mysqli_query($con, $sql_order);
    if ($result_order) {
        print("<h2>Видалено замовлення з ID $id</h2>");
        echo '<meta http-equiv="refresh" content="2;url=display.php">'; // Перенаправлення через 2 секунди
    } else {
        die(mysqli_error($con));
    }
}
    
?>
