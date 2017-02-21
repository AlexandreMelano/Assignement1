<?php
include_once('database.php');
$dsn = 'mysql:host=localhost;dbname=todolistdb';
$userName = "Teacher";
$password = 123456;

try{
    $db = new PDO($dsn, $userName, $password);
}
catch(PDOException $e){
    $message = $e->getMessage();
    echo "An error occured: ".$message;
}


$query = "SELECT * FROM todolists";
$statement = $db->prepare($query);
$statement->execute();
$todolists = $statement->fetchAll();
$statement->closeCursor();




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Homepage</title>
    <link rel="stylesheet" href="Stylesheets.css/style.css" /><!-- link to stylesheet-->
</head>

<body class="back">
<ul class = "page1"><!-- This is the nav-->
    <li><a href="index.html">Home</a></li>
    <li><a href="Todolist.php">Todo List Page</a></li>
    <li><a href="TodoDetail.php">Todo Detail List</a></li>

</ul>

<h1 class="center"> This is the mainpage</h1>

<form class="formSetting">
    User name:<br>
    <input type="text" name="username"><br>
    User password:<br>
    <input type="password" name="psw">
    <br>
    <input type="submit" value="Submit">
</form>


</body>


</html>