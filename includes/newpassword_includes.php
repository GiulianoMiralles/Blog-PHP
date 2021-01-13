<!-- newpassword_includes.php  genera una nueva contraseña aleatoria en este caso de 7 caracteres -->

<?php

function password_generate($chars){
  $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
  return substr(str_shuffle($data), 0, $chars);
}

$new_password = password_generate(7);


// www.w3resource.com/php-exercises/php-string-exercise-9.php 