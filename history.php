<?php
require 'connection.php';
try{
    $statement = $pdo->prepare("select * from operations");
    $statement->execute();
    $calc=$statement->fetchAll(PDO::FETCH_OBJ);
}
catch(PDOException $e){
    die("connection problem");
}
try{
    $count= $pdo->prepare("select count(id),operator from operations group by operator ");
    $count->execute();
    $query=$count->fetchAll(PDO::FETCH_OBJ);
}
catch(PDOException $e){
    die("connection problem");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>cal</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
<h1>Your Answers</h1>
<table border="0px">
    <tr>
        <th>first_operator</th>
        <th>operator</th>
        <th>second_operator</th>
        <th>result</th>
        <th>action</th>
    </tr>
    <?php foreach($calc as $calculation):?>
            <form action="delete.php" method="post" class="html-form">
                <tr>
                   <td><?php echo $calculation->first_operator ?></td>
                    <td><?php echo $calculation->operator?></td>
                    <td><?php echo $calculation->second_operator?></td>
                    <td><?php echo $calculation->result?></td>
                    <td><button name="del" type="submit" value="<?=$calculation->id;?>">delete</button></td>
            </form>
            <form action="edit.php" method="post" class="html-form">
                <td><button name="edit" type="submit" value="<?=$calculation->id;?>">Edit</button></td>
            </form>
    <?php endforeach;?>
    </tr>
</table>
  <button class="btn"><a href="index.html">Back</a></button>
<?php foreach($query as $quer):?>
<h1><?php print_r($quer->operator);?></h1>
<?php endforeach;?>
</body>
</html>
