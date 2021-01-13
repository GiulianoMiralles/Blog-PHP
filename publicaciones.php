<!-- Aqui permito ver las publicacion del propio ususario (login requerido) -->

<?php
include('includes/header.php');
$email_user = ($_SESSION['email']);
$id_user = ($_SESSION['user_id']) ;

if (isset($_SESSION['user_id'])) { ?>
    <?php
    // hago un inner join para obtener los datos y la publicaciones del ususario ya logueado.
        $query = "
            SELECT *            
            FROM publicaciones
            INNER JOIN users
            ON users.id = publicaciones.user_id
            INNER JOIN categorias
            ON categorias.id = publicaciones.categoria_id
            WHERE users.id = '$id_user' 
            ORDER BY publicaciones.creado DESC
        ";
        $result = mysqli_query($conection, $query);
        ?>
    <div class="container">
        <div class="row">
            <div class="col md-6 text-center">
                <h2 class="display-4">Mis publicaciones </h2>
            </div>
            <div class="col md-6">
                <a href="add_publicacion.php" class="btn btn-dark btn-lg btn-block"> Agregar publicación </a>
            </div>
        </div>
        <br>
        <div class="row list-group-item list-group-item-action">
            <?php

            if (mysqli_num_rows($result) < 1) { ?>
                <div class="row ">
                <div class="col md-8">
                    
                    <h5><?php echo ('No has realizado ninguna publicación.') ?></h5>
                </div>
                <div class="col md-4">
                     
                </div>
            </div>  <?php
            }
                // al hacerle click envio el ID de la publicacion seleccionado
                // a "detalle_publicaciones.php", para ver en detalle la publicacion seleccionada
                while ($row = mysqli_fetch_array($result)) { ?>
                <a href="detalle_post.php?id=<?php echo $row[0] ?>" class="list-group-item list-group-item-action">
                    <div class="row text-center">
                        <div class="col md-8">
                            <h6 class="display-4"> Categoría: <?php echo ($row['nombre']) ?></h6>
                            <h3 class="display-4"> Titulo:<?php echo ($row['titulo']) ?></h3>
                            <h6 class="display-4"> Fecha de publicacion: <?php echo substr(utf8_encode($row['creado']) , 0, 11) . ' a las ' . substr(utf8_encode($row['creado']) , 11, 23) ; ?></h6>
                            <h6 class="display-4"> última modificacion: <?php echo substr(utf8_encode($row['actualizado']) , 0, 11) . ' a las ' . substr(utf8_encode($row['actualizado']) , 11, 23)  ?></h6>
                            <h5 class="display-4">Descripcion: <?php echo ($row['descripcion']) ?></h5>
                        </div>
                        <div class="col md-4">
                            <img class="float-right avatar" src="<?php echo ($row['avatar']) ?>">
                            <h6 class="float-right"> Realizado por: <?php echo  ($row['lastname']) . ', ' . ($row['firstname']) ?></h6>
                        </div>
                    </div>
                </a>

                <a href="editar_publicaciones.php?id=<?php echo $row[0] ?>&id_cate=<?php echo ($row["categoria_id"]); ?>" class="btn btn-primary btn-lg btn-block"> Editar </a>

                <a onclick="return confirmDelete();" href="eliminar_publicacion.php?id=<?php echo $row[0] ?>" class="btn btn-danger btn-lg btn-block delete"> Eliminar </a>
                <br>
                <?php }
    } ?>
        </div>
    </div>

<!-- funcion para confirmar la eliminacion de una publicacion -->
<script type="text/javascript">
    function confirmDelete() {
        var confirmar = confirm("¿Realmente desea eliminarla? ");
        if (confirmar) {
            return true;
        } else {
            return false;
        }
    }
</script>

<?php
 // include('includes/footer.php');
?>