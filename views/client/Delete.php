<?php
session_start();
require_once "../../classes/Client.php";
if (!isset($_SESSION["user"])) header("Location: ../../Login.php");


$cl = new Client();
$cl->setId($_GET['id']);
$deleted=($cl->delete())?'1':'0';


header("Location: Read.php?deleted=$deleted");

?>