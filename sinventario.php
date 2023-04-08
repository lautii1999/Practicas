<?php
 session_start();
 require 'database.php';

include 'template/header.php';
 include 'template/footer.php';
?>
<?php
$sentencia = $conn->query("SELECT * FROM productos");
$productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
//print_r($productos);

?>



<div class="container mt-4">
<div class="row justify-content-center">
<div class="col-md-8">

<!---Inicio alerta -->
<?php 
 if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta'){

 
?>
<div class="alert alert-danger alert-primary" role="alert">
    <strong>Faltan datos</strong>
</div>
<?php 
}
?>

<?php 
 if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado'){

 
?>
<div class="alert alert-success alert-primary" role="alert">
    <strong>Datos registrados correctamente </strong>
</div>
<?php 
}
?>

<?php 
 if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error'){

 
?>
<div class="alert alert-danger alert-primary" role="alert">
    <strong>Error¡ vuelve a intentar </strong>
</div>
<?php 
}
?>
<?php 
 if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado'){

 
?>
<div class="alert alert-success alert-primary" role="alert">
    <strong>Los datos fueron actualizados </strong>
</div>
<?php 
}
?>

<?php 
 if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado'){

 
?>
<div class="alert alert-warning alert-primary" role="alert">
    <strong>Los datos han sido eliminados</strong>
</div>
<?php 
}
?>






<!---fin alerta -->

        <div class="card">
        <div class="card-header">  
            Lista de productos
        </div>
        <div class="p-4 ">
            <table class="table align-middle ">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col" >Marca</th>
                        <th scope="col"> Precio</th>
                        <th scope="col"> Stock</th>
                        <th scope="col" colspan="2">Opciones</th>


                    </tr>
                </thead>
                <tbody>


<?php
        foreach ($productos as $dato) {
                    # code...
                
                
?>
                    <tr class="">
                        <td scope="row"><?php echo $dato->producto_id ?> </td>
                        <td scope="row"><?php echo $dato->nombre ?> </td>
                        <td scope="row" ><?php echo $dato->descripcion ?> </td>
                        <td scope="row"><?php echo $dato->marca ?>              </td>
                        <td scope="row" ><?php echo $dato->precio ?>            </td>
                        <td scope="row"  ><?php echo $dato->stock ?>            </td>

<td><a class="text-success" href="editar.php?producto_id=<?php echo $dato->producto_id; ?>"><i class="bi bi-pencil-square"></i></a></td>

<td><a  onclick="return confirm('Estas seguro de eliminar?');" class="text-danger" href="eliminar.php?producto_id=<?php echo $dato->producto_id; ?>"><i class="bi bi-trash2-fill"></i></a></td>



                    </tr>
<?php

}
?>







                </tbody>
            </table>
        </div>
        
        </div>
        </div>



    <div class="col-md-4 ">
        <div class="card text-start">
          <div class="card-header">
            Ingresar Producto:
          </div>
          <form  class=p-4 action="registrar.php" method="POST">
            <div class="mb-3">
                <label for="" class="form-label">
                    Nombre:
                </label>
                <input type="text" class="form-control" name="txtNombre" autofocus require>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">
                    Descripcion
                </label>
                <input type="text" class="form-control" name="txtDescripcion" autofocus require>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">
                    Marca
                </label>
                <input type="text" class="form-control" name="txtMarca"autofocus require>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">
                    Precio
                </label>
                <input type="text" class="form-control" name="txtPrecio"autofocus require>
                <div class="mb-3">
                <label for="" class="form-label">
                    Stock
                </label>
                <input type="text" class="form-control" name="txtStock"autofocus>
            <div class="d-grid mt-3">
                <input type="hidden" name="oculto" value="1">
                <input type="submit" class="btn btn-primary" value="Registrar">
            </div>
          </form>
        </div>
    </div>


</div>
</div>
</div>
