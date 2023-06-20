<?php
include '../connect.php';

if(isset($_POST['submit'])){
  $store_id = $_POST['store_id'];
  $name = $_POST['name'];
  $position = $_POST['position'];
  $salary = $_POST['salary'];

  $sql = "INSERT INTO `Employees` (store_id, Full_Name, Position, Salary)
  VALUES ('$store_id','$name', '$position', '$salary')";
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

    <title>Add Employee</title>
</head>
<body>
<div class="container mt-3">
  <div>
    <h2>Додати Працівника</h2>
  </div>
</div>
<div class="container mt-3">
    <form method="post">
        <div class="form-group">
            <label>Store ID</label>
            <input type="number" class="form-control" placeholder="Enter store id" name="store_id">
        </div>
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" placeholder="Enter name" name="name">
        </div>
        <div class="form-group">
            <label>Position</label>
            <input type="text" class="form-control" placeholder="Enter position" name="position">
        </div>
        <div class="form-group">
            <label>Salary</label>
            <input type="number" step="any" class="form-control" placeholder="Enter salary" name="salary">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        <button class="btn btn-primary ml-2"><a href="display.php" class = "text-light">Back</a></button>
    </form>
</div>
</body>
</html>
