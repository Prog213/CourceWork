<?php
include '../connect.php';

if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];
  $rating = $_POST['rating'];

  $sql = "INSERT INTO `Stores` (Name, Address, Phone, Rating) 
  VALUES ('$name', '$address', '$phone', '$rating')";
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

    <title>Add Stores</title>
</head>
<body>
<div class="container mt-3">
    <h2>Додати Магазин</h2>
</div>
<div class="container mt-3">
    <form method="post">
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" placeholder="Enter name" name="name">
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" class="form-control" placeholder="Enter address" name="address">
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" class="form-control" placeholder="Enter phone" name="phone">
        </div>
        <div class="form-group">
            <label>Rating</label>
            <input type="number" class="form-control" placeholder="Enter rating (int 1 to 5)" min="1" max="5" name="rating">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        <button class="btn btn-primary ml-2"><a href="display.php" class = "text-light">Back</a></button>
    </form>
</div>

</body>
</html>
