<?php
session_start();

if(isset($_POST['submit'])){
  $product_name = $_POST['name'];
  $product_price = $_POST['price'];
  $product_desc = $_POST['desc'];
  $product_img = $_FILES['img'];
  move_uploaded_file($product_img['tmp_name'], 'uploads/'.$product_img['name']);
  // session_destroy();
  $_SESSION['product'][] = [
    'name' => $product_name,
    'price' => $product_price,
    'desc' => $product_desc,
    'img' => $product_img,
  ];
  header('location: handle.php');
  // echo "<pre>";
  // print_r($_SESSION['product']);
  // echo "</pre>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <title>Document</title>
</head>
<body>
  <div class="container w-50 m-5 p-5">
<a href='handle.php' class='btn btn-success'>go to handle</a>

  <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" enctype="multipart/form-data">
  <div class="mb-3">
    <label  class="form-label">name of product</label>
    <input type="text" name="name" class="form-control" >
  </div>
  <div class="mb-3">
    <label  class="form-label">price of product</label>
    <input type="number" name="price" class="form-control" >
  </div>
  <div class="mb-3">
    <label  class="form-label">description of product</label>
    <textarea  name="desc" class="form-control" ></textarea>
  </div>
  <div class="mb-3">
    <label  class="form-label">the image</label>
    <input type="file" name="img" class="form-control" >
  </div>
  <input type="submit" name="submit" value="send data" class="btn btn-primary">
  
</form>
  </div>
</body>
</html>