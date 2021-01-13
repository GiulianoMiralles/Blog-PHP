<!--  obtengo de add_pulicacion los datos para crear una nueva publicacion y escribir los datos en la base de datos -->

<?php 
include 'db.php';
session_start();
$email_user = $_SESSION['email'];
$query = " SELECT id FROM users WHERE email = '$email_user' ";
$result = mysqli_query($conection, $query); 
 
while ($row = mysqli_fetch_array($result)) {    
    $id_user = $row['id'];
} 

// obtener datos de add_publicacion.php
$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$imagen = $_POST['imagen'];
$categoria =  $_POST['categoria'];

// hago la insercion de los datos anteriores en la base de datos
$query = "INSERT INTO publicaciones (titulo, descripcion, image, user_id, categoria_id) values('$titulo','$descripcion','$imagen','$id_user','$categoria')";
$consulta = mysqli_query($conection, $query);
header("location: ../publicaciones.php");

?>
