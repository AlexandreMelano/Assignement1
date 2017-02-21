<?php // update database
include_once('database.php');

$isAddition = filter_input(INPUT_POST, "isAddition");
$TODO = filter_input(INPUT_POST, "TODO"); //TODO field
$ID = filter_input(INPUT_POST, "ID"); // ID field

if($isAddition == "1") {
    $query = "INSERT INTO todolistsdb(TODO, ID) VALUES (:todolist_TODO, :todolist_ID)";
    $statement = $db->prepare($query); // encapsulate the sql statement
}
else {
    $ID = filter_input(INPUT_POST, "ID"); // $_POST["ID"];
    $query = "UPDATE todolistsdb SET TODO = :todolist_TODO, ID = :todolist_ID WHERE ID = :todolist_id "; // SQL statement
    $statement = $db->prepare($query); // encapsulate the sql statement
    $statement->bindValue(':todolist_ID', $todolist_ID);

}

$statement->bindValue(':TODO', $TODO);
$statement->bindValue(':ID', $ID);
$statement->execute(); // run on the db server
$statement->closeCursor(); // close the connection

// redirect to index page
header('Location: index.php');
?>
