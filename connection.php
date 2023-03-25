<?php
try{
    $pdo = new PDO
    (
        'mysql:host=127.0.0.1;dbname=calc',
        'admin',
        'welcome'
    );
}
catch(Exception $e){
    die("connection error");
}
?>
