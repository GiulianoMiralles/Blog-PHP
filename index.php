<!--  muestra las publicaciones ordenadas de la mas reciente a la mas antigua -->

<?php
include('includes/header.php');
// obtener datos de las publicaciones con su categoria y usuario que la publico
$query = "
    SELECT * FROM publicaciones
	INNER JOIN users
	ON users.id = publicaciones.user_id
	INNER JOIN categorias
    ON categorias.id = publicaciones.categoria_id
    ORDER BY publicaciones.creado DESC
";
$result = mysqli_query($conection, $query);
?>
<div class="container">
    <hr>
    <div class="text-center">
    <h2 class="display-4">Últimas publicaciones</h2>
    </div>

    <?php
    // durante el "while" se muestran los datos que contiene "$result" 
    while ($row = mysqli_fetch_array($result)) { ?>
        <hr>
        <!-- un click sobre una publicacion envia el id de la misma a "publications_detail.php"
            para verla en detalle -->
        <div class="row text-center">
        <a href="autor_seleccionado.php?id=<?php echo $row[6] ?>" class="list-group-item list-group-item-dark  list-group-item-action">
                <div class="col md-4">
                    <img class="float-right avatar" src="<?php echo utf8_encode($row['avatar']) ?>">
                    <h6 class="float-right"> Publicado por: <?php echo utf8_encode($row['firstname']) . ' ' . utf8_encode($row['lastname']) ?></h6>
                </div>
            </a>
            <a href="detalle_publicacion.php?id=<?php echo $row[0] ?>" class="list-group-item list-group-item-action">
                <div class="col md-8">
                    <h6 class="display-4"> Categoria: <?php echo utf8_encode($row['nombre']) ?></h6>
                    <h3 class="display-4"> Titulo:<?php echo ($row['titulo']) ?></h3>
                    <h6 class="display-4"> Fecha de Publicacion: <?php echo substr(utf8_encode($row['creado']), 0, 11) . ' a las ' . substr(utf8_encode($row['creado']), 11, 23); ?></h6>
                    <h6 class="display-4"> Modificado por última vez: <?php echo substr(utf8_encode($row['actualizado']), 0, 11) . ' a las ' . substr(utf8_encode($row['actualizado']), 11, 23)  ?></h6>
                    <h5 class="display-4"> Descripcion:<?php echo ($row['descripcion']) ?></h5>
                </div>
            </a>

        </div>

    <?php } ?>
</div>




 <br>
<?php
  include('includes/footer.php');
?>

    </body>

</html>