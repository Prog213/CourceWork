<?php
include '../connect.php';
if (isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
    
    // Перевірка наявності кортежів в таблиці Orders з заданим ID клієнта
    $sqlCheckOrders = "SELECT * FROM `Orders` WHERE store_id = $id";
    $resultCheckOrders = mysqli_query($con, $sqlCheckOrders);
    
    if(mysqli_num_rows($resultCheckOrders) > 0) {
        // Видалення кортежів в таблиці Orders з заданим ID клієнта
        $sqlDeleteOrders = "DELETE FROM `Orders` WHERE store_id = $id";
        $resultDeleteOrders = mysqli_query($con, $sqlDeleteOrders);
        
        if(!$resultDeleteOrders) {
            die(mysqli_error($con));
        }
        print("<h2>Видалено кортежі з таблиці Orders, пов'язані з магазином із ID $id </h2>");
    }

    // Перевірка наявності кортежів в таблиці Products з заданим ID клієнта
    $sqlCheckOrders = "SELECT * FROM `Products` WHERE store_id = $id";
    $resultCheckOrders = mysqli_query($con, $sqlCheckOrders);
    
    if(mysqli_num_rows($resultCheckOrders) > 0) {
        // Видалення кортежів в таблиці Orders з заданим ID клієнта
        $sqlDeleteOrders = "DELETE FROM `Products` WHERE store_id = $id";
        $resultDeleteOrders = mysqli_query($con, $sqlDeleteOrders);
        
        if(!$resultDeleteOrders) {
            die(mysqli_error($con));
        }
        print("<h2>Видалено кортежі з таблиці Products, пов'язані з магазином із ID $id </h2>");
    }

    // Перевірка наявності кортежів в таблиці Employees з заданим ID клієнта
    $sqlCheckOrders = "SELECT * FROM `Employees` WHERE store_id = $id";
    $resultCheckOrders = mysqli_query($con, $sqlCheckOrders);
    
    if(mysqli_num_rows($resultCheckOrders) > 0) {
        // Видалення кортежів в таблиці Orders з заданим ID клієнта
        $sqlDeleteOrders = "DELETE FROM `Employees` WHERE store_id = $id";
        $resultDeleteOrders = mysqli_query($con, $sqlDeleteOrders);
        
        if(!$resultDeleteOrders) {
            die(mysqli_error($con));
        }
        print("<h2>Видалено кортежі з таблиці Employees, пов'язані з магазином із ID $id </h2>");
    }
    
    // Delete the Store
    $sql = "DELETE FROM `Stores` WHERE id=$id";
    $result = mysqli_query($con, $sql);
    if ($result) {
        print("<h2>Видалено магазин з ID $id</h2>");
        echo '<meta http-equiv="refresh" content="2;url=display.php">'; // Перенаправлення через 2 секунди
    } else {
        die(mysqli_error($con));
    }
}
    
?>
