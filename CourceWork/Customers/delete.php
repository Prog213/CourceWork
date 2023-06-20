<?php
include '../connect.php';
if (isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
    
    // Перевірка наявності кортежів в таблиці Orders з заданим ID клієнта
    $sqlCheckOrders = "SELECT * FROM `Orders` WHERE customer_id = $id";
    $resultCheckOrders = mysqli_query($con, $sqlCheckOrders);
    
    if(mysqli_num_rows($resultCheckOrders) > 0) {
        // Видалення кортежів в таблиці Orders з заданим ID клієнта
        $sqlDeleteOrders = "DELETE FROM `Orders` WHERE customer_id = $id";
        $resultDeleteOrders = mysqli_query($con, $sqlDeleteOrders);
        
        if(!$resultDeleteOrders) {
            die(mysqli_error($con));
        }
        print("<h2>Видалено кортежі з таблиці Orders, пов'язані з клієнтом ID $id </h2>");
    }
    
    // Delete the customer
    $sql = "DELETE FROM `Customers` WHERE id=$id";
    $result = mysqli_query($con, $sql);
    if ($result) {
        print("<h2>Видалено клієнта з ID $id</h2>");
        echo '<meta http-equiv="refresh" content="2;url=display.php">'; // Перенаправлення через 2 секунди
    } else {
        die(mysqli_error($con));
    }
}
    
?>
