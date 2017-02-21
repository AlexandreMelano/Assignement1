<?php
include('database.php');
$ID = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
$TODO = filter_input(INPUT_POST, 'TODO', FILTER_VALIDATE_INT);

$ID = $_GET['ID'];
if ($id != false && $TODO != false)
    {
        $query = 'DELETE FROM todolistdb
                  WHERE ID = todolist[0]';
        $statement = $db->prepare($query);
        $statement->bindValue(':ID', $ID);
        $success = $statement->execute();
        $statement->closeCursor();
    }
include('index.php');
?>
