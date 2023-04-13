<?php

if (!isset($_SESSION['login'])) {
    header('Location: /registration');
}

require 'Views/home.view.php';
