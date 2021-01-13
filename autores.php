<?php
include('includes/header.php');
include('includes/db.php');
// Traigos los datos de todos los usuarios
$query = " SELECT * FROM users ";
$result = mysqli_query($conection, $query); 

?>
<div class="container ">
  <div class="row text-center">
    <div class="col md-2">
    <h1 class="display-3">Seccion: Autores</h1>
    </div>
<?php

  while ($row = mysqli_fetch_array($result)) { ?>
<div id="users">
  <div class="container">
    <div class="row" >
      <div class="col-md-12" >
        <div class="list-group list" id="user-data" >
        <pre class="text-aling center-block">
        <a  href="autor_seleccionado.php?id=<?php echo $row['id'] ?>">
            <div class="col-md-10">
              <img src="<?php echo utf8_encode($row['avatar']) ?>" class="pull-left photo">
              <h4 class="list-group-item-heading name"><?php echo 'Nombre: ' . utf8_encode($row['lastname']) . ', ' . utf8_encode($row['firstname']) . '<br>' ?></h4>
              </pre>
            </div>
        </div>
      </div>
    </div>
  </div>
 
<?php } ?>

<style>

body {
  font-family: 'Source Sans Pro', sans-serif;
}
h1 {
  text-align:center;
}
.row {
  margin-top: 10px;
  margin-bottom: 10px;
}

pre{
  width: 50%;
  border-radius: 50px;
  border-color: #000000;
  background-color: rgb(235, 225, 225);
  
}

.photo {
  border-radius: 45px;
  margin-right: 20px;
  width: 90px;
  height:90px;
}
.form-control { 
  width:30%;
  display: inline-block;
  margin-right:10px;
}
.name {
  font-weight: 700;
}

</style>