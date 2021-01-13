
<!-- Bootstrap -->
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/login.css">

<?php
include('includes/header.php');
?>
<br>
<?php

$email_user = ($_SESSION['email']);
$id_user = ($_SESSION['user_id']) ;

if (isset($_SESSION['user_id'])) { ?>
    <?php
        // obtener datos del usuario que esta logueado.
        $query = " SELECT * FROM users WHERE users.email = '$email_user'  ";
        $result = mysqli_query($conection, $query); //Sentencia = Selecciono todos los elementos de la tabla Task//Ejecuto la consulta y lo guardo en Result_task//mientras hay tareas en las filas de  que haga lo siguiente

        ?>
<?php
                // durante el "while" se muestran los datos que contiene "$result"
                while ($row = mysqli_fetch_array($result)) { ?>

    <div class="login-wrap">
        <div class="login-html">
          <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Datos de: <?php echo utf8_encode($row['firstname']) . ' ' . utf8_encode($row['lastname']); ?></label>
          <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab"></label>
          <div class="login-form">
            <div class="sign-in-htm">
            <div class="group">
                <label for="nombre" class="label">Nombre</label>
                <input id="nombre" type="text" name="nombre" class="input" value="<?php echo utf8_encode($row['firstname']) ?>" readonly>
              </div>
              <div class="group">
                <label for="apellido" class="label">Apellido</label>
                <input id="apellido" type="text" name="apellido" class="input" value="<?php echo utf8_encode($row['lastname']) ?>" readonly>
              </div>
              <div class="group">
                <label for="email" class="label">Email</label>
                <input id="email" type="text" name="email" class="input" value="<?php echo utf8_encode($row['email']) ?>" readonly>
              </div>


                <br>
                   
            <?php }
            } ?>
            </div>
        </div>
    </div>
 


