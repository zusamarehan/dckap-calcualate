<?php

namespace Core;

class GuestMiddleware
{
    public function handle()
    {
        if (isset($_SESSION['login'])) {
            header('Location: /');
        }
    }
}
