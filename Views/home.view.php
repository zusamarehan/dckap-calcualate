<!DOCTYPE html>
<html lang="en">
<head>
    <title>php -s localhost:8888</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
<h1>Calculations</h1>
<form action="/calculate" method="post" class="html-form">
    <input type="number" min="" step="any" name="num1" class="num1">
    <select name="calc">
        <option name="add" value="+">+</option>
        <option name="sub" value="-">-</option>
        <option name="mul" value="*">*</option>
        <option name="div" value="/">/</option>

    </select>
    <input type="number" min="0" step="any" name="num2" class="num1">
    <button>Calculate</button>
    <button><a href="/list">Edit Your Details</a></button>

</form>


</body>
</html>
