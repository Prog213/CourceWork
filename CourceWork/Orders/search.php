<?php
include '../connect.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <title>Search Order</title>
  </head>

    <body>
    <div class="container mt-3 mb-3">
    <h2>Пошук Замовлень</h2>
    </div>
    <div class="container">

<?php

if(isset($_POST['submit'])){
  $name = $_POST['name'];
  

  $sql ="SELECT * FROM Orders WHERE Description LIKE '%".$name."%'";
  $result = mysqli_query($con, $sql);
  if ($result){
    echo'<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Store</th>
        <th scope="col">Customer</th>
        <th scope="col">Description</th>
        <th scope="col">Date</th>
        <th scope="col">Total</th>
        <th scope="col">Operations</th>
      </tr>
    </thead>';
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
    $total=$row['Order_Total'];
    $date=$row['Order_Date'];
    echo '<tr>
    <th scope="row">'.$ID.'</th>
    <td>'.$store.'</td>
    <td>'.$customer.'</td>
    <td>'.$description.'</td>
    <td>'.$date.'</td>
    <td>'.$total.'</td>
    <td>
    <button class="btn btn-primary"><a href="update.php?updateid='.$ID.'" class = "text-light">Update</a></button>
    <button class="btn btn-danger"><a href="delete.php?deleteid='.$ID.'" class = "text-light">Delete</a></button>
    </td>
  </tr>';
}
  }else {
      die(mysqli_error($con));
        }
  }
?>

  </tbody>
</table>
<div>
    <div class="d-inline-flex">
    <button class="btn btn-primary mr-2"><a href="display.php" class = "text-light">Back</a></button>
           <form class="form-inline ml-2" method = "post">
             <input class="form-control mr-sm-2" type="search" placeholder="Search by description" aria-label="Search" name="name">
             <button class="btn btn-primary my-2 my-sm-0" type="submit" name="submit">Search</button>
           </form>
    </div>
</div>
    </body>
</html>
