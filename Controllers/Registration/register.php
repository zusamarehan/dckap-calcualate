<?php

unset($_SESSION['user-already-exists-error']);

$email = $_POST['email'];
$password = $_POST['password'];

// validate
if ($email && $password) {
    // check whether the users already exists in the db
    $statement = $app['db']->query("select * from users where email='$email'");
    $exists = $statement->fetchAll();

    if ($exists) {
        $_SESSION['user-already-exists-error'] = 'The user already exists';
        header('Location: /registration');
    }
    else {
        $statement = $app['db']->query("insert into users (email, password) values ('$email', '$password')");

        $_SESSION['login'] = [
            'email' => $email
        ];

        header('Location: /');
    }

}
// check if the user is already existing
// register the user
// login to the system
