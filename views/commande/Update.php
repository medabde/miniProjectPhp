<?php
session_start();
require_once "../../classes/Commande.php";
require_once "../../classes/Client.php";
if (!isset($_SESSION["user"])) header("Location: ../../Login.php");


$com=new Commande();
$com->setId($_GET['id']);
$com->readById();

$cl=new Client();
$clients=$cl->readAll();

if (isset($_POST["submit"])) {
    
    $com->setDate($_POST['date']);
    $com->setMontant($_POST['montant']);
    $com->setClientId($_POST['clientId']);

    $com->update();
    header("Location: Read.php");

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Modifier Client</title>
</head>
<body>    
    <form method="post">

    <label for="id">id</label>
    <input type="text" value="<?php echo $com->getId()?>" disabled>
    <br>
    
    <label for="date">date</label>
    <input type="date" name="date" value="<?php echo $com->getDate();?>" required><br>

    <label for="montant">montant</label>
    <input type="number" name="montant" value="<?php echo $com->getMontant();?>" required><br>

    <label for="clientId">client ID</label>
    <select name="clientId">
    <?php foreach ($clients as $client) {?>
    
    <option value="<?php echo $client->getId()?>" <?php if($client->getId()==$com->getClientId()) echo "selected";?>><?php echo $client->getId()."-".$client->getNom();?></option>
    <?php }?>
    </select>

    <br>
    <br>
    <input type="submit" name="submit">
    </form>

</body>
</html>