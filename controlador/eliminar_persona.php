<?php
// Verificamos si el parámetro 'id' existe en la URL y no está vacío
if (!empty($_GET["id"])) {
   // Guardamos el valor del 'id' que recibimos en la variable $id
   $id = $_GET["id"];
   
   // Ejecutamos una consulta SQL para eliminar el registro de la tabla 'personas' donde el 'id_persona' coincide con el valor de $id
   $sql = $conexion->query("DELETE FROM personas WHERE id_persona = $id");

   // Si la consulta se ejecuta correctamente ($sql == 1), mostramos un mensaje de éxito
   if ($sql == 1) {
       echo "<div class='alert alert-success' role='alert'>La persona se eliminó correctamente</div>";
   } else {
       // Si la consulta falla, mostramos un mensaje de error
       echo "<div class='alert alert-danger' role='alert'>Hubo un error</div>";
   }
}
?>