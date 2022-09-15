<?php
session_start();

  if(isset($_POST['delete'])){
    $id= $_POST['price'];
    $keyCol = array_column($_SESSION['product'], 'price') ;
    $key= array_search($id, $keyCol);
    unset($_SESSION['product'][$key]);
    $_SESSION['product'] = array_values($_SESSION['product']);
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
<div class="container w-75 m-5 p-5">
<table class="table table-striped ">
  <thead>
    <tr>
      <th scope="col">name</th>
      <th scope="col">price</th>
      <th scope="col">desc</th>
      <th scope="col">img</th>
      <th scope="col">delete</th>
    </tr>
  </thead>
  <tbody>
<?php foreach($_SESSION['product'] as $value) {?>
<form action="" method="POST">
    <tr>
      <td ><?= $value['name'] ?></td>
      <td><?= $value['price'] ?></td>
      <td><?= $value['desc'] ?></td>
      <td><img width='150px' src="<?= 'upload/'.$value['img'] ?>"></td>
      <td><button type='submit' name='delete' class='btn btn-danger' >DELETE</button></td>
      <input type="hidden" name="price" value="<?= $value['price'] ?>">
    </tr>
</form>
<?php } ?>
  </tbody>
</table>
</div>
</body>
</html>