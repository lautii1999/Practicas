<?php
include 'template/header.php';
include 'template/footer.php';
include 'database.php';
session_start();


if(!isset($_GET['producto_id'])){
    header ('Location: sinventario.php?mensaje=error');
    exit();
}


include 'database.php';
$productoid = $_GET['producto_id'];
$sentencia = $conn->prepare("SELECT * FROM productos where producto_id = ?;");

$sentencia->execute([$productoid]);

$pdatos = $sentencia->fetch(PDO::FETCH_OBJ);


?>



<div class="container mt-3">

    <div class="row justify-content-center">
        <div class="col-md-4">
        <div class="card text-start">
          <div class="card-header">
            Editar producto:
          </div>
          <form  class=p-4 action="editarProducto.php" method="POST">
            <div class="mb-3">
                <label for="" class="form-label">
                    Nombre:
                </label>
                <input type="text" class="form-control" name="txtNombre"  require 
                value= " <?php echo  $pdatos->nombre; ?>">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">
                    Descripcion
                </label>
                <input type="text" class="form-control" name="txtDescripcion"
                value= " <?php echo  $pdatos->descripcion; ?>">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">
                    Marca
                </label>
                <input type="text" class="form-control" name="txtMarca"
                value= " <?php echo  $pdatos->marca; ?>">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">
                    Precio
                </label>
                <input type="text" class="form-control" name="txtPrecio"
                value= " <?php echo  $pdatos->precio; ?>">
                <div class="mb-3">
                <label for="" class="form-label">
                    Stock
                </label>
                <input type="text" class="form-control" name="txtStock"
                value= " <?php echo  $pdatos->stock; ?>">
            <div class="d-grid mt-3">
                <input type="hidden" name="producto_id" value="<?php echo  $pdatos->producto_id; ?>">
                <input type="submit" class="btn btn-primary" value="Editar producto">
            </div>

          </form>

        </div>








        </div>
 



    </div>

</div>



