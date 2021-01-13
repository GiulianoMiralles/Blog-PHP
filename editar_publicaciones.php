<!-- aqui el ususario registrado podra editar su  publicacion-->

<?php
include('includes/db.php');
include('includes/header.php');

if (isset($_GET['id'])) {
    // si obtengo de publicaciones.php los id los asigno a varaibles
    $id = $_GET['id']; 

    $query = "SELECT * FROM publicaciones WHERE id = $id";
    $result = mysqli_query($conection, $query);
    // si el numerode row es igual a 1, el id de consulta coincide
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result); 
        $titulo = $row['titulo'];         
        $descripcion = $row['descripcion'];
        $imagen = $row['image'];
        $categoryID = $row['categoria_id'];

    }

    if (isset($_POST['update'])) { // si recibo las varaibles a traves de method 'POST'
        $id = $_GET['id']; 
        // Estos datos son obtendios del mismo formulario
        $titulo = $_POST['titulo']; 
        $descripcion = $_POST['descripcion'];
        $imagen = $_POST['imagen'];
        $categoryID = $_POST['categoria_id'];
        date_default_timezone_set('America/Buenos_Aires');
        $date_update = date("Y-m-d H:i:s");           // https://www.php.net/manual/es/function.date.php
        // reescribo los campos en la base de datos
        $query = "UPDATE publicaciones set titulo = '$titulo' , descripcion ='$descripcion', image = '$imagen', categoria_id ='$categoryID',  actualizado ='$date_update' WHERE id = $id"; 
        mysqli_query($conection, $query);  

        header('Location: publicaciones.php');
    }
}
?>

<br>
<!-- aqui el formulario de ediccion -->


<div class="container p-4">
    <div class="row ">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <!-- los datos de este form seran enviado al mismo archivo (editar.php) con los nuevos datos , conservando solo el id -->
                <form action="editar_publicaciones.php?id=<?php echo $_GET['id']; ?> " method="POST">
                    <div class="form-group">
                        Título: <input maxlength="55" type="text" name="titulo" id="" value='<?php echo $titulo ?>' class="form-control" placeholder="Editar">
                        <br>
                        Descripción: <input maxlength="244" type="text" name="descripcion" id="" value='<?php echo $descripcion ?>' class="form-control" placeholder="Editar">
                        <br>
                        Imagen: <input maxlength="244" type="text" name="imagen" id="" value='<?php echo $imagen ?>' class="form-control" placeholder="Editar">
                        <br>
                    </div>
                    <div class="form-group">
                <label>Categoria:</label>
                <select name="categoria_id">
                <?php
                $query = " SELECT * FROM categorias ";
                $result = mysqli_query($conection, $query);  

                while ($row = mysqli_fetch_array($result)) { ?>
                                                                    <!-- https://programadorwebvalencia.com/cursos/php/condicionales/ -->
                <option value="<?php echo $row['id'] ?>" <?php echo ($row['id']== $categoryID) ? 'selected': ''; ?> > <?php echo utf8_encode($row['nombre'])?> </option> 
                    
                <?php } ?>
      
                </select>
            </div>
                    <button class="btn btn-primary btn-lg btn-block " name="update">
                        Guardar cambios
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
    for ($i = 1; $i <= 9; $i++) {?>
        <br>
<?php        
    }
?>

<?php
    include('includes/footer.php');
?>


