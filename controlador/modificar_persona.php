<?php 
// Verificamos si se ha presionado el botón "Registrar" (si se envió el formulario)
if (isset($_POST["btnregistrar"])) {
    
    // Comprobamos que todos los campos del formulario están llenos (nombre, apellido, dni, fecha y correo)
    if (!empty($_POST["nombre"]) && !empty($_POST["apellido"]) && !empty($_POST["dni"]) && !empty($_POST["fecha"]) && !empty($_POST["correo"])) {
        
        // Almacenamos los valores del formulario en variables
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $dni = $_POST["dni"];
        $fecha = $_POST["fecha"];
        $correo = $_POST["correo"];
        
        // Ejecutamos una consulta SQL para actualizar los datos de la persona en la base de datos
        $sql = $conexion->query("UPDATE personas SET nombre='$nombre', apellido='$apellido', dni='$dni', fecha_nacimiento='$fecha', email='$correo' WHERE id_persona=$id");

        // Si la consulta se ejecuta correctamente (si el valor de $sql es 1), redirigimos a la página principal (index.php)
        if ($sql == 1) {
            header("location:index.php");
        } else {
            // Si hay un error al modificar, mostramos un mensaje de error
            echo "<div class='alert alert-danger' role='alert'>Error al modificar datos</div>";
        }
        
    } else {
        // Si algún campo está vacío, mostramos una advertencia al usuario
        echo "<div class='alert alert-warning' role='alert'>Todos los campos deben estar registrados</div>";
    }
}
?>
