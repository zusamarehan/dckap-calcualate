<?php

if (!isset($_SESSION['login'])) {
    header('Location: /registration');
}

session_destroy();

header('Location: /registration');
