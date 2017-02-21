<?php
include_once('database.php'); // include the database connection file

$ID = $_GET["ID"]; // assigns the gameID from the URL
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
if($ID == 0) {
    $TODO = null;
    $isAddition = 1;
} else {
    $isAddition = 0;

    $query = "SELECT * FROM todolists WHERE ID = :ID";
    $statement = $db->prepare($query);
    $statement->bindValue(':ID', $ID);
    $statement->execute();

    $ID = $statement->fetchAll();
    $statement->closeCursor();


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Game Details</title>
    <!-- CSS Section -->
    <link rel="stylesheet" href="./Scripts/lib/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./Scripts/lib/bootstrap/dist/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="./Scripts/lib/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="./Content/app.css">
</head>
<body>
<ul class = "page1"><!-- This is the nav-->
    <li><a href="index.php">Home</a></li>
    <li><a href="Todolist.php">Todo List Page</a></li>
    <li><a href="TodoDetail.php">Todo Detail List</a></li>

</ul>
<!-- form for Todo details-->
<div class="container">
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <h1>Todo Details</h1>
            <form action="update.php" method="post">
                <div class="form-group">
                    <label for="IDTextField" hidden>ID</label>
                    <input type="hidden" class="form-control" id="IDTextField" name="IDTextField"
                           placeholder="ID" value="<?php echo $todolists['ID']; ?>">
                </div>
                <div class="form-group">
                    <label for="NameTextField">Todo Name</label>
                    <input type="text" class="form-control" id="NameTextField"  name="NameTextField"
                           placeholder="Todo Name" required  value="<?php echo $todolists['TODO']; ?>">
                </div>
                <div class="form-group">
                    <label for="CostTextField">ID</label>
                    <input type="text" class="form-control" id="CostTextField" name="CostTextField"
                           placeholder="ID" required  value="<?php echo $todolists['Notes']; ?>">
                </div>
                <input type="hidden" name="isAddition" value="<?php echo $isAddition; ?>">
                <button type="submit" id="SubmitButton" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
</div>


<!-- JavaScript Section -->
<script src="./Scripts/lib/jquery/dist/jquery.min.js"></script>
<script src="./Scripts/lib/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="./Scripts/app.js"></script>
</body>
</html>

