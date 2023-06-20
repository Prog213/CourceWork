<?php
include '../connect.php';
if (isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
    
    // Delete the Supplier
    $sql = "DELETE FROM `Suppliers` WHERE id=$id";
    $result = mysqli_query($con, $sql);
    if ($result) {
        print("<h2>Видалено постачальника з ID $id</h2>");
        echo '<meta http-equiv="refresh" content="2;url=display.php">'; // Перенаправлення через 2 секунди
    } else {
        die(mysqli_error($con));
    }
}
    
?>
