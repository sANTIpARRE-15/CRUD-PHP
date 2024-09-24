<?php
$page = isset($_GET['page']) ? $_GET['page'] : 2; // Detecta la página actual, por ejemplo ?page=1
?>

<?php  
// Incluimos el archivo que establece la conexión con la base de datos
include "modelo/conexion.php";

// Obtenemos el valor del parámetro 'id' de la URL utilizando el método GET
$id = $_GET["id"];

// Ejecutamos una consulta SQL para obtener los datos de la persona con el id proporcionado
$sql = $conexion->query("SELECT * FROM personas WHERE id_persona = $id");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="style.css">
    <!-- Establece el conjunto de caracteres como UTF-8 para admitir todos los caracteres -->
    <meta charset="UTF-8">
    <!-- Configura la visualización para que sea responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Título de la página -->
    <title>MODIFICAR</title>
    <!-- Incluye Bootstrap desde una CDN para los estilos y el diseño responsivo -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="page-<?php echo $page; ?>"> 
    
    <!-- Formulario para modificar los datos de la persona -->
    <form class="col-5 m-4 m-auto" method="post">
        <!-- Título del formulario -->
        <h3 class="text-center text-secondary">Modificar datos de la persona</h3>

        <!-- Campo oculto que guarda el ID de la persona (se usa para identificar a la persona a modificar) -->
        <input type="hidden" name="id" value="<?= $_GET["id"] ?>">

        <?php 
        // Incluimos el archivo que maneja la lógica para modificar los datos
        include "controlador/modificar_persona.php";

        // Bucle para mostrar los datos de la persona obtenida de la consulta SQL
        while ($datos = $sql->fetch_object()) { 
        ?>
        
        <!-- Campo para modificar el nombre de la persona -->
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label" required>Nombre</label>
            <input type="text" class="form-control" name="nombre" value="<?= $datos->nombre ?>">
        </div>

        <!-- Campo para modificar el apellido de la persona -->
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label" required>Apellido</label>
            <input type="text" class="form-control" name="apellido" value="<?= $datos->apellido ?>">
        </div>

        <!-- Campo para modificar el DNI de la persona -->
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label" required>DNI</label>
            <input type="text" class="form-control" name="dni" value="<?= $datos->dni ?>">
        </div>

        <!-- Campo para modificar la fecha de nacimiento de la persona -->
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label" required>Fecha de nacimiento</label>
            <input type="date" class="form-control" name="fecha" value="<?= $datos->fecha_nacimiento ?>">
        </div>

        <!-- Campo para modificar el correo electrónico de la persona -->
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label" required>Correo</label>
            <input type="text" class="form-control" name="correo" value="<?= $datos->email ?>">
        </div>

        <!-- Botón para enviar los datos modificados -->
        <button type="submit" class="btn btn-primary" name="btnregistrar" value="okey listo">Modificar</button>
        <br/>

        <?php   
        } // Cierra el bucle que muestra los datos de la persona
        ?>
    </form>

</body>
</html>