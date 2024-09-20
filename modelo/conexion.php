<?php 
// Creamos una nueva conexión a la base de datos usando MySQLi
// "localhost" es el servidor local, "root" es el usuario, "" es la contraseña (vacía por defecto),
// y "crud" es el nombre de la base de datos a la que nos conectamos.
$conexion = new mysqli("localhost", "root", "", "crud");

// Establecemos el formato de caracteres UTF-8 para asegurarnos de que los caracteres especiales (como acentos) se manejen correctamente.
$conexion->set_charset("utf8");