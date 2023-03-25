<?php

try{
    $statement = ($app['db'])->query("select * from operations");
    $calc=$statement->fetchAll(PDO::FETCH_OBJ);
}
catch(PDOException $e){
    die("connection problem");
}
try{
    $count= ($app['db'])->query("select count(id),operator from operations group by operator ");
    $query=$count->fetchAll(PDO::FETCH_OBJ);
}
catch(PDOException $e){
    die("connection problem");
}

require 'Views/list.view.php';

