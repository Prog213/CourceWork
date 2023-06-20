<?php
include '../connect.php';
// Отримуємо значення сортування з URL-параметра (asc або desc)
$sort = $_GET['sort'] ?? 'asc';

// Отримуємо значення колонки сортування з URL-параметра
$column = $_GET['column'] ?? 'id';

// Отримуємо напрямок сортування (asc або desc) для відображення стрілочок
$arrow = $sort === 'asc' ? '↑' : '↓';

// Отримуємо SQL-запит для сортування
$sql = "SELECT * FROM `Products` ORDER BY $column $sort";
$result = mysqli_query($con, $sql);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

    <title>Products</title>
  </head>
<body>
<div class="container mt-3">
    <h2>Продукти</h2>
</div>
<div class="container mt-3">
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col"><a class="text-light" style="text-decoration: none;" 
      href="?column=id&sort=<?php echo $sort === 'asc' && $column === 'id' ? 'desc' : 'asc'; ?>"> 
      ID <?php if ($column === 'id') echo $arrow; ?></a></th>

      <th scope="col">Store</th>

      <th scope="col"><a class="text-light" style="text-decoration: none;" 
      href="?column=Name&sort=<?php echo $sort === 'asc' && $column === 'Name' ? 'desc' : 'asc'; ?>">
      Name <?php if ($column === 'Name') echo $arrow; ?></a></th>

      <th scope="col"><a  class="text-light" style="text-decoration: none;" 
      href="?column=Description&sort=<?php echo $sort === 'asc' && $column === 'Description' ? 'desc' : 'asc'; ?>">
      Description <?php if ($column === 'Description') echo $arrow; ?></a></th>

      <th scope="col"><a class="text-light"style="text-decoration: none;" 
      href="?column=Price&sort=<?php echo $sort === 'asc' && $column === 'Price' ? 'desc' : 'asc'; ?>">
      Price <?php if ($column === 'Price') echo $arrow; ?></a></th>

      <th scope="col"><a class="text-light"style="text-decoration: none;" 
      href="?column=Quantity&sort=<?php echo $sort === 'asc' && $column === 'Quantity' ? 'desc' : 'asc'; ?>">
      Quantity <?php if ($column === 'Quantity') echo $arrow; ?></a></th>

      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>

<?php
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $ID = $row['id'];

        $store_ID=$row['store_id'];
        $sql_store = "SELECT Name FROM `Stores` WHERE ID=$store_ID"; // Отримуємо назву магазину з відповідного store_id
        $result_store = mysqli_query($con, $sql_store);
        if($result_store){
        $_row = mysqli_fetch_assoc($result_store);
        $store = $_row['Name'];
      }
        $name = $row['Name'];
        $description = $row['Description'];
        $price = $row['Price'];
        $quantity = $row['Quantity'];
        echo '<tr>
    <th scope="row">'.$ID.'</th>
    <td>'.$store.'</td>
    <td>'.$name.'</td>
    <td>'.$description.'</td>
    <td>'.$price.'</td>
    <td>'.$quantity.'</td>
    <td>
    <button class="btn btn-primary"><a href="update.php?updateid='.$ID.'" class="text-light">Update</a></button>
    <button class="btn btn-danger"><a href="delete.php?deleteid='.$ID.'" class="text-light">Delete</a></button>
    </td>
  </tr>';
    }
}
?>

  </tbody>
</table>
<div>
    <button class="btn btn-primary mr-2"><a href="../Main.html" class="text-light">Main</a></button>
    <button class="btn btn-primary mr-2"><a href="search.php" class="text-light">Search</a></button>
    <button class="btn btn-primary"><a href="add_product.php" class="text-light">Add Product</a></button>
</div>
</div>
</body>

</html>
