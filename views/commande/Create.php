<?php
session_start();
require_once "../../classes/Commande.php";
require_once "../../classes/Client.php";
if (!isset($_SESSION["user"])) header("Location: ../../Login.php");

$cl =new Client();
$clients=$cl->readAll();

if (isset($_POST["submit"])) {
    $com = new Commande($_POST['clientId'],$_POST['date'],$_POST['montant']);
    $com->create();
    header("Location: Read.php");

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ajouter Commande</title>
</head>
<body>
    
    <form method="post">
    
    <label for="date">date</label>
    <input type="date" name="date" required><br>

    <label for="montant">montant</label>
    <input type="number" name="montant" required><br>

    <label for="clientId">client ID</label>
    <select name="clientId">
    <?php foreach ($clients as $client) {?>
    <option value="<?php echo $client->getId()?>"><?php echo $client->getId()."-".$client->getNom();?></option>
    <?php }?>
    </select>
    <br>

    <input type="submit" name="submit">
    </form>

</body>
</html>