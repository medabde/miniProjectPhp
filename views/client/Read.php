<?php
session_start();
require_once "../../classes/Client.php";
if (!isset($_SESSION["user"])) header("Location: ../../Login.php");

$client = new Client();
$clients=$client->readAll();

if (isset($_GET['deleted']))
  if ($_GET['deleted']=='0')echo "<script>alert('cant be deleted- delete all commandes related to it and try again!!');</script>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Liste Client</title>
</head>
<body>


<button onclick="window.location.href='Create.php'">Ajouter Client</button>
<br>
<br>

<table style="width:100%" border="2">
  <tr>
    <th>ID</th>
    <th>Prenom</th>
    <th>Nom</th>
    <th>Civilite</th>
    <th>Gestion</th>
  </tr>
<?php foreach ($clients as $client){?>
  <tr>
    <td><?php echo $client->getId();?></td>
    <td><?php echo $client->getNom();?></td>
    <td><?php echo $client->getPrenom();?></td>
    <td><?php echo $client->getCivilite();?></td>
    <td><button onclick="window.location.href='Update.php?id=<?php echo $client->getId();?>'">Modifier</button>
    <button onclick="sup(<?php echo $client->getId();?>)">Supprimer</button>
    </td>
  </tr>
  <?php }?>
  
</table>

<script>
function sup(id) {
  let bool=confirm("voulez vous vraiment supprimer le client numero "+id+"?");
  if(bool==true)window.location.href='Delete.php?id='+id;
}
</script>
    

<a href="../../index.php">Home</a>
</body>
</html>

