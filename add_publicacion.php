<?php
include('includes/db.php');
include('includes/header.php');
?>
        <!-- los datos de este formulario los envio  a "add_publicacion_includes.php" -->
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <br>
        <div class="text-center">
        <h3 class="display-4">Agregar una nueva publicacion</h3>
        </div>
        <form action="includes/add_publicacion_includes.php" method="POST" class="p-3 mb-2 bg-light text-dark card card-body registrarAdm">
            <div class="form-group ">
                <label>Titulo de la publicacion:</label>
                <input maxlength="55" type="text" class="form-control" name="titulo" placeholder="Asignele un titulo a la publicacion">
            </div>
            <div class="form-group ">
                <label>Descripcion:</label>
                <input maxlength="244"  type="text" class="form-control" name="descripcion" placeholder="ingrese una descripcion a la publicacion">
            </div>
            <div class="form-group">
                <label>Imagen:</label>
                <input maxlength="244" type="text" class="form-control" name="imagen" placeholder="inserte una url para asignarle una imagen a su publicacion">
            </div>
            <!-- Hago un select dinamico trayendo las categorias de la base de datos -->
            <div class="form-group">
                <label>Categoria:</label>
                <select name="categoria">
                <?php
                $query = " SELECT * FROM categorias ";
                $result = mysqli_query($conection, $query);  

                while ($row = mysqli_fetch_array($result)) { ?>
  
                <option value="<?php echo $row['id'] ?>" > <?php echo utf8_encode($row['nombre'])?> </option>

                <?php } ?>
      
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-success btn-lg btn-block">Añadir</button>
            </div>
        </form>
    </div>
    <div class="col-md-3"></div>
</div>
<?php
    for ($i = 1; $i <= 6; $i++) {?>
        <br>
<?php        
    }
?>

<?php
  include('includes/footer.php');
?>
