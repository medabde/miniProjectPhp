<?php
session_start();
require_once "../../classes/Commande.php";
if (!isset($_SESSION["user"])) header("Location: ../../Login.php");


$com = new Commande();
$com->setId($_GET['id']);
$com->delete();
header("Location: Read.php");