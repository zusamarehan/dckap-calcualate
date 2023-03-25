<?php

try{
    if($_POST['num1'] !="0" || $_POST['num2'] !="0") {
        $name = $_POST['num1'];
        $name1 = $_POST['num2'];
        $select = $_POST['calc'];
    }
    $err ="";
    $err1 = "";
    if($name1){
        $err="Infinity";
        header('/list');
    }
    if($name=="" || $name1 ==""){
        $err1 = "required";
        header('/list');
    }
    if ($select === "+") {
        $result = $name+$name1;
        $selects= "add";
    }
    else if ($select === "-") {

        $result = $name-$name1;
        $selects= "minus";

    }
    else if ($select === "*") {

        $result = $name*$name1;
        $selects= "mul";

    }
    else if ($select === "/") {

        $result = $name/$name1;
        $selects= "div";
    }
    $ins = $app['db']->query("INSERT INTO operations(first_operator,operator,second_operator,result)VALUES('$name','$selects','$name1','$result')");

    header('Location: /list');
}
catch(PDOException $e){
    die("connection problem");
}
