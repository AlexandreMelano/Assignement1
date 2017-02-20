<?php
// connection string

// cleardb access
$dsn = 'heroku pg:psql postgresql-asymmetrical-84387 --app mytodolistalexmelano';
$userName = 'grnjfagofhvxvc';
$password = '94326f1215760c1133830addb98d6b2a073a97f9e3842c2d013007b0e90f28b0';


try {
// instantiates a new pdo - an db object
    $db = new PDO($dsn, $userName, $password);

}
catch(PDOException $e) {
    $message = $e->getMessage();
    echo "An error occurred: " . $message;
}

?>