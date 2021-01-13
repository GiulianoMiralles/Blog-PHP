<?php
include 'db.php'; // importo la conexion a la base de datos

// obtener datos del formulario enviados por el metodo a post del archivo login.php
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
$avatar = $_POST['avatar'];

// control de que las dos contraseñas coincidan 
if ($password !== $password2) {  
    $_SESSION['error'] = 'no hay coincidencia en las contraseñas';
    header("location: ../login.php");
    } else {
        // verifico que el email ingresado no haya sido registrado antes por otro usuario
        $query = "SELECT * from users where email='$email'";
        $consult = mysqli_query($conection, $query);
        $result = mysqli_fetch_array($consult);

        if ($result['email'] == $email) {  
            $_SESSION['error'] = 'Lo sentimos, al parecer este email ya pertenece a otro usuario, pruebe con otra direccion de correo.';
            header("location: ../login.php");
        } else {
            // Una vez verificados los datos los inserto en la base de datos
            $password_for_email = $password;
            $password = md5($password_for_email);
            $query = "INSERT INTO users (firstname, lastname, password, email, avatar) values('$nombre','$apellido','$password','$email','$avatar')";
            $consulta = mysqli_query($conection, $query);
            ?>
            <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title> Registro exitoso!</title>
              <!-- Bootstrap -->
            <link href="css/bootstrap.min.css" rel="stylesheet">
            <link rel="stylesheet" href="css/font-awesome.min.css" />
            <link rel="stylesheet" href="css/font-awesome.css" />
            <link rel="stylesheet" href="js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
            <link rel="stylesheet" type="text/css" href="css/isotope.css" media="screen" />
            <link rel="stylesheet" href="css/style.css">
        </head>
        <body>
        <div class="row p-3 mb-2 bg-light text-dark card card-body ">
            <div class="col-md-3"></div>
            <div class="col-md-6">
            <div class="d-none"><?php include('../email/email_register.php'); ?></div>
            <h3 class="display-4"> Usuario registrado con éxito. </h3>
            <h4 class="display-4">Le hemos enviado un correo a su email, proporcionandole los datos de acceso.</h4>
            <a href="../login.php"><button class="btn btn-primary btn-lg btn-block"> Ir a login</button></a>
            </div>
            <div class="col-md-3"></div>
        </div>
        </body>
        </html>

<?php
    };
};
?>
 