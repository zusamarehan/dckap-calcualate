<?php

if (!isset($_SESSION['login'])) {
    header('Location: /registration');
}

if(isset($_POST['edit'])){
    $id = $_POST['edit'];
    try{
        $statement = $app['db']->query("SELECT *  FROM operations WHERE id=".$id);
        $calc = $statement->fetchAll(PDO::FETCH_OBJ);
    }

    catch(PDOException $e){
        die ("delete failed");
    }
}

require 'Views/edit.view.php';
