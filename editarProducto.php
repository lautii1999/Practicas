<?php
require 'database.php';

if(!isset($_POST['producto_id'])){

    header('Location: sinventario.php?mensaje=error');
}



$productoid = $_POST['producto_id'];
$nomb = $_POST['txtNombre'];
$descri = $_POST['txtDescripcion'];
$marc = $_POST['txtMarca'];
$preci = $_POST['txtPrecio'];
$sto = $_POST['txtStock'];


$sentence= $conn->prepare("UPDATE productos SET nombre= ?, descripcion= ?, marca= ?, precio= ?, stock= ?

WHERE producto_id= ? ");

$resultado= $sentence->execute([$nomb,$descri,$marc,$preci,$sto,$productoid]);

if($resultado === TRUE){
    header('Location: sinventario.php?mensaje=editado');
}else{
    header('Location: sinventario.php?mensaje=error');
    exit();
}






?>