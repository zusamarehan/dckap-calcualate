<?php
require 'connection.php';
if(isset($_POST['del'])){
    $id = $_POST['del'];
    try{

        $query = "DELETE FROM operations WHERE id=:id";
        $statement = $pdo->prepare($query);
        $data = [":id" => $id];
        $statement->execute($data);

    }

    catch(PDOException $e){
        die ("delete failed");
    }
}

header('Location: history.php');
