<?php
session_start();
 if(isset($_POST['submit'])){
  $product_name= htmlspecialchars(trim( $_POST['name_product']));
  $product_price= htmlspecialchars(trim( $_POST['price_product']));
  $product_desc= htmlspecialchars(trim( $_POST['desc_product']));
  $product_img = $_FILES['zimg']['name'];
  $product_full_info = [
    'name' => $product_name,
    'price' => $product_price,
    'desc' => $product_desc,
    'img' => $product_img,
  ];
  (isset($_SESSION['product']) && in_array($product_full_info , $_SESSION['product']))? 'found' : $_SESSION['product'][] = $product_full_info;
  move_uploaded_file($_FILES['zimg']['tmp_name'],'upload/'.$product_img);
  // $_SESSION['product']=[];
  // session_destroy();
header('location:handle.php');
  // echo "<pre>";
  // print_r($_SESSION['product']);
  // echo "</pre>";

  // echo "$name_product" . "<br>";
  // echo "$price_product" . "<br>";
  // echo "$desc_product" . "<br>";
  //validation
  // if(empty($product_name) || empty($product_price) || empty($product_desc)){
  //   echo '<div class="alert alert-danger" role="alert">
  //           ALL DATA ARE REQUIRED YA MAN
  //         </div>';
  // }elseif(is_numeric($product_name)){
  //   echo '<div class="alert alert-danger" role="alert">
  //           name must be a string ya man 
  //         </div>';
  // }else{
  //   $_SESSION['price'] = $product_price;
  //   header('location:handle.php');
  // }
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
  <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" enctype="multipart/form-data">
  <div class="mb-3">
    <label  class="form-label">name of product</label>
    <input type="text" name="name_product" class="form-control" >
  </div>
  <div class="mb-3">
    <label  class="form-label">price of product</label>
    <input type="number" name="price_product" class="form-control" >
  </div>
  <div class="mb-3">
    <label  class="form-label">description of product</label>
    <textarea  name="desc_product" class="form-control" ></textarea>
  </div>
  <div class="mb-3">
    <label  class="form-label">the image</label>
    <input type="file" name="zimg" class="form-control" >
  </div>
  <input type="submit" name="submit" value="send data" class="btn btn-primary">
  
</form>
  </div>
</body>
</html>