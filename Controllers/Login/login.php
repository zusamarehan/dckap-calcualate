<?php

if (isset($_SESSION['login'])) {
    header('Location: /');
}

require "Views/Login/login.view.php";
