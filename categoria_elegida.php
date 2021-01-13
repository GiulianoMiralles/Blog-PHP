<!--  Aqui visualizo las publicaciones de la categoria seleccionada -->

<?php
include('includes/db.php');
include('includes/header.php');

if (isset($_GET['id'])) {
    //si obtengo el id de perfil.php lo guardo en una variable
    $id = $_GET['id'];
    // ontengo las publicaciones con sus respectiva categoria y datos del usuario que realizo el post haciendo un inner join
    $query = "
        SELECT * FROM publicaciones
        INNER JOIN users
        ON users.id = publicaciones.user_id
        INNER JOIN categorias
        ON categorias.id = publicaciones.categoria_id
        WHERE categorias.id = $id
        ORDER BY publicaciones.creado DESC
        ";
    $result = mysqli_query($conection, $query);
//
    if (mysqli_num_rows($result) >= 1) {
        ?>
        <div class="container text-center">
            <?php
            
             
            $row2 = mysqli_fetch_array($result);
            ?>
            <hr>
                <h3> <?php echo  'Publicaciones de: '.($row2['nombre']); ?> </h3>
            <?php
            
  
            $result = mysqli_query($conection, $query);

            while ($row = $row = mysqli_fetch_array($result)) { ?>
                <hr>
                <!-- haciendo click en la publicacion me enia a detalle_publicacion.php para ver los detalles enviando el id del psot-->
                <a href="detalle_publicacion.php?id=<?php echo $row[0] ?>" class="list-group-item list-group-item-action">
                    <div class="row ">
                        <div class="col md-8">
                            <h6 class="display-4"> Categoria: <?php echo utf8_encode($row['nombre']) ?></h6>
                            <h3 class="display-4"> Titulo: <?php echo ($row['titulo']) ?></h3>
                            <h6 class="display-4"> Fecha de Publicacion: <?php echo substr(utf8_encode($row['creado']) , 0, 11) . ' a las ' . substr(utf8_encode($row['creado']) , 11, 23) ; ?></h6>
                    <h6> última modificacion: <?php echo substr(utf8_encode($row['actualizado']) , 0, 11) . ' a las ' . substr(utf8_encode($row['actualizado']) , 11, 23)  ?></h6>
                            <h5 class="display-4"> Descripcion: <?php echo  ($row['descripcion']) ?></h5>
                        </div>
                        <div class="col md-4">
                            <img class="float-right avatar" src="<?php echo utf8_encode($row['avatar']) ?>">
                            <h6 class="float-right display-4"> publicado por: <?php echo utf8_encode($row['firstname']) . ' ' . utf8_encode($row['lastname']) ?></h6>
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
                    <h4>No existen publicaciones aun en esta categoria</h4>
                    <a href="/Efi%20PHP/blog.php"><button type="button" class="btn btn-primary btn-lg btn-block"> Volver a la secccion blog </button></a>
                </form>
            </div>
        </div>
<?php
    }
}

?>
