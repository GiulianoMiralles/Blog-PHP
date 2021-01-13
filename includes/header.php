<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>EFi PHP</title>
  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/font-awesome.min.css" />
  <link rel="stylesheet" href="css/font-awesome.css" />
  <link rel="stylesheet" href="js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
  <link rel="stylesheet" type="text/css" href="css/isotope.css" media="screen" />
  <link rel="stylesheet" href="css/style.css">

</head>
<?php
include 'includes/db.php';
session_start();
if (isset($_SESSION['email'])) { ?>

  <body>
    <header>
      <div class="main-menu">
        <div class="container">
          <div class="row">
            <div class="col-md-4">
              <h1><a class="navbar-brand" href="index.php" data-0="line-height:90px;" data-300="line-height:50px;"> EFI PHP
                </a></h1>
            </div>
            <div class="col-md-8">
              <div class="dropdown">
                <ul class="nav nav-pills">
                <li class="active"><a href="index.php">Inicio</a></li>
                  <li><a href="blog.php">Blog</a></li>
                  <li><a href="autores.php">Autores</a></li>
                  <li><a href="publicaciones.php">Publicaciones</a></li>
                  <li><a href="perfil.php">Mi perfil (<?php echo $_SESSION['firstname']; ?>) </a></li>
                  <li><a href="includes/log_out.php">Cerrar sesion</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>


  <?php
  } else {
    ?>


    <body>
      <header>
        <div class="main-menu">
          <div class="container">
            <div class="row">
              <div class="col-md-4">
                <h1><a class="navbar-brand" href="index.php" data-0="line-height:90px;" data-300="line-height:50px;"> EFI PHP
                  </a></h1>
              </div>
              <div class="col-md-8">
                <div class="dropdown">
                  <ul class="nav nav-pills">
                    <li class="active"><a href="index.php">Inicio</a></li>
                    <li><a href="blog.php">Blog</a></li>
                    <li><a href="login.php">Login - Registro</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </header>
    <?php
    }
    ?>