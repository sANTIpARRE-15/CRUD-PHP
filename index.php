<?php
$page = isset($_GET['page']) ? $_GET['page'] : 1; // Detecta la página actual, por ejemplo ?page=1
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="style.css">
  <!-- Establece el conjunto de caracteres como UTF-8 para manejar todos los caracteres correctamente -->
  <meta charset="UTF-8">
  <!-- Ajusta el diseño a la pantalla del dispositivo -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Título de la página -->
  <title>CRUD</title>
  
  <!-- Icono que aparecerá en la pestaña del navegador -->
  <link rel="icon" type="image/x-icon" href="favicon.ico">
  
  <!-- Incluye Bootstrap para darle estilo a la página -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  
  

  <!-- Incluye iconos de FontAwesome -->
  <script src="https://kit.fontawesome.com/99e2bc0140.js" crossorigin="anonymous"></script>
</head>

<!-- Aquí comienza el script de JavaScript -->
<script>
  // Función que se activa al intentar eliminar un registro
  function eliminar() {
    // Muestra un mensaje de confirmación antes de eliminar un registro
    var respuesta = confirm("Estas seguro que deseas eliminar?");
    return respuesta; // Si el usuario confirma, retorna true; de lo contrario, retorna false
  }
</script>

<body class="bg-light"> <!-- Clase de Bootstrap para un fondo claro -->
  
  <!-- Barra de navegación superior con un título -->
  <nav class="navbar bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand text-white shadow-lg rounded" href="#">
        <h1>SISTEMA CRUD (Crear-Leer-Actualizar-Borrar)</h1> <!-- Título principal -->
      </a>
    </div>
  </nav>

  <!-- Sección PHP para incluir la conexión a la base de datos y manejar la eliminación de personas -->
  <?php
  include "modelo/conexion.php"; // Incluye el archivo de conexión a la base de datos
  include "controlador/eliminar_persona.php"; // Controlador para manejar la eliminación de personas
  ?>

  <div class="container-fluid row"> <!-- Contenedor principal de la página -->
    
    <!-- Formulario para registrar personas -->
    <form class="col-5 m-4 shadow-lg rounded" method="post"> <!-- El formulario envía datos mediante POST -->
      <h3 class="text-center text-secondary">Registro de personas</h3> <!-- Título del formulario -->
      
      <!-- Sección PHP para incluir la lógica de registro -->
      <?php
      include "modelo/conexion.php"; // Conexión a la base de datos
      include "controlador/registro_persona.php"; // Controlador para registrar personas
      ?>
      
      <!-- Campo para ingresar el nombre -->
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label" required>Nombre</label>
        <input type="text" class="form-control" name="nombre">
      </div>

      <!-- Campo para ingresar el apellido -->
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label" require>Apellido</label>
        <input type="text" class="form-control" name="apellido">
      </div>

      <!-- Campo para ingresar el DNI -->
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label" require>DNI</label>
        <input type="text" class="form-control" name="dni">
      </div>

      <!-- Campo para ingresar la fecha de nacimiento -->
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label" require>Fecha de nacimiento</label>
        <input type="date" class="form-control" name="fecha">
      </div>

      <!-- Campo para ingresar el correo electrónico -->
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label" require>Correo</label>
        <input type="text" class="form-control" name="correo">
      </div>

      <!-- Botón para enviar el formulario -->
      <button type="submit" class="btn btn-primary" name="btnregistrar" value="okey listo">Registrar</button>
    </form>

    <!-- Tabla que muestra los registros de la base de datos -->
    <div class="col-6 p-5">
      <table class="table table-hover shadow-lg rounded">
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
          <!-- Sección PHP que consulta y muestra los datos de la base de datos -->
          <?php
          include "modelo/conexion.php"; // Conexión a la base de datos
          $sql = $conexion->query("select * from personas"); // Consulta SQL para obtener todas las personas
          
          // Bucle que recorre cada registro y lo muestra en una fila de la tabla
          while ($datos = $sql->fetch_object()) { ?>
            <tr>
              <td><?= $datos->id_persona ?></td> <!-- ID de la persona -->
              <td><?= $datos->nombre ?></td> <!-- Nombre de la persona -->
              <td><?= $datos->apellido ?></td> <!-- Apellido de la persona -->
              <td><?= $datos->dni ?></td> <!-- DNI de la persona -->
              <td><?= $datos->fecha_nacimiento ?></td> <!-- Fecha de nacimiento -->
              <td><?= $datos->email ?></td> <!-- Correo electrónico -->
              
              <!-- Botones para modificar o eliminar registros -->
              <td>
                <a href="modificar_personas.php?id=<?= $datos->id_persona ?>" class="btn btn-small btn-warning">
                  <i class="fa-solid fa-pen-to-square"></i> <!-- Ícono de editar -->
                </a>
                <!-- Botón de eliminar, con confirmación -->
                <a onclick="return eliminar()" href="index.php?id=<?= $datos->id_persona ?>" class="btn btn-small btn-danger">
                  <i class="fa-solid fa-trash"></i> <!-- Ícono de eliminar -->
                </a>
              </td>
            </tr>
          <?php }
          ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Incluye Bootstrap para manejar las funcionalidades dinámicas como el menú desplegable -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>