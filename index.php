<?php 
include 'template/header.php';
include 'template/footer.php';
session_start();
require 'database.php';

if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;

    }
  }


?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bienvenidos</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="./model/style.css">
</head>
<body>
<?php if(!empty($user)): ?>
      <br>Has ingresado correctamente
      <a href="logout.php">
        Salir
      </a>
    <?php else: ?>

    <h1>Ingresar o Registrarse</h1>

    <a href="login.php">Ingresar</a> o
    <a href="signup.php"> Registrarse</a>
    <?php endif; ?>
</body>

</html>