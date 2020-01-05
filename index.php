<?php
session_start();
require_once "./classes/Client.php";

if (!isset($_SESSION["user"])) header("Location: ./Login.php");

if (isset($_GET["dec"])) {
    session_destroy();
    header("Location: ./Login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>index</title>
</head>
<body>

<h1>hello <?php echo $_SESSION["user"]?></h1>

<button onclick="window.location.href='./views/client/Read.php'">Liste Clients</button>
<br>
<br>

<button onclick="window.location.href='./views/commande/Read.php'">Liste Commandes</button>
<br>
<br>
<a href="./index.php?dec=1">disconnect</a>

    
</body>
</html>