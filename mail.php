<?php
if($_SERVER['REQUEST_METHOD'] != 'POST' ){
    header("Location: index.html" );
}

require 'phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

// Configuración SMTP
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'soporte@kerneltech.dev';
$mail->Password = 'hqyycwyzurppkzco';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

// Parámetros de envío
$mail->setFrom('Susana@aitue.net', 'Aitue Telecomunicaciones');
$mail->addAddress('Susana@aitue.net', 'Susana');
$mail->addAddress('cristian@suprads.com', 'Cristian');
$mail->isHTML(true);

// Recuperación de datos del formulario
$nombre = $_POST['name'];
$email = $_POST['email'];
$ciudad = isset($_POST['city']) ? $_POST['city'] : 'No especificada';
$telefono = isset($_POST['phone']) ? $_POST['phone'] : 'No especificado'; // Nuevo campo para el teléfono
$internet_residencial = isset($_POST['residencial']) ? $_POST['residencial'] : 'No seleccionado';
$internet_corporativo = isset($_POST['corporativo']) ? $_POST['corporativo'] : 'No seleccionado';
$alquiler_equipos = isset($_POST['equipos']) ? $_POST['equipos'] : 'No seleccionado';
$otro = isset($_POST['otro']) ? $_POST['otro'] : 'No seleccionado';
$mensaje = $_POST['message'];

// Construcción del cuerpo del correo
$mail->Subject = 'Mensaje de Aitue Telecomunicaicones';
$mail->Body = "Nombre: $nombre<br>Email: $email<br>Ciudad: $ciudad<br>Teléfono: $telefono<br>Internet Residencial: $internet_residencial<br>Internet Corporativo: $internet_corporativo<br>Alquiler Equipos: $alquiler_equipos<br>Otro: $otro<br>Mensaje: $mensaje";

// Envío del correo y verificación
if(!$mail->send()) {
    echo 'No se pudo enviar el mensaje.';
    echo 'Error del mailer: ' . $mail->ErrorInfo;
} else {
    echo 'El mensaje ha sido enviado.';
    header("Location: gracias.html");
}
?>
