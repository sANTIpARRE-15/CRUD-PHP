<?php 
if (isset($_POST["btnregistrar"])) {
    if (!empty($_POST["nombre"])and !empty($_POST["apellido"]) and !empty($_POST["dni"])and !empty($_POST["fecha"])and !empty($_POST["correo"])){
        $id=($_POST["id"]);
        $nombre=($_POST["nombre"]);
        $apellido=($_POST["apellido"]);
        $dni=($_POST["dni"]);
        $fecha=($_POST["fecha"]);
        $correo=($_POST["correo"]);
        $sql=$conexion->query("update personas set nombre='$nombre', apellido='$apellido', dni='$dni', fecha_nacimiento='$fecha', email='$correo' where id_persona=$id ");

        if ($sql==1) {
        header("location:index.php");
        } else {
            echo"<div class='alert alert-danger' role='alert'>Error al modificar datos</div>";

        }
        
   } else {
    echo"<div class='alert alert-warning' role='alert'>Todos los campos deben estar registrados</div>";
   }
}
?>