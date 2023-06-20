<?php
include '../connect.php';
// Отримуємо значення сортування з URL-параметра (asc або desc)
$sort = $_GET['sort'] ?? 'asc';

// Отримуємо значення колонки сортування з URL-параметра
$column = $_GET['column'] ?? 'id';

// Отримуємо напрямок сортування (asc або desc) для відображення стрілочок
$arrow = $sort === 'asc' ? '↑' : '↓';

// Отримуємо SQL-запит для сортування
$sql = "SELECT * FROM `Orders` ORDER BY $column $sort";
$result = mysqli_query($con, $sql);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta description="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

    <title>Orders</title>
  </head>
<body>
<div class="container mt-3">
    <h2>Замовлення</h2>
</div>
<div class="container mt-3">
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col"><a class="text-light" style="text-decoration: none;" 
      href="?column=id&sort=<?php echo $sort === 'asc' && $column === 'id' ? 'desc' : 'asc'; ?>"> 
      ID <?php if ($column === 'id') echo $arrow; ?></a></th>

      <th scope="col">Store</th>
      <th scope="col">Customer</th>

      <th scope="col"><a  class="text-light" style="text-decoration: none;" 
      href="?column=Description&sort=<?php echo $sort === 'asc' && $column === 'Description' ? 'desc' : 'asc'; ?>">
      Description <?php if ($column === 'Description') echo $arrow; ?></a></th>

      <th scope="col"><a  class="text-light" style="text-decoration: none;" 
      href="?column=Order_Date&sort=<?php echo $sort === 'asc' && $column === 'Order_Date' ? 'desc' : 'asc'; ?>">
      Date <?php if ($column === 'Order_Date') echo $arrow; ?></a></th>

      <th scope="col"><a  class="text-light" style="text-decoration: none;" 
      href="?column=Order_Total&sort=<?php echo $sort === 'asc' && $column === 'Order_Total' ? 'desc' : 'asc'; ?>">
      Total <?php if ($column === 'Order_Total') echo $arrow; ?></a></th>

      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>

<?php

if ($result){
    while($row=mysqli_fetch_assoc($result)){
    $ID=$row['id'];

    $store_ID = $row['store_id'];
    $sql_store = "SELECT Name FROM `Stores` WHERE ID=$store_ID"; // Отримуємо назву магазину з відповідного store_id
    $result_store = mysqli_query($con, $sql_store);
    if($result_store){
    $_row = mysqli_fetch_assoc($result_store);
    $store = $_row['Name'];
  }

  $customer_ID = $row['customer_id'];
    $sql_customer = "SELECT Full_Name FROM `Customers` WHERE ID=$customer_ID"; // Отримуємо покупця з відповідного customer_id
    $result_customer = mysqli_query($con, $sql_customer);
    if($result_customer){
    $__row = mysqli_fetch_assoc($result_customer);
    $customer = $__row['Full_Name'];
  }

    $description=$row['Description'];
    $Order_Total=$row['Order_Total'];
    $date=$row['Order_Date'];
    echo '<tr>
    <th scope="row">'.$ID.'</th>
    <td>'.$store.'</td>
    <td>'.$customer.'</td>
    <td>'.$description.'</td>
    <td>'.$date.'</td>
    <td>'.$Order_Total.'</td>
    <td>
    <button class="btn btn-primary"><a href="update.php?updateid='.$ID.'" class = "text-light">Update</a></button>
    <button class="btn btn-danger"><a href="delete.php?deleteid='.$ID.'" class = "text-light">Delete</a></button>
    </td>
  </tr>';
    }
}

?>

  </tbody>
</table>
<div>
    <button class="btn btn-primary mr-2"><a href="../Main.html" class="text-light">Main</a></button>
    <button class="btn btn-primary mr-2"><a href="search.php" class = "text-light">Search</a></button>
    <button class="btn btn-primary"><a href="add_order.php" class = "text-light">Add Order</a></button>
</div>
</div>
</body>

</html>