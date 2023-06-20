<?php
include '../connect.php';
// Отримуємо значення сортування з URL-параметра (asc або desc)
$sort = $_GET['sort'] ?? 'asc';

// Отримуємо значення колонки сортування з URL-параметра
$column = $_GET['column'] ?? 'id';

// Отримуємо напрямок сортування (asc або desc) для відображення стрілочок
$arrow = $sort === 'asc' ? '↑' : '↓';

// Отримуємо SQL-запит для сортування
$sql = "SELECT * FROM `Suppliers` ORDER BY $column $sort";
$result = mysqli_query($con, $sql);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

    <title>Suppliers</title>
  </head>
<body>
<div class="container mt-3">
    <h2>Постачальники</h2>
</div>
<div class="container mt-3">
    <table class="table">
  <thead class="thead-dark">
    <tr>
    <th scope="col"><a class="text-light" style="text-decoration: none;" 
      href="?column=id&sort=<?php echo $sort === 'asc' && $column === 'id' ? 'desc' : 'asc'; ?>"> 
      ID <?php if ($column === 'id') echo $arrow; ?></a></th>
      
      <th scope="col"><a class="text-light" style="text-decoration: none;" 
      href="?column=Name&sort=<?php echo $sort === 'asc' && $column === 'Name' ? 'desc' : 'asc'; ?>">
      Name <?php if ($column === 'Name') echo $arrow; ?></a></th>

      <th scope="col"><a  class="text-light" style="text-decoration: none;" 
      href="?column=Phone&sort=<?php echo $sort === 'asc' && $column === 'Phone' ? 'desc' : 'asc'; ?>">
      Phone <?php if ($column === 'Phone') echo $arrow; ?></a></th>

      <th scope="col"><a  class="text-light" style="text-decoration: none;" 
      href="?column=Email&sort=<?php echo $sort === 'asc' && $column === 'Email' ? 'desc' : 'asc'; ?>">
      Email <?php if ($column === 'Email') echo $arrow; ?></a></th>
      
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>

<?php

if ($result){
    while($row=mysqli_fetch_assoc($result)){
    $ID=$row['id'];
    $name=$row['Name'];
    $phone=$row['Phone'];
    $email=$row['Email'];
    echo '<tr>
    <th scope="row">'.$ID.'</th>
    <td>'.$name.'</td>
    <td>'.$phone.'</td>
    <td>'.$email.'</td>
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
    <button class="btn btn-primary"><a href="add_supplier.php" class = "text-light">Add Supplier</a></button>
</div>
</div>
</body>

</html>