<?php
header('Location: ./index.php');

include 'config.php';

try
{
    $bdd = new PDO($dbHost, $dbUserName, $dbPassword, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
}
catch(Exception $e)
{
    die('Erreur : ' .$e->getMessage());
}

$req = $bdd->prepare('INSERT INTO chat (pseudo, message)
VALUES (:pseudo, :message)');
$req->execute(array(
'pseudo' => htmlspecialchars($_POST['pseudo']),
'message' => htmlspecialchars($_POST['message'])
));



?>