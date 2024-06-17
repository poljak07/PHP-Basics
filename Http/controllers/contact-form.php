<?php

use Core\Validator;

$email = htmlspecialchars($_POST['email']);
$ime = htmlspecialchars($_POST['ime']);
$poruka = htmlspecialchars($_POST['poruka']);
$errors = [];

$to = "contact@domagojpoljakovic.com";
$subject = "Nova poruka sa kontakt forme";
$message = "Ime: $ime\nEmail: $email\nPoruka:\n$poruka";
$headers = "Od: $email";


if (!Validator::email($email)) {
    $errors['email'] = 'Molimo napišite važeću email adresu.';
}

if (!Validator::string($poruka, 7, 512)) {
    $errors['poruka'] = 'Molimo napišite poruku ne kraću od 7 te ne dužu od 512 znakova.';
}

mail($to, $subject, $message, $headers);

?>