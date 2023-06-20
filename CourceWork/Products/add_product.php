<?php
include '../connect.php';

if(isset($_POST['submit'])){
  $store_id = $_POST['store_id'];
  $name = $_POST['name'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  $quantity = $_POST['quantity'];

  $sql = "INSERT INTO Products (store_id, Name, Description, Price, Quantity)
  VALUES ('$store_id', '$name', '$description', '$price', '$quantity')";
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

    <title>Add Product</title>
</head>
<body>
<div class="container mt-3">
    <h2>Додати Продукт</h2>
</div>
<div class="container mt-3">
    <form method="post">
        <div class="form-group">
            <label>Store_ID</label>
            <input type="number" step="any" class="form-control" placeholder="Enter Store ID" name="store_id">
        </div>
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" placeholder="Enter name" name="name">
        </div>
        <div class="form-group">
            <label>Description</label>
            <input type="text" class="form-control" placeholder="Enter Description" name="description">
        </div>
        <div class="form-group">
            <label>Price</label>
            <input type="number" step="any" class="form-control" placeholder="Enter Price" name="price">
        </div>
        <div class="form-group">
            <label>Quantity</label>
            <input type="number" step="any" class="form-control" placeholder="Enter Quantity" name="quantity">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        <button class="btn btn-primary ml-2"><a href="display.php" class = "text-light">Back</a></button>
    </form>
</div>

</body>
</html>
