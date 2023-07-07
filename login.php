<?php
    session_start();

    if (isset($_SESSION["name"]) && !empty($_SESSION["name"])) {
        header("Location: protected.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Bejelentkezés</title>
</head>
<body>

<?php include "header.php";
echo 'name: Sanya password: asd';
?>

  <main>
    <div class="container">
      <form class="sign" method="POST">
          <label for="name">Név</label><input type="name" name="name" id="name">
          <label for="password">Jelszó</label><input type="password" name="password" id="password"><br>
          <input class="button" type="submit" name="login" value="login"><br>

          <?php
            if (isset($_POST["login"])) {
                include_once('config.php');
                $dsn = 'mysql:host=' . $database['host'] . ';dbname=' . $database['dbname'] . ''; //MISSING PASSWORD!!
                try{
                    $db = new PDO($dsn,$database['username']);
                }catch(PDOExeption $e){
                    $error = "Database error: ";
                    $error .= $e->getMessage();
                    exit();
                }
                $user=$_POST["name"];
                $query = "SELECT PASSWORD FROM `users` WHERE name='$user'";
                $statment = $db->query($query);
        
                $pass = $statment->fetchColumn(0);
                $statment->closeCursor();
                if(password_verify($_POST["password"],$pass))
                {
                    $_SESSION["name"] = $user;
                    $_SESSION["password"] = $pass;
                    header("Location: protected.php");
                }else{
                    echo "Nem megfelelő email cím vagy jelszó!";
                }
            }
            ?>
      </form>
    </div>
  </main>
</body>
</html>
