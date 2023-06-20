<?php
include '../connect.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <title>Search Employee</title>
  </head>

    <body>
    <div class="container mt-3 mb-3">
    <div>
    <h2>Пошук Працівників</h2>
    </div>
    </div>
    <div class="container">

<?php

if(isset($_POST['submit'])){
  echo'<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Store</th>
      <th scope="col">Full Name</th>
      <th scope="col">Position</th>
      <th scope="col">Salary</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>';
  $name = $_POST['name'];
  

  $sql ="SELECT * FROM Employees WHERE Full_Name LIKE '%".$name."%'";
  $result = mysqli_query($con, $sql);
  if ($result){
    while($row=mysqli_fetch_assoc($result)){
    $ID=$row['id'];
    $store_ID=$row['store_id'];

    $sql_store = "SELECT Name FROM `Stores` WHERE ID=$store_ID"; // Отримуємо назву магазину з відповідного store_id
    $result_store = mysqli_query($con, $sql_store);
    if($result_store){
    $_row = mysqli_fetch_assoc($result_store);
    $store = $_row['Name'];
  }
    $name=$row['Full_Name'];
    $position=$row['Position'];
    $salary=$row['Salary'];
    echo '<tr>
    <th scope="row">'.$ID.'</th>
    <td>'.$store.'</td>
    <td>'.$name.'</td>
    <td>'.$position.'</td>
    <td>'.$salary.'</td>
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
    <div class="d-inline-flex">
    <button class="btn btn-primary mr-2"><a href="display.php" class = "text-light">Back</a></button>
           <form class="form-inline ml-2" method = "post">
             <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="name">
             <button class="btn btn-primary my-2 my-sm-0" type="submit" name="submit">Search</button>
           </form>
    </div>
    </body>
</html>
