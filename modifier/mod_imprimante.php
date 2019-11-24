<?php
require_once("../connection.php");
if(isset($_REQUEST["eid"]))
{
	$eid=$_REQUEST["eid"];
	$req=mysql_query("select * from imprimantes where id='$eid'");
	$rs=mysql_fetch_array($req);
	$a=$rs['caracteristiques'];
	$b=explode(",",$a);
}
if(isset($_REQUEST["enregistrer"]))
{
$nom=$_REQUEST['nom'];
$type=$_REQUEST['type'];
$fabriquant=$_REQUEST['fabriquant'];
$modele=$_REQUEST['modele'];
$lieu=$_REQUEST['lieu'];
$affectation=$_REQUEST['affectation'];
$num_serie=$_REQUEST['num_serie'];
$code_inv=$_REQUEST['code_inv'];
$carac=$_REQUEST['carac'];
$d=implode(",",$carac);
$date_achat=date('Y-m-d H:i:s');
$commentaires=$_REQUEST['commentaires'];

  mysql_query("update imprimantes set nom='$nom',type='$type',fabriquant='$fabriquant',modele='$modele',lieu='$lieu',affectation='$affectation',num_serie='$num_serie',code_inv='$code_inv',caracteristiques='$d',date_achat='$date_achat',commentaires='$commentaires' where id='$eid' ");
  header ('Location: ../imprimante.php');
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
		 <td>Nom :</td>
		 <td><input type="text" name="nom" value="<?php echo $rs['nom'] ?>"></td>
</tr>
<tr>
		 <td>Type :</td>
		 <td><select name="type">
			 <option value="<?php echo $rs['type']?>"><?php echo $rs['type'] ?></option>
			 <?php
			 $re ="select type from type_imprimantes";
			 $rq = mysql_query($re) or die(mysql_error());
			 while($ET=mysql_fetch_assoc($rq))
			 {

				 echo"<option value='{$ET['type']}'>{$ET['type']}</option>";
			 }
				?>
			</select></td>
</tr>
<tr>
			<td>Fabriquant :</td>
 		 <td><select name="fabriquant">
			 <option value="<?php echo $rs['fabriquant']?>"><?php echo $rs['fabriquant'] ?></option>
 			 <?php
 			 $re ="select fabriquant from fabriquant_imprimantes";
 			 $rq = mysql_query($re) or die(mysql_error());
 			 while($ET=mysql_fetch_assoc($rq))
 			 {

 				 echo"<option value='{$ET['fabriquant']}'>{$ET['fabriquant']}</option>";
 			 }
 				?>
 			</select></td>
</tr>

<tr>
 		 <td>Modele :</td>
 		 <td><select name="modele">
			 <option value="<?php echo $rs['modele']?>"><?php echo $rs['modele'] ?></option>
 			 <?php
 			 $re ="select modele from modele_imprimantes";
			 $rq = mysql_query($re) or die(mysql_error());
 			 while($ET=mysql_fetch_assoc($rq))
 			 {

 				 echo"<option value='{$ET['modele']}'>{$ET['modele']}</option>";
 			 }
 				?>
 			</select></td>
</tr>

<tr>
	 	<td>Lieu :</td>
	 	<td><select name="lieu">
			<option value="<?php echo $rs['lieu']?>"><?php echo $rs['lieu'] ?></option>
	 		<?php
	 		$re ="select lieu from lieu_aff";
			$rq = mysql_query($re) or die(mysql_error());
			while($ET=mysql_fetch_assoc($rq))
	 		{

	 			echo"<option value='{$ET['lieu']}'>{$ET['lieu']}</option>";
	 		}
	 		 ?>
	 	 </select></td>
</tr>

<tr>
	<td>Affectation :</td>
	<td><select name="affectation">
		<option value="<?php echo $rs['affectation'] ?>"><?php echo $rs['affectation'] ?></option>
		<?php
		$i=mysql_query("select * from consommables");
		 while($b=mysql_fetch_assoc($i))
		 {
			 echo"<option value='{$b['nom']},{$b['type']},{$b['fabriquant']}'>{$b['nom']},{$b['type']},{$b['fabriquant']}</option>";
		 }

		 ?>
	 </select></td>
</tr>

<tr>
		 <td>Numero de serie :</td>
		 <td><input type="text" name="num_serie" value="<?php echo $rs['num_serie'] ?>"></td>
</tr>
<tr>
		 <td>Code inventaire :</td>
		 <td><input type="text" name="code_inv" value="<?php echo $rs['code_inv'] ?>"></td>
</tr>
<tr>
		 <td>Caractéristique</td>
		 <td><input type="checkbox" name="carac[]" value="serie">Serie
		 <input type="checkbox" name="carac[]" value="parallele">Parallele
		 <input type="checkbox" name="carac[]" value="wifi">Wifi
		 <input type="checkbox" name="carac[]" value="ethernet">Ethernet
		 <input type="checkbox" name="carac[]" value="usb">USB</td>
</tr>
<tr>
		 <td>Créer le :</td>
		 <td><?php echo date('Y-m-d H:i:s'); ?>
</tr>
<tr>
		 <td>Commentaire :</td>
		 <td><TEXTAREA class="area" name="commentaires" rows=4 cols=40><?php echo $rs['commentaires'] ?></TEXTAREA></td>
</tr>
	</table>
		 <input name="enregistrer" type="submit" value="Enregistrer">
		 <a href="../imprimante.php">
	 			<input type="button" value="Annuler">
	 	</a>

 </fieldset>
</form>

</body>
</html>
