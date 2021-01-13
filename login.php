<link rel="stylesheet" href="css/login.css">
<?php
include('includes/header.php');
?>
  <section id="content">
    <hr>


    <form action="includes/login.php" method="POST">
      <div class="login-wrap">
        <div class="login-html">
          <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Iniciar sesión</label>
          <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Registrarme</label>
          <div class="login-form">
            <div class="sign-in-htm">
              <div class="group">
                <label for="pass" class="label">Email</label>
                <input id="pass" type="text" name="email" class="input" required>
              </div>
              <div class="group">
                <label for="pass" class="label">Contraseña</label>
                <input id="pass" type="password" class="input" name="password" data-type="password" required>
              </div>
              <div class="group">
                <input type="submit" class="button" value="Iniciar sesion">
              </div>
    </form>


    <div class="hr"></div>
    <div class="foot-lnk" >
      <a href="forgot.php">¿Se te olvidó tu contraseña?</a>
    </div>
    </div>
    <form action="includes/register.php" method="POST">
      <div class="sign-up-htm">
        <div class="group">
          <label for="user" class="label">Nombre</label>
          <input id="user" type="text" name="nombre" class="input" required>
          <label for="Surname" class="label">Apellido</label>
          <input id="Surname" type="text" name="apellido" class="input" required>
        </div>
        <div class="group">
          <label for="pass" class="label">Contraseña</label>
          <input id="pass" type="password" class="input" name="password" data-type="password" required>
          <label for="pass" class="label">Repita su Contraseña</label>
          <input id="pass" type="password" class="input" name="password2" data-type="password" required>
        </div>
        <div class="group">
          <label for="email" class="label">Email</label>
          <input id="email" type="email" name="email" class="input" required>
          <label for="genero" class="label">Genero</label>
          <input id="genero" type="radio" name="avatar"  value="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTFpAZq2cySRRYaBLuGkvdWMMEmbUuHK5PWHwW_h3R6iQQKeZqEmg&s" class="input" required> Masculino
          <input id="genero" type="radio" name="avatar" value="https://www.bellatores.cl/wp-content/uploads/2018/01/Avatar-Mujer.png" class="input" required> Femenino
        </div>
        <br>
        <div class="group">
          <input type="submit" class="button" value="Registrarme">
        </div>
      </div>
      </div>
      </div>
      </div>
      </form>
      <hr>
  </section>
<br>
<br>
  <?php
  include('includes/footer.php');
?>
</body>

</html>