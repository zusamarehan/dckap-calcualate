<?php

$email = $_POST['email'];
$password = $_POST['password'];
// validate the input
// check whether the user exists or not
// if exists, create a session for him and redirect to /
// if not, throw an error


if ($email && $password) {
    // check whether the users already exists in the db
    $statement = $app['db']->query("select * from users where email='$email' and password='$password'");
    $exists = $statement->fetchAll();

    if ($exists) {
        $_SESSION['login'] = [
            'email' => $email
        ];

        header('Location: /');
    } else {
        $_SESSION['incorrect-credentials'] = 'Credentials does not match';
        header('Location: /login');
    }
}
