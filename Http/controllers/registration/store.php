<?php

use Core\App;
use Core\Authenticator;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];

$errors = [];
if (!Validator::email($email)) {
   $errors['email'] = 'Molimo upišite valjanu email adresu.';
}

if (!Validator::string($password, 7, 255)) {
    $errors['password'] = 'Lozinka mora sadržavati od 7 do 255 znakova.';
}

if (! empty($errors)) {
    return view('registration/create.view.php', [
        'errors' => $errors
    ]);
}

$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();

if ($user) {
    header('location: /');
    exit();
} else {
    $db->query('INSERT INTO users(email, password, first_name, last_name) VALUES(:email, :password, :first_name, :last_name)', [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT),
        'first_name' => $firstName,
        'last_name' => $lastName
    ]);

    (new Core\Authenticator)->login($user);


    header('location: /');
    exit();
}
