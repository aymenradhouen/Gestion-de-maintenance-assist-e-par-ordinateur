<?php
require_once("connection.php");
if(isset($_POST['enregistrer']) && !empty($_POST))
{
	  if(!empty($_POST['login'])&&!empty($_POST['pass']))
 {
$log=$_POST['login'];
$pass=$_POST['pass'];

$req ="select * from users where LOGIN='$log' and PASSWD='$pass'";
$rs= mysql_query($req) or die(mysql_error());
if($u=mysql_fetch_assoc($rs)){
  session_start();
  $_SESSION['login']=$u['login'];
	$_SESSION['type']=$u['type'];
  header("location:home.php");
} else
echo "<div class='alert'>
<span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span>
Verifier vos informations !
</div>";
}
else {
	echo "<div class='alert'>
	<span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span>
	Veuillez entrer vos informations !
	</div>";
}
}
?>

<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Authentification</title>
		<link rel="stylesheet" href="./css/style.css">

	</head>
	<body>
		<div class="loginBox">
			<img src="./css/img/user.png" class="user">
			<h2>Connecter vous ici</h2>
			<form method="POST" action="">
				<p>Username</p>
				<input type="text" name="login" placeholder="Enter Username">
				<p>Password</p>
				<input type="password" name="pass" placeholder="••••••">
				<input type="submit" name="enregistrer" value="Se connecter">
			</form>
		</div>

	</body>
</html>
