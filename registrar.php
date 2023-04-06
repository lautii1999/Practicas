<?php
session_start();
include_once 'database.php';

if(empty($_POST["oculto"]) || empty($_POST["txtNombre"]) || empty($_POST["txtDescripcion"])

||  empty($_POST["txtMarca"]) || empty($_POST["txtPrecio"]) || empty($_POST["txtStock"])){


    header ('Location: sinventario.php?mensaje=falta');
    exit();
}


$nombre = $_POST['txtNombre'];
$desc = $_POST['txtDescripcion'];
$mark = $_POST['txtMarca'];
$prec = $_POST['txtPrecio'];
$stok = $_POST['txtStock'];

$sentencia = $conn->prepare('INSERT INTO productos (nombre, descripcion, marca, precio, stock)
VALUES (?,?,?,?,?);');

$resultado= $sentencia->execute([$nombre, $desc, $mark, $prec, $stok]);

if ($resultado === TRUE) {

   header ('Location: sinventario.php?mensaje=registrado');
} else {
    header ('Location: sinventario.php?mensaje=error');
    exit();
}






?>