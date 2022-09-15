
<?php
session_start();
  print_r($_SESSION['product']);
  $products = $_SESSION['product'];
  if(isset($_POST['delete'])){
    $product_key = $_POST['delete'];
    unset($_SESSION['product'][$product_key]);
    /*
please remember to comment line 13 if the line 12 is not commented, and vise versa.
*/
    //header('location: handle.php'); // i have to to reload the page so the product gets deleted.
    $products = array_values($_SESSION['product']); //  you will see that it doesn't work all the time. some times it gliches at last product delete and sometimes before.
  }
  if(empty($_SESSION['product'])){
    header('location: index.php');
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
  <div class="container  m-5 p-5">
<a href='index.php' class='btn btn-success'>back to index</a>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">name</th>
      <th scope="col">price</th>
      <th scope="col">desc</th>
      <th scope="col">image</th>
      <th scope="col">delete</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($products as $key => $product){ ?>
    <tr>
      <form method='POST'>
      <th scope="row"><?= $key ?></th>
      <td><?= $product['name'] ?></td>
      <td><?= $product['price'] ?></td>
      <td><?= $product['desc'] ?></td>
      <td><img width='150px' src="<?= 'uploads/' . $product['img']['name'] ?>"></td>
      <!-- i got the key value in line 53 from the foreach itself-->
      <td><button type='submit' name='delete' value="<?= $key ?>" class="btn btn-danger">DELETE</button></td> 
      </form>
    </tr>
  <?php } ?>
  </tbody>
</table>

</form>
  </div>
</body>
</html>