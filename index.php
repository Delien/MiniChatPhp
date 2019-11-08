<?php
include 'config.php';

try
{
    $bdd = new PDO($dbHost, $dbUserName, $dbPassword, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
}
catch(Exception $e)
{
    die('Erreur : ' .$e->getMessage());
}

$req = $bdd->query('SELECT id,pseudo,message FROM chat ORDER BY id DESC LIMIT 10 ');

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bienvenu sur le minichat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <form method='post' action='minichatPost.php'>
        <p><label>Pseudo:</label>
        <input type='text' name='pseudo' /></p>
        <p><label>Message :</label>
        <input type='text' name='message' /></p>
        <p><input type='submit' value='envoyer' /> </p>
    </form>

<?php

    
    while ($donnes = $req->fetch())
    {
        echo '<p><strong>' .$donnes['pseudo'] .'</strong> : ' .$donnes['message'] .'</p>' ;
    }
    echo '</p>'
?>

</body>
</html>
