<?php
include '../connect.php';
$id=$_GET['updateid'];
$sql = "SELECT * FROM `Products` WHERE id = $id";
$result = mysqli_query($con, $sql);
$row=mysqli_fetch_assoc($result);
$store_ID=$row['store_id'];
$name = $row['Name'];
$description = $row['Description'];
$price = $row['Price'];
$quantity = $row['Quantity'];
if (isset($_POST['submit'])) {
      $store_ID=$_POST['store_id'];
      $name = $_POST['name'];
      $description = $_POST['description'];
      $price = $_POST['price'];
      $quantity = $_POST['quantity'];

  $sql="UPDATE `Products` SET store_id = '$store_ID', Name = '$name', Description = '$description' , 
  Price = '$price', Quantity = '$quantity' WHERE id = $id";
  $result = mysqli_query($con, $sql);
  if($result){
      header('location:display.php');
  }else{
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

    <title>Update Product</title>
  </head>
  <body>
  <div class="container mt-3">
    <h2>Оновити дані Продукту</h2>
  </div>
    <div class="container my-3">
        <form method = "post">
            <div class="form-group">
              <label>ID</label>
              <input type="text" class="form-control" placeholder="Enter ID" name="ID" 
              value = "<?php echo $id;?>" readonly>
              <div class="form-group">
            <label>Store_ID</label>
            <input type="number" step="any" class="form-control" placeholder="Enter Store ID" name="store_id"
            value = "<?php echo $store_ID;?>">
            </div>
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Enter name" name="name"
                value = "<?php echo $name;?>">
            </div>
            <div class="form-group">
                <label>Description</label>
                <input type="text" class="form-control" placeholder="Enter Description" name="description"
                value = "<?php echo $description;?>">
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="number" step="any" class="form-control" placeholder="Enter Price" name="price"
                value = "<?php echo $price;?>">
            </div>
            <div class="form-group">
                <label>Quantity</label>
                <input type="number" step="any" class="form-control" placeholder="Enter Quantity" name="quantity"
                value = "<?php echo $quantity;?>">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Update</button>
            <button class="btn btn-primary ml-2"><a href="display.php" class = "text-light">Back</a></button>
    </div>
  
</form>
    </div>

  </body>
</html>