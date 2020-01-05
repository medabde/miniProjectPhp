<?php
session_start();
require_once "../../classes/Commande.php";
if (!isset($_SESSION["user"])) header("Location: ../../Login.php");

$commande = new Commande();
$commandes=$commande->readAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Liste Commandes</title>
</head>
<body>


<button onclick="window.location.href='Create.php'">Ajouter Commande</button>
<br>
<br>

<table style="width:100%" border="2">
  <tr>
    <th>ID</th>
    <th>Client id</th>
    <th>Date</th>
    <th>Montant</th>
    <th>Gestion</th>
  </tr>
<?php foreach ($commandes as $commande){?>
  <tr>
    <td><?php echo $commande->getId();?></td>
    <td><?php echo $commande->getClientId();?></td>
    <td><?php echo $commande->getDate();?></td>
    <td><?php echo $commande->getMontant();?></td>
    <td><button onclick="window.location.href='Update.php?id=<?php echo $commande->getId();?>'">Modifier</button>
    <button onclick="sup(<?php echo $commande->getId();?>)">Supprimer</button>
    </td>
  </tr>
  <?php }?>
  
</table>

<script>
function sup(id) {
  let bool=confirm("voulez vous vraiment supprimer la commande numero "+id+"?");
  if(bool==true)window.location.href='Delete.php?id='+id;
}
</script>
    
    
<a href="../../index.php">Home</a>
</body>
</html>

