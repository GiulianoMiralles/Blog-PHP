<?php
  include('includes/header.php');
?>
<body>

  <!-- Project Layout -->
  <div class="text-center">
    <h1 class="display-3">Seccion: Blog</h1>
    <p class="subtitle">Categorias del blog</p>
  </div>

  <br>
  <br>
  <br>
 <?php


$query = " SELECT * FROM categorias ";
$result = mysqli_query($conection, $query);
while ($row = mysqli_fetch_array($result)) { ?>
<div class="container">
  <div class="row">
    <div class="col">
      <div class="list-group text-center">
 <a href="categoria_elegida.php?id=<?php echo $row['id'] ?>" class="list-group-item list-group-item-action active" ><?php echo utf8_encode($row['nombre']) . '<br>' ?></a>
      </div>
    </div>
  </div>
</div>
<?php } ?>
  
  </section>
  <?php
    for ($i = 1; $i <= 5; $i++) {?>
        <br>
<?php        
    }
?>

<?php
  include('includes/footer.php');
?>

</body>

</html>
