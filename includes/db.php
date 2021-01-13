<!-- Hago la conexion a la base de datos y en caso de que me de error, me duvuelve el mismo en un mensaje-->

<?php

$conection = new mysqli("localhost", "root", "", "efi_php", 3306);
if ($conection->connect_errno) {
    echo "Error al intentar conectar con la base de datos: (" . $conection->connect_errno . ") " . $conection->connect_error;
}
?>