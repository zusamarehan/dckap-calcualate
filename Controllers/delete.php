<?php

if (!isset($_SESSION['login'])) {
    header('Location: /registration');
}

if(isset($_POST['del'])){
    $id = $_POST['del'];
    try{

        $statement = $app['db']->query("DELETE FROM operations WHERE id=".$id);
        header('Location: /list');
    }

    catch(PDOException $e){
        die ("delete failed");
    }
}
