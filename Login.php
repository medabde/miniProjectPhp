<?php
session_start();
require_once "./classes/Connexion.php";

$msg="";

if (isset($_SESSION["user"]))header("Location: ./index.php");

if(isset($_POST["submit"])){

$con= new Connexion();

$user=$_POST["username"];
$pass=$_POST["password"];

$query=$con->query("SELECT * FROM users  WHERE email='".$user."' AND password='".$pass."';");

$res=$query->fetchAll();


 if(sizeof($res)>0){

    $_SESSION["user"]=$user;

    header("Location: ./index.php");

 }else{
    $msg="pasword incorrect";
 }
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
</head>
<body>

<form method="post">
<label for="username">username</label>
<input type="text" name="username" required><br>

<label for="password">password</label>
<input type="password" name="password" required>
<p style="color: red;"><?php echo $msg?></p>
<br>
<input type="submit" name="submit">

</form>

<p>dont have an account? create one</p>
<button onclick="window.location.href='SignUp.php';">create</button>
    
</body>
</html>