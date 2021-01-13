<link rel="stylesheet" href="css/login.css">
<?php
include('includes/header.php');
?>
<body>
  <section id="content">
    <hr>
    <form action="includes/forgot_includes.php" method="POST">
  <div class="login-wrap">
	<div class="login-html">
		<input  hidden id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab text-center" >Recuperar contraseña</label>
		<input type="hidden" id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab"></label>
		<div class="login-form">
			<div class="sign-in-htm">
                <hr>
                <p class="text-center text-white">Ingrese su correo electronico para poder recuperar su contraseña</p>
                <div class="group">
					<label for="email" class="label">Email</label>
					<input id="email" type="text" class="input" name="email">
				</div>
				<div class="group">
					<input type="submit" class="button" value="Recuperar contraseña">
				</div>
        <div class="hr"></div>
        </form>
			</div>
		</div>
	</div>
</div>
    <hr>
  </section>

<?php
  include('includes/footer.php');
?>
</body>

</html>
