<?php
include_once('database.php');

$ID = $_GET["ID"]; // assigns the gameID from the URL

if($ID != false) {
    $query = "DELETE FROM todolistdb WHERE Id = :id ";
    $statement = $db->prepare($query);
    $statement->bindValue(":ID", $ID);
    $success = $statement->execute(); // execute the prepared query
    $statement->closeCursor(); // close off database
}

// redirect to index page
header('Location: index.php');

?>