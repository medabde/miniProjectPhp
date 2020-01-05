<?php
session_start();
require_once "../../classes/Client.php";
if (!isset($_SESSION["user"])) header("Location: ../../Login.php");

$cl=new Client();
$cl->setId($_GET['id']);
$cl->readById();

if (isset($_POST["submit"])) {
    
    $cl->setNom($_POST['nom']);
    $cl->setPrenom($_POST['prenom']);
    $cl->setCivilite($_POST['civilite']);

    $cl->update();
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
    <input type="text" value="<?php echo $cl->getId()?>" disabled>
    <br>
    
    <label for="nom">nom</label>
    <input type="text" name="nom" value="<?php echo $cl->getNom();?>" required><br>

    <label for="prenom">prenom</label>
    <input type="text" name="prenom" value="<?php echo $cl->getPrenom();?>" required><br>

    <select name="civilite">
    <option value="Marocaine" <?php if($cl->getCivilite()=='Marocaine') echo "selected"?>>Marocaine</option>
    <option value="Spanish" <?php if($cl->getCivilite()=='Spanish') echo "selected"?> >Spanish</option>
    <option value="American" <?php if($cl->getCivilite()=='American') echo "selected"?> >American</option>
    </select>
    <br>
    <input type="submit" name="submit">
    </form>

</body>
</html>