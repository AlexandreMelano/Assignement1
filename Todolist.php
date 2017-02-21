<?php
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
    <title>Todo List</title>
    <link rel="stylesheet" href="Stylesheets.css/style.css" /><!-- link to stylesheet-->
</head>
<body class="back">

<ul class = "page1"><!-- This is the nav-->
    <li><a href="index.php">Home</a></li>
    <li><a href="Todolist.php">Todo List Page</a></li>
    <li><a href="TodoDetail.php">Todo Detail List</a></li>

</ul>

<ul class = "page2">
    <table class="table table-striped table-hover">
        <caption> TodoList details</caption>
        <tr>
            <th>ID</th>
            <th>Todo</th>
            <th>checkbox</th>
        </tr>
        <tr>

            <?php
            foreach ($todolists as $todolist): ?>{
            echo '<tr>';

            <td><?php echo $todolist[0]?></td>
            <td><?php echo $todolist[1]?></td>
            <td><?php echo $todolist[2]?></td>
            <td><?php echo$todolist[3]?></td>
            <td><a class="btn btn-primary" href="TodoDetail.php?ID=<?php echo $todolist['ID'] ?>">Edit</a></td>


            <td><a class="btn btn-danger" href="deleteTodo.php">Delete</a></td>
        </tr>

        <?php endforeach; ?>
        </tr>
    </table>
</ul>




</body>
</html>