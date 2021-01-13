<?php
// Importar clases PHPMailer en el espacio de nombres global
// Deben estar en la parte superior de su script, no dentro de una función
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Cargar el autocargador de Composer
require 'vendor/autoload.php';
 
// La creación de instancias y pasar `verdadero` permite excepciones
$mail = new PHPMailer(true);

try {
//Configuración del servidor
$mail->SMTPDebug = SMTP::DEBUG_SERVER; // Habilitar salida de depuración detallada
$mail->isSMTP(); // Enviar usando SMTP
$mail->Host = 'smtp.gmail.com'; // Configure el servidor SMTP para enviar a través de
$mail->SMTPAuth = true; // Habilitar autenticación SMTP
$mail->Username = 'efi.php.2019.gmiralles@gmail.com'; // Nombre de usuario SMTP
$mail->Password = 'efiphp2019'; // Contraseña SMTP
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Habilitar el cifrado TLS; `PHPMailer :: ENCRYPTION_SMTPS` también aceptado
$mail->Port = 587; // Puerto TCP para conectarse

//Destinatarios
$mail->setFrom('efi.php.2019.gmiralles@gmail.com');
$mail->addAddress($email,$email); // Añadir un destinatario


// Contenido
$mail->isHTML(true); // Establecer formato de correo electrónico a HTML
$mail->Subject = 'Bienvenido al blog de PHP de Miralles';
$mail->Body = "Gracias por su registro, a continuación estan sus datos de acceso de su nueva cuenta.
                *Usuario (E-mail): {$email}   
                *Contraseña: {$password_for_email}" ;
 
$mail->AltBody = ' ';
$mail->SMTPDebug = 0; // Desactiva el modo depuracion
$mail->send(); // Mensaje de exito/error
echo 'el mensaje ha sido enviado';
} catch (Exception $e) {
echo "El mensaje no pudo ser enviado. Error de envío: {$mail->ErrorInfo}";
}