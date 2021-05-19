<?php
$destinatario = "cacosta@awsoftware.mx";
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$mensaje = $_POST['mensaje'];

$contenido = "Nombre: " .$nombre.
"\nCorreo: " .$correo.
"\nMensaje: " .$mensaje;

mail($destinatario, "Han enviado un mensaje desde tu sitio web balam.com", $contenido);
