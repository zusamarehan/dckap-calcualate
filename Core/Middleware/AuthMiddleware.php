<?php

namespace Core;

class AuthMiddleware
{
    public function handle()
    {
        if (!isset($_SESSION['login'])) {
            header('Location: /registration');
        }
    }
}
