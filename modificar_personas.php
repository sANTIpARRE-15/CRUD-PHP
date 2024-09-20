<?php 
include "modelo/conexion.php";
$id=$_GET ["id"];
$sql=$conexion-> query ("select* from personas where id_persona = $id")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MODIFICAR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    
<form class="col-5 m-4 m-auto" method="post">
        <h3 class="text-center text-secondary">registro de personas</h3>
        <input type="hidden" name="id" value="<?= $_GET["id"] ?> ">

        <?php 
        
        include "controlador/modificar_persona.php";
        while ($datos=$sql->fetch_object()) {?>
        <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label" required>Nombre</label>
    <input type="text" class="form-control" name="nombre" value="<?=$datos->nombre?>" >
</div>
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label" require>Apellido</label>
    <input type="text" class="form-control" name="apellido" value="<?=$datos->apellido?>" >
</div>
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label" require>DNI</label>
    <input type="text" class="form-control" name="dni"value="<?=$datos->dni?>"  >
</div>
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label" require>Fecha de nacimiento</label>
    <input type="date" class="form-control" name="fecha" value="<?=$datos->fecha_nacimiento?>" >
</div>
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label" require>Correo</label>
    <input type="text" class="form-control" name="correo" value="<?=$datos->email?>" >
</div>
  <button type="submit" class="btn btn-primary" name="btnregistrar" vale="okey listo">Modificar</button>
  <br/>
         <?php   
        }
        ?>
       
  
 
</form>
</body>
</html>