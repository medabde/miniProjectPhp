<?php
session_start();
require_once "./classes/Connexion.php";


if (isset($_SESSION["user"]))header("Location: ./index.php");


$msg="";

if (isset($_POST['submit'])) {
    $email=$_POST['username'];
    $pass=$_POST['password'];

    if ($pass!=$_POST['repassword']) {
        $msg="paword should be the same in both fields";
    }else {

                
        $con= new Connexion();

        $query=$con->query("SELECT * FROM users  WHERE email='".$email."';");

        $res=$query->fetchAll();


        if(sizeof($res)>0){

            $msg="username taken .. please try another one";

        }else{
            
            $con->query("INSERT INTO users(email,password) VALUES('".$email."','".$pass."'); ");
            header("Location: Login.php");
        }
            

    }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign Up</title>
</head>
<body>

<form method="post">
<label for="username">username</label>
<input type="text" name="username" required><br>

<label for="password">password</label>
<input type="password" name="password" required>
<br>

<label for="repassword"> retype password</label>
<input type="password" name="repassword" required>

<p><?php echo $msg;?></p>
<br>
<input type="submit" name="submit" value="create an account">

</form>

</body>
</html>