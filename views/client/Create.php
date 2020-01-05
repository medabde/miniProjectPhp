<?php
session_start();
require_once "../../classes/Client.php";
if (!isset($_SESSION["user"])) header("Location: ../../Login.php");

if (isset($_POST["submit"])) {
    $cl = new Client($_POST['nom'],$_POST['prenom'],$_POST['civilite']);
    $cl->create();
    header("Location: Read.php");

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ajouter Client</title>
</head>
<body>
    
    <form method="post">
    <label for="nom">nom</label>
    <input type="text" name="nom" required><br>

    <label for="prenom">prenom</label>
    <input type="text" name="prenom" required><br>

    <select name="civilite">
    <option value="Marocaine">Marocaine</option>
    <option value="Spanish">Spanish</option>
    <option value="American">American</option>
    </select>
    <br>

    <input type="submit" name="submit">
    </form>

</body>
</html>