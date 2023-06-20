<?php
include '../connect.php';
if (isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
    
    $sql_customer = "DELETE FROM `Products` WHERE id=$id";
    $result_customer = mysqli_query($con, $sql_customer);
    if ($result_customer) {
        print("<h2>Видалено товар з ID $id</h2>");
        echo '<meta http-equiv="refresh" content="2;url=display.php">'; // Перенаправлення через 2 секунди
    } else {
        die(mysqli_error($con));
    }
}
    
?>
