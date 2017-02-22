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


$query = "SELECT * FROM todolist";
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
    <li><a href="index.php">Home</a></li>
    <li><a href="Todolist.php">Todo List Page</a></li>
    <li><a href="TodoDetail.php">Todo Detail List</a></li>

</ul>

<h1 class="center"> This is the mainpage</h1>

<form id='login' action='Todolist.php' method='post' accept-charset='UTF-8'>
    <fieldset >
        <legend>Login</legend>
        <input type='hidden' name='submitted' id='submitted' value='1'/>
        <label for='username' >UserName*:</label>
        <input type='text' name='username' id='username'  maxlength="50" />
        <label for='password' >Password*:</label>
        <input type='password' name='password' id='password' maxlength="50" />
        <input type='submit' name='Submit' value='Submit' />
    </fieldset>
</form>



<!--<form class="formSetting">
    User name:<br>
    <input type="text" name="username"><br>
    User password:<br>
    <input type="password" name="psw">
    <br>
    <input type="submit" value="Submit">
</form>


</body>


</html>