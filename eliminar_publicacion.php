<!-- aqui permito al ususario publicador borrar unicamente sus publicaciones -->

<?php 
    include('includes/db.php');

    if (isset($_GET['id'])){
        // si logro obtener el id desde publicacion lo guardo en una variable, en este caso, $(id)
        $id = $_GET['id'];  
        $query = "DELETE FROM publicaciones WHERE id = $id";  
        $result= mysqli_query($conection, $query);  

        if (!$result){
            die('Fallo el eliminado');
        }
        header("Location: publicaciones.php"); 
    }
