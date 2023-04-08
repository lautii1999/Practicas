<?php
session_start();

require 'database.php';
if(!isset($_GET['producto_id'])){

    header('Location: sinventario.php?mensaje=error');
    exit();



}

$productoid = $_GET['producto_id'];

$sentence = $conn->prepare("DELETE  FROM productos WHERE producto_id = ?;");

$resultados = $sentence->execute([$productoid]);

if($resultados === TRUE){
    header('Location: sinventario.php?mensaje=eliminado');

}else{
    header('Location: sinventario.php?mensaje=error');

}



?>