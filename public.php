<?php
    session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bejelentkezés</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<?php include "header.php";?>

  <main>
    <div class="container">
    <?php
    $password="asd";
    $hashed_password=password_hash($password, PASSWORD_BCRYPT);
    echo $hashed_password . '<br>';
    echo 'PHP version: ' . phpversion() ?>
    </div>
  </main>
</body>
</html>
