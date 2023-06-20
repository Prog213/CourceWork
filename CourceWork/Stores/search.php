<?php
include '../connect.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <title>Search Store</title>
  </head>

    <body>
    <div class="container mt-3 mb-3">
    <h2>Пошук Магазинів</h2>
    </div>
    <div class="container">

  <tbody>
<?php

if(isset($_POST['submit'])){
  $name = $_POST['name'];
  

  $sql ="SELECT * FROM Stores WHERE Name LIKE '%".$name."%'";
  $result = mysqli_query($con, $sql);
  if ($result){
    echo'<table class="table">
    <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Address</th>
      <th scope="col">Phone</th>
      <th scope="col">Rating</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>';
      while($row=mysqli_fetch_assoc($result)){
        $ID=$row['id'];
        $name=$row['Name'];
        $address=$row['Address'];
        $phone=$row['Phone'];
        $rating=$row['Rating'];
      echo '<tr>
      <th scope="row">'.$ID.'</th>
      <td>'.$name.'</td>
      <td>'.$address.'</td>
      <td>'.$phone.'</td>
      <td>'.$rating.'</td>
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
</div>
    </body>
</html>
