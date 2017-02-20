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
    <li><a href="TodoDetail.html">Todo Detail List</a></li>

</ul>

<h2 class="email">Todo List</h2>
<ul class = "page2">
    <?php
foreach ($todolists as $todolist){
    echo '<li>';
    echo $todolist[0]. " " . $todolist[1] . " " .$todolist[2]. " " .$todolist[3];


    }

    ?>

    <input type="checkbox" id="member_news" checked name="member news" value="data"/>
    <a class="btn btn-primary" href="TodoDetail.html?gameID=41"><i class="fa fa-pencil-square-o"></i> Edit</a>
    </li>
</ul>



    <li>
        <label for="member_news">Wake up</label>
        <input type="checkbox" id="member_news" checked name="member news" value="data"/>
        <a class="btn btn-primary" href="TodoDetail.html?gameID=41"><i class="fa fa-pencil-square-o"></i> Edit</a>
    </li>
    <li>
        <label for="warning_bulletins">Go to washroom</label>
        <input type="checkbox" id="warning_bulletins" name="Warning bulletins" value="data"/>
        <a class="btn btn-primary" href="TodoDetail.html?gameID=41"><i class="fa fa-pencil-square-o"></i> Edit</a>
    </li>
    <li>
        <label for="member_questions">Eat food</label>
        <input type="checkbox" id="member_questions" name="member questions" value="data"/>
        <a class="btn btn-primary" href="TodoDetail.html?gameID=41"><i class="fa fa-pencil-square-o"></i> Edit</a>
    </li>
    <li>
        <label for="member_classifieds">Get clothing</label>
        <input type="checkbox" id="member_classifieds" name="member classifieds" value="data"/>
        <a class="btn btn-primary" href="TodoDetail.html?gameID=41"><i class="fa fa-pencil-square-o"></i> Edit</a>
    </li>
    <li>
        <label for="member_classifieds">Start truck</label>
        <input type="checkbox" id="start_classifieds" name="member classifieds" value="data"/>
        <a class="btn btn-primary" href="TodoDetail.html?gameID=41"><i class="fa fa-pencil-square-o"></i> Edit</a>
    </li>
    <li>
        <label for="member_classifieds">Put on coat and boots</label>
        <input type="checkbox" id="coat_classifieds" name="member classifieds" value="data"/>
        <a class="btn btn-primary" href="TodoDetail.html?gameID=41"><i class="fa fa-pencil-square-o"></i> Edit</a>
    </li>
    <li>
        <label for="member_classifieds">Lock up house</label>
        <input type="checkbox" id="lock_classifieds" name="member classifieds" value="data"/>
        <a class="btn btn-primary" href="TodoDetail.html?gameID=41"><i class="fa fa-pencil-square-o"></i> Edit</a>
    </li>
</ul>

</body>
</html>