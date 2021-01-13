<?php
include('includes/db.php');
include('includes/header.php');

if (isset($_GET['id'])) {
     // si puedo obtener el id del usuario lo asigno la variable id en la linea de abajo
     $id = $_GET['id'];
     // Obtengo la publicacion con su respectiva categoria y los datos del ususario que realizo la publicacion
    $query = "
        SELECT * FROM publicaciones
        INNER JOIN users
        ON users.id = publicaciones.user_id
        INNER JOIN categorias
        ON categorias.id = publicaciones.categoria_id
        WHERE users.id = $id
        ORDER BY publicaciones.creado DESC
        ";
    $result = mysqli_query($conection, $query);
    // si row es igual a 1 coincide con el id de la consulta
    if (mysqli_num_rows($result) >= 1) {
        ?>
        <div class="container"> 
        <?php
        $row2 = mysqli_fetch_array($result);
        ?>
        <hr>
            <h3> <?php echo  'Publicaciones de: '.($row2[9]).' '.($row2[10]); ?> </h3>
        <?php
        
        // muestro alguno datos con el while de la variable "$result" 
        $result = mysqli_query($conection, $query);
        while ($row = $row = mysqli_fetch_array($result)) { ?>
            <hr>
            <!-- Cuando hago click envio el id de la publiacacion a "detalle_publicacion.php" para ver los detalles -->
            <a href="detalle_publicacion.php?id=<?php echo $row[0] ?>" class="list-group-item list-group-item-action">
            <div class="row text-center">
                <div class="col md-8">
                    <h6 class="display-4"> Categoria: <?php echo utf8_encode($row['nombre']) ?></h6>
                    <h3 class="display-4"> Titulo: <?php echo ($row['titulo']) ?></h3>
                    <h6 class="display-4"> Fecha de Publicación: <?php echo substr(utf8_encode($row['creado']) , 0, 11) . ' a las ' . substr(utf8_encode($row['creado']) , 11, 23) ; ?></h6>
                    <h6 class="display-4"> última modificacion: <?php echo substr(utf8_encode($row['actualizado']) , 0, 11) . ' a las ' . substr(utf8_encode($row['actualizado']) , 11, 23)  ?></h6>
                    <h5 class="display-4"> Descripcion: <?php echo ($row['descripcion']) ?></h5>
                </div>
                <div class="col md-4">
                    <img class="float-right avatar" src="<?php echo utf8_encode($row['avatar']) ?>">
                    <h6 class="float-right"> Realizo por: <?php echo utf8_encode($row['firstname']) .' '. utf8_encode($row['lastname']) ?></h6>
                </div>
            </div>
        </a>
        <?php }
            } else {
                ?>
        <div class="container text-center">
            <pre></pre>
            <form class="p-3 mb-2 bg-light text-dark card card-body ">
                <pre></pre>
                <h4>No existen registros de publicacion del autor seleccionado.</h4>
                <a href="autores.php"><button type="button" class="btn btn-primary btn-lg btn-block"> Volver a la seccion autores.</button></a>
            </form>
            </div>

        </div>
<?php
    }
}

?>