<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title> 
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/99e2bc0140.js" crossorigin="anonymous"></script>
    
    
</head>
<script>
  function eliminar() {
    var respuesta=confirm("Estas seguro que dedeas eliminar?");
    return respuesta
  }
</script>
<body class="bg-light" >
<link rel="shortcut icon" href="favicon.ico">

<nav class="navbar bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand text-white -apple-system shadow-lg rounded" href="#"><h1>SISTEMA CRUD (Crear-Leer-Actualizar-Borrar)</h1></a>
  </div>
</nav>
<?php
      include "modelo/conexion.php";
       include "controlador/eliminar_persona.php";?>
    <div class="container-fuid row">
      
    <form class="col-5 m-5 shadow-lg rounded" method="post">
        <h3 class="text-center text-secondary">registro de personas</h3>
        
        <?php 
         include "modelo/conexion.php";
        include "controlador/registro_persona.php";
        ?>
       
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label" required>Nombre</label>
    <input type="text" class="form-control" name="nombre" >
</div>
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label" require>Apellido</label>
    <input type="text" class="form-control" name="apellido"  >
</div>
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label" require>DNI</label>
    <input type="text" class="form-control" name="dni"  >
</div>
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label" require>Fecha de nacimiento</label>
    <input type="date" class="form-control" name="fecha"  >
</div>
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label" require>Correo</label>
    <input type="text" class="form-control" name="correo"  >
</div>
  <button type="submit" class="btn btn-primary" name="btnregistrar" vale="okey listo">Registrar</button>
  <br/>
 
</form>



<div class="col-6 p-5">
<table class="table  table-hover shadow-lg rounded">
  <thead class="table-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">NOMBRE</th>
      <th scope="col">APELLIDO</th>
      <th scope="col">DNI</th>
      <th scope="col">FECHA</th>
      <th scope="col">CORREO</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php
    include "modelo/conexion.php";
    $sql=$conexion->query("select * from personas");
    while($datos=$sql->fetch_object()){ ?>
        <tr>
        <td><?= $datos-> id_persona?></td>
        <td><?= $datos-> nombre?></td>
        <td><?= $datos-> apellido?></td>
        <td><?= $datos-> dni?></td>
        <td><?= $datos-> fecha_nacimiento?></td>
        <td><?= $datos-> email?></td>
        
        <td>
        <a href="modificar_personas.php?id=<?=$datos-> id_persona ?>" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
        <a onclick="return eliminar()" href="index.php?id=<?=$datos-> id_persona ?>" class="btn btn-small btn-danger"><i class="fa-solid fa-trash"></i></a>
        </td>
  
        
      </tr>

    <?php }
    ?>
    
    
  </tbody>
</table>
</div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>