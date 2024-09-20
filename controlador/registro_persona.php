<?php
// Verificamos si se ha presionado el botón "Registrar" (si se envió el formulario)
if (isset($_POST["btnregistrar"])) {

    // Comprobamos que todos los campos del formulario están llenos (nombre, apellido, dni, fecha y correo)
    if (!empty($_POST["nombre"]) && !empty($_POST["apellido"]) && !empty($_POST["dni"]) && !empty($_POST["fecha"]) && !empty($_POST["correo"])) {
        
        // Almacenamos los valores del formulario en variables
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $dni = $_POST["dni"];
        $fecha = $_POST["fecha"];
        $correo = $_POST["correo"];
        
        // Ejecutamos una consulta SQL para insertar los datos en la base de datos
        $sql = $conexion->query("INSERT INTO personas(nombre, apellido, dni, fecha_nacimiento, email) 
                                 VALUES ('$nombre', '$apellido', '$dni', '$fecha', '$correo')");

        // Si la consulta se ejecuta correctamente, mostramos un mensaje de éxito
        if ($sql == 1) {
            echo "<div class='alert alert-success' role='alert'>Los datos fueron registrados correctamente</div>";
        } else {
            // Si ocurre un error al registrar, mostramos un mensaje de error
            echo "<div class='alert alert-danger' role='alert'>Error al registrar los datos</div>";
        }
        
    } else {
        // Si algún campo está vacío, mostramos una advertencia al usuario
        echo "<div class='alert alert-warning' role='alert'>Todos los campos deben estar registrados</div>";
    } ?>
     <script>
    // Esta línea de JavaScript reemplaza el estado de la historia del navegador sin recargar la página.
    // history.replaceState() cambia la URL actual, eliminando cualquier parámetro GET sin afectar el historial de navegación.
    // null: No se cambia el estado.
    // null: No se modifica el título de la página.
    // location.pathname: Mantiene la URL base (sin parámetros) sin recargar la página.
    history.replaceState(null, null, location.pathname);
    </script>


  <?php }
?>




