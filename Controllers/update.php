<?php

if (!isset($_SESSION['login'])) {
    header('Location: /registration');
}

if(isset($_POST['update'])) {
    try {
        $id = $_POST['update'];
        $name = $_POST['num3'];
        $name1 = $_POST['num4'];
        $select = $_POST['cal'];

        if ($select === "+"){
            $result = $name+$name1;
            $selects = "add";
        }
        else if($select === "-"){
            $result = $name-$name1;
            $selects = "minus";

        }
        else if($select === "*"){
            $result = $name*$name1;
            $selects = "mul";

        }
        else if($select === "/"){
            $result = $name/$name1;
            $selects = "div";

        }

        $statements = $app['db']->query("UPDATE operations SET first_operator='$name',operator='$selects',second_operator='$name1',result='$result' WHERE id=".$id);
        header('Location: /list');
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}
header('Location: /list');
