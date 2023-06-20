<?php
include '../connect.php';
if (isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
    
    $sql_employee = "DELETE FROM `Employees` WHERE id=$id";
    $result_employee = mysqli_query($con, $sql_employee);
    if ($result_employee) {
        print("<h2>Видалено працівника з ID $id</h2>");
        echo '<meta http-equiv="refresh" content="2;url=display.php">'; // Перенаправлення через 2 секунди
    } else {
        die(mysqli_error($con));
    }
}
    
?>
