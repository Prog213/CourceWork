<?php
include '../connect.php';
$id=$_GET['updateid'];
$sql = "SELECT * FROM `Employees` WHERE id = $id";
$result = mysqli_query($con, $sql);
$row=mysqli_fetch_assoc($result);
$ID=$row['id'];
$store_id=$row['store_id'];
$name=$row['Full_Name'];
$position=$row['Position'];
$salary=$row['Salary'];
if (isset($_POST['submit'])) {
      $store_id= $_POST['store_id'];
      $name = $_POST['name'];
      $position = $_POST['position'];
      $salary = $_POST['Salary'];

  $sql="UPDATE `Employees` SET store_id = '$store_id', 
  Full_Name = '$name', Position = '$position', Salary = '$salary' WHERE id = $ID";
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

    <title>Update Employee</title>
  </head>
  <body>
  <div class="container mt-3">
  <div>
    <h2>Оновити дані Працівника</h2>
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
              <label>Store_ID</label>
              <input type="number" class="form-control" placeholder="Enter Store ID" name="store_id" 
              value = "<?php echo $store_id;?>">
            <div class="form-group">
              <label>Name</label>
              <input type="text" class="form-control" placeholder="Enter name" name="name" 
              value = "<?php echo $name;?>">
            </div>
            <div class="form-group">
              <label>Position</label>
              <input type="text" class="form-control" placeholder="Enter position" name="position" 
              value = "<?php echo $position;?>">
            </div>
            <div class="form-group">
              <label>Salary</label>
              <input type="number" step="any" class="form-control" placeholder="Enter Salary" name="Salary" 
              value = "<?php echo $salary;?>">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Update</button>
            <button class="btn btn-primary ml-2"><a href="display.php" class = "text-light">Back</a></button>
    </div>
  
</form>
    </div>

  </body>
</html>