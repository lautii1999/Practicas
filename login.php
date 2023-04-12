<?php
include 'template/header.php';
include 'template/footer.php';
session_start();


require 'database.php';

if (!empty($_POST['email']) && !empty($_POST['password'])){

$records= $conn->prepare('SELECT id, email, password FROM users WHERE email=:email');
$records->bindParam(':email', $_POST['email']);
$records->execute();
$results= $records->fetch(PDO::FETCH_ASSOC);


$message = '';


if(count($results) > 0  && password_verify($_POST['password'],$results['password'])) {

$_SESSION['user_id']= $results['id'];

header('Location:  sinventario.php');

} else{
    $message = ' Datos incorrectos';
}



}




?>
















<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="./model/style.css">


	<title>Ingresar</title>
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
            <h2 class="fw-bold "> Ingresar</h2>
        </div>
        <form action="login.php" method="POST">
                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control form-control-sm" placeholder="Ingrese su correo">
                    <label for="email">Email</label>
                </div>
            <form action="">
                <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control form-control-sm" placeholder="Ingrese su contraseña">
                    <label for="password">Contraseña</label>
                </div>
                
                <div class="d-grid gap-2  mx-auto" >
                <button type="submit" class="btn  btn-primary " value="submit">Iniciar Sesion</button>
                </div>
                
        </form>
                <div class="mt-3">
                <a href="signup.php" class="d-grid gap-2">   <button class="  btn  btn-primary">Registrarse</button></a>
                </div>
    </div>
</div>

</div>












<!----------------------------------------------------------login2
    <figure class="text-center mt-4">
	<h1 class="h1 mb-3 fw-normal">Ingresar</h1>
    <span> o <a href="signup.php">Registrarse</a>
    </figure>


    <form action="login.php" method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Ingresar email</label>
    <input type="email" class="form-control" name="email" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Contraseña</label>
    <input type="password" class="form-control" name="password">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Recordarme</label>
  </div>
  <button type="submit" class="btn btn-primary">Ingresar</button>
</form>
    </div>
----------------------------------¡>




















<!-------------------------------------------login1
<form action="login.php" method="POST">
<input type="text" name="email" placeholder="Ingresar Email">
<input type="password" name="password" placeholder="Ingresar Contraseña">
<input type="submit" value="submit">
------>



</form>
</body>
</html>