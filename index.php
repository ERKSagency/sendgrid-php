<?php

#################################

/* ERKS agency */
/* erksagency.com */

/* Good Practices */
// -> Comparte tu código
// -> Escribe código limpio
// -> Usa buenas prácticas

#################################

// si usas composer (recomendado)
require('vendor/autoload.php');

// si no usas composer
// require("./sendgrid-php.php"); 

$email = new \SendGrid\Mail\Mail(); 

// quien envia
$email->setFrom("test@mail.com", "Test");

// asunto del mensaje
$email->setSubject("Enviar emails es divertido :)");

// destinatario
$email->addTo("test@mail.com", "Nombre");

// cuerpo del mensaje en texto plano
$email->addContent("text/plain", "-- mensaje en texto plano --");

// cuerpo del mensaje en HTML
$email->addContent(
    "text/html", "<div> -- mensaje en html -- </div>"
);

// aqui va el api key
$sendgrid = new \SendGrid('aqui va el API KEY de sendgrid');

try {
    $response = $sendgrid->send($email);
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}

?>
