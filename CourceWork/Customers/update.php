<?php
include '../connect.php';
$id=$_GET['updateid'];
$sql = "SELECT * FROM `Customers` WHERE id = $id";
$result = mysqli_query($con, $sql);
$row=mysqli_fetch_assoc($result);
$ID=$row['id'];
$name=$row['Full_Name'];
$phone=$row['Phone'];
$date=$row['Birth_Date'];
if (isset($_POST['submit'])) {
      $name = $_POST['name'];
      $phone = $_POST['phone'];
      $date = $_POST['date'];

  $sql="UPDATE `Customers` SET Full_Name = '$name', Phone = '$phone' , 
  Birth_Date = '$date' WHERE id = $ID";
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

    <title>Update Customer</title>
  </head>
  <body>
  <div class="container mt-3">
  <div>
    <h2>Оновити дані Клієнта</h2>
  </div>
</div>
    <div class="container my-3">
        <form method = "post">
            <div class="form-group">
              <label>ID</label>
              <input type="text" class="form-control" placeholder="Enter ID" name="ID" 
              value = "<?php echo $ID;?>" readonly>
            </div>
            <div class="form-group">
              <label>Name</label>
              <input type="text" class="form-control" placeholder="Enter name" name="name" 
              value = "<?php echo $name;?>">
            </div>
            <div class="form-group">
              <label>Phone</label>
              <input type="text" class="form-control" placeholder="Enter phone" name="phone" 
              value = "<?php echo $phone;?>">
            </div>
            <div class="form-group">
              <label>Birth Date</label>
              <input type="date" class="form-control" placeholder="Enter date" name="date" 
              value = "<?php echo $date;?>">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Update</button>
            <button class="btn btn-primary ml-2"><a href="display.php" class = "text-light">Back</a></button>
    </div>
  
</form>
    </div>

  </body>
</html>