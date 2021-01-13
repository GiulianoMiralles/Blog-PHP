<!-- Aqui visualizo el detalle de la publicacion seleccionada-->

<?php
include('includes/db.php'); 
include('includes/header.php');
if (isset($_GET['id'])) {
    // si obtengo el id de la publiacacion del archivo publicacion.php lo asigno a la varible $id debajo
    $id = $_GET['id']; 
    // hago un inner join para obtener todos los datos de la publicacion
    $query = "
    SELECT * FROM publicaciones  
    INNER JOIN categorias 
    ON categorias.id = publicaciones.categoria_id
    INNER JOIN users
    ON users.id = publicaciones.user_id
    WHERE publicaciones.id = $id   
    ";
    $result = mysqli_query($conection, $query);

    // si row es igual 1, entonces un id coincide con la consulta
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result); 
        // guardo los datos que me hacen falta en variables
        $titulo = $row['titulo'];           
        $descripcion = $row['descripcion'];
        $imagen = $row['image'];
        $fecha = $row['creado'];
        $categ = $row['nombre'];
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];        
    }
}
?>

<!-- una vez que ya tengo los datos, los muestro -->
<div class="container p-4">
    <div class="row">
        <div class="col-md-12">
        <hr>
        <a class="list-group-item list-group-item-action">
            <div class="row text-center">
                <div class="col md-8">
                    <h6 class="display-4"> Categoria: <?php echo utf8_encode($row['nombre']) ?></h6>
                    <h3 class="display-4"> Titulo: <?php echo ($row['titulo']) ?></h3>
                    <h6 class="display-4"> Fecha de publicacion: <?php echo substr(utf8_encode($row['creado']) , 0, 11) . ' a las ' . substr(utf8_encode($row['creado']) , 11, 23) ; ?></h6>
                    <h6 class="display-4"> ultima modificacion: <?php echo substr(utf8_encode($row['actualizado']) , 0, 11) . ' a las ' . substr(utf8_encode($row['actualizado']) , 11, 23)  ?></h6>
                    <h5 class="display-4"> Descripcion: <?php echo ($row['descripcion']) ?></h5>
                </div>
                <div class="col md-4">
                    <img class="float-right images" src="<?php echo utf8_encode($row['image']) ?>">
                    <br><br><br>
                    <img class="float-right avatar" src="<?php echo utf8_encode($row['avatar']) ?>">
                    <h6 class="float-right"> Publicado por: <?php echo utf8_encode($row['firstname']) .' '. utf8_encode($row['lastname']) ?></h6>
                </div>
            </div>
        </a>
        </div>
    </div>
</div>

<br>

<?php
  include('includes/footer.php');
?>
