<?php
include '../connect.php';
$id=$_GET['updateid'];
$sql = "SELECT * FROM `Orders` WHERE id = $id";
$result = mysqli_query($con, $sql);
$row=mysqli_fetch_assoc($result);
$store_ID = $row['store_id'];    
$customer_ID = $row['customer_id'];
$description=$row['Description'];
$date=$row['Order_Date'];
$total=$row['Order_Total'];

if (isset($_POST['submit'])) {
  $store_id = $_POST['store_id'];
  $customer_id = $_POST['customer_id'];
  $description = $_POST['description'];
  $date = $_POST['date'];
  $total = $_POST['total'];

  $sql="UPDATE `Orders` SET store_id = '$store_id', customer_id = '$customer_id', Description = '$description',
  Order_Date = '$date', Order_Total = '$total'  WHERE id = $id";
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

    <title>Update Order</title>
  </head>
  <body>
  <div class="container mt-3">
    <h2>Оновити дані Замовлення</h2>
  </div>
    <div class="container my-3">
        <form method = "post">
            <div class="form-group">
              <label>ID</label>
              <input type="text" class="form-control" placeholder="Enter ID" name="ID" 
              value = "<?php echo $id;?>" readonly>
              <div class="form-group">
                  <label>Store_ID</label>
                  <input type="number" class="form-control" placeholder="Enter Store ID" name="store_id"
                  value="<?php echo $store_ID;?>">
              </div>
              <div class="form-group">
                  <label>Customer_ID</label>
                  <input type="number" class="form-control" placeholder="Enter Customer ID" name="customer_id"
                  value="<?php echo $customer_ID;?>">
              </div>
              <div class="form-group">
                  <label>Description</label>
                  <input type="text" class="form-control" placeholder="Enter description" name="description"
                  value="<?php echo $description;?>">
              </div>
              <div class="form-group">
                  <label>Date</label>
                  <input type="datetime-local" class="form-control" placeholder="Enter date" name="date"
                  value="<?php echo $date;?>">
              </div>
              <div class="form-group">
                  <label>Total</label>
                  <input type="number" step="any" class="form-control" placeholder="Enter Total" name="total"
                  value="<?php echo $total;?>">
              </div>
                  <button type="submit" class="btn btn-primary" name="submit">Update</button>
                  <button class="btn btn-primary ml-2"><a href="display.php" class = "text-light">Back</a></button>
              </div>
  
</form>
    </div>

  </body>
</html>