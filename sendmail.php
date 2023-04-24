
<?php
$mail_host = "ventas@perfilarteweb.com.ar, ventas@perfilarteweb.com.ar, alan@lgiroldi.com.ar, leo@lgiroldi.com.ar ";
$mail_title = "Mensaje desde la web de Perfilarte";

define("MAIL_HOST", $mail_host);
define("MAIL_TITLE", $mail_title);

$name = "";
$email_from = "";
$message = "";
$phone = "";
$mail_body = "";

if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $mail_body = "<h3>Nombre: " . $name . "</h3>";
}


if (isset($_POST['email'])) {
    $email_from = $_POST['email'];
    $mail_body .= "<h3>Email: " . $email_from . "</h3>";
}

if (isset($_POST['phone'])) {
    $phone = $_POST['phone'];
    $mail_body .= "<h3>Teléfono: </h3><p>" . $phone . "</p>";
}

if (isset($_POST['message'])) {
    $message = nl2br($_POST['message']);
    $mail_body .= "<h3>Mensaje: </h3><p>" . $message . "</p>";
}


if( isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message']) ){
    $headers = "From: $email_from\nMIME-Version: 1.0\nContent-type: text/html; charset=iso-8859-1\n";
    if( mail($mail_host, $mail_title, $mail_body, $headers) ) {
        $serialized_data = 'A la brevedad nos pondremos en contacto.';
        echo $serialized_data;
    } else {
        $serialized_data = 'Por favor intentelo nuevamente.';
        echo $serialized_data;
    }
};

?>