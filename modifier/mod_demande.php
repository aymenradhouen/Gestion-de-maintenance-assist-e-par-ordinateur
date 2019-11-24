<?php
require_once("../connection.php");
if(isset($_REQUEST["eid"]))
{
	$eid=$_REQUEST["eid"];
	$req=mysql_query("select * from demandes where id='$eid'");
	$rs=mysql_fetch_array($req);
}
if(isset($_REQUEST["enregistrer"]))
{
  $equipement= $_REQUEST['equipement'];
  $description = mysql_real_escape_string($_REQUEST['description']);
  $date = date('Y-m-d H:i:s');
  $urgence =$_REQUEST['urgence'];

  mysql_query("update demandes set equipement='$equipement',description='$description',date='$date',urgence='$urgence' where id='$eid'");
  header ('Location: ../demande.php');
}

session_start();
echo"<h3>Bonjour : ".$_SESSION["login"]."</h3>";

?>
<!DOCTYPE html>
<html lang=''>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="../css/styles1.css">
   <script src="jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
   <title>GMAO</title>
</head>
<body>

	<div id='cssmenu'>
  <ul>
     <li><a href='../home.php'><span>Accueil</span></a></li>
     <li class='active has-sub'><a href='#'><span>Parc</span></a>
       <ul>
          <li><a href='../ordinateur.php'><span>Ordinateurs</span></a></li>
          <li><a href='../imprimante.php'><span>Imprimantes</span></a></li>
          <li><a href='../moniteur.php'><span>Moniteurs</span></a></li>
          <li><a href='../materielRes.php'><span>Materiel reseaux</span></a></li>
          <li><a href='../peripherique.php'><span>Peripheriques</span></a></li>
          <li class='last'><a href='../consommable.php'><span>Consommables</span></a></li>
       </ul>
           </li>
           <?php if($_SESSION['type'] == "Technicien" || $_SESSION['type'] == "Administrateur"){ ?>
     <li class='active has-sub'><a href='#'><span>Maintenance</span></a>
     <ul>
        <li><a href='../demande.php'><span>Liste des demandes</span></a></li>
     </ul>
     </li>
   <?php } ?>
   <?php if($_SESSION['type'] == "Administrateur"){ ?>
   <li class='active has-sub'><a href='#'><span>Administration</span></a>
   <ul>
     <li><a href='../admin.php'><span>Gestion des utilisateurs</span></a></li>
      <li><a href='../ajouter/lieu.php'><span>Ajouter un lieu</span></a></li>
   </ul>
   </li>
    <?php } ?>
     <li class='active has-sub'><a href='#'><span>Statistiques</span></a>
     <ul>
        <li><a href='../stats.php'><span>Statistiques equipements</span></a></li>
     </ul>
     </li>
     <li class='last'><a href='../deco.php'><span>Déconnection</span></a></li>
  </ul>
  </div>
<h1 align="">Modifier les informations :</h1><br />
<form method="POST">
	<fieldset>
		<legend><strong>Veuillez saisir les informations : </strong></legend>
<table border="0" class="tab1">

<tr>
	<td>Equipement :</td>
	<td><select name="equipement">
		<option value="<?php echo $rs['equipement'] ?>"><?php echo $rs['equipement'] ?></option>
	</select></td>
</tr>
<tr>
	<td>Description :</td>
	<td><TEXTAREA class="area" name="description" rows=4 cols=40><?php echo $rs['description'] ?></TEXTAREA></td>
</tr>

<tr>
<td>Créer le :</td>
<td><?php echo date('Y-m-d H:i:s'); ?></td>
</tr>

<tr>
	<td>Urgence :</td>
	<td><select name="urgence">
		<option value="pas_Urgent">Pas Urgent</option>
		<option value="Urgent">Urgent</option>
		<option value="tres_Urgent">Tres Urgent</option>
	</select></td>
</tr>
</table>

	<input name="enregistrer" type="submit" value="Enregistrer">
	<a href="../demande.php">
			<input type="button" value="Annuler">
	</a>
</fieldset>
</form>

</body>
</html>
