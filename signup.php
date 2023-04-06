<?php
include 'template/header.php';
include 'template/footer.php';
  require 'database.php';

  $message = '';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
      $message = 'Usuario creado correctamente';
    } else {
      $message = 'Ha habido un problema al crear su cuenta';
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registrarse</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="/style.css">
  </head>
  <body class="text-center">


    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <div class="container">
<div class="row justify-content-center align-items-center inner-row">
    <div class="col-md-5">
        <div class="form-box p-5">
            <div class="form-title"></div>
            <h2 class="fw-bold "> Registrarse</h2>
        </div>
        <form action="signup.php" method="POST">
                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control form-control-sm" placeholder="Ingrese su correo">
                    <label for="email">Email</label>
                </div>
            <form action="">
                <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control form-control-sm" placeholder="Ingrese su contraseña">
                    <label for="password">Contraseña</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" name="confirm_password" class="form-control form-control-sm" placeholder="Confirmar contraseña">
                    <label for="password"> Confirmar Contraseña</label>
                </div>
                <div class="mt-3 d-grid gap-2">
                 <button class="  btn  btn-primary" value="submit" type="submit">Registrarse</button></a>
                </div>
                
        </form>
        <div class="mt-3">
                <a href="login.php" class="d-grid gap-2">   <button class="  btn  btn-primary">Iniciar sesion</button></a>
                </div>        


    </div>
</div>

</div>






















    <!----------------------------------------------
    <h1>Registrarse</h1>
    <span>or <a href="login.php">Login</a></span>

    <form action="signup.php" method="POST">
      <input name="email" type="text" placeholder="Ingrese su email">
      <input name="password" type="password" placeholder="Ingresar su contraseña">
      <input name="confirm_password" type="password" placeholder="Confimar contraseña">
      <input type="submit" value="Submit">
    </form>
-------------------------------------------------->
  </body>
</html>