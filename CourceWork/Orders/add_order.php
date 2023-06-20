<?php
include '../connect.php';

if(isset($_POST['submit'])){
  $store_id = $_POST['store_id'];
  $customer_id = $_POST['customer_id'];
  $description = $_POST['description'];
  $date = $_POST['date'];
  $total = $_POST['total'];

  $sql = "INSERT INTO Orders (store_id, customer_id, Description, Order_Date, Order_Total)
  VALUES ('$store_id','$customer_id','$description', '$date', '$total' )";
  $result = mysqli_query($con, $sql);
  if($result){
      header('location:display.php');
  } else {
      die(mysqli_error($con));
  }
}
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

    <title>Add Order</title>
</head>
<body>
<div class="container mt-3">
  <div>
    <h2>Додати Замовлення</h2>
  </div>
</div>
<div class="container mt-3">
    <form method="post">
        <div class="form-group">
            <label>Store_ID</label>
            <input type="number" class="form-control" placeholder="Enter Store ID" name="store_id">
        </div>
        <div class="form-group">
            <label>Customer_ID</label>
            <input type="number" class="form-control" placeholder="Enter Customer ID" name="customer_id">
        </div>
        <div class="form-group">
            <label>Description</label>
            <input type="text" class="form-control" placeholder="Enter description" name="description">
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" class="form-control" placeholder="Enter phone" name="phone">
        </div>
        <div class="form-group">
            <label>Date</label>
            <input type="datetime-local" class="form-control" placeholder="Enter date" name="date">
        </div>
        <div class="form-group">
            <label>Total</label>
            <input type="number" step="any" class="form-control" placeholder="Enter Total" name="total">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        <button class="btn btn-primary ml-2"><a href="display.php" class = "text-light">Back</a></button>
    </form>
</div>

</body>
</html>
