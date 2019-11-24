<?php
require_once("../connection.php");
if(isset($_REQUEST["eid"]))
{
	$eid=$_REQUEST["eid"];
	$req=mysql_query("select * from ordinateurs where id='$eid'");
	$rs=mysql_fetch_array($req);
}
if(isset($_REQUEST["enregistrer"]))
{
  $nom=$_REQUEST["nom"];
  $type=$_REQUEST["type"];
  $fabriquant=$_REQUEST["fabriquant"];
  $modele=$_REQUEST["modele"];
	$lieu=$_REQUEST['lieu'];
	$affectation=$_REQUEST['affectation'];
  $num_serie=$_REQUEST["num_serie"];
  $code_inv=$_REQUEST["code_inv"];
  $date_achat=date('Y-m-d H:i:s');
  $commentaires=$_REQUEST["commentaires"];

  mysql_query("update ordinateurs set nom='$nom',type='$type',fabriquant='$fabriquant',modele='$modele',lieu='$lieu',affectation='$affectation',num_serie='$num_serie',code_inv='$code_inv',date_achat='$date_achat',commentaires='$commentaires' where id='$eid' ");
  header ('Location: ../ordinateur.php');
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
 											$re ="select type from type_ordinateurs";
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
 											$re ="select fabriquant from fabriquant_ordinateurs";
											$rq = mysql_query($re) or die(mysql_error());
											$resultat1 = array();
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
 											$re ="select modele from modele_ordinateurs";
											$rq = mysql_query($re) or die(mysql_error());
							  			 while($ET=mysql_fetch_assoc($rq))
 											{
 												echo"<option value='{$ET['modele']}'>{$ET['modele']}</option>";
 											}
 											 ?>
 										 </select></td>
</tr>
<tr>
										 <td>Systeme d'exploitation :</td>
                     <td><select name="sys_exp">
											 <option value="<?php echo $rs['sys_exp'] ?>"><?php echo $rs['sys_exp'] ?></option>
                       <option value="windowsXp">Windows XP</option>
                       <option value="windows7">Windows 7</option>
                       <option value="windows8">Windows 8</option>
                       <option value="windows10">Windows 10</option>
                     </select></td>
</tr>
<tr>
                     <td>Processeur :</td>
                     <td><input type="text" name="processeur" value="<?php echo $rs['processeur'] ?>"></td>
</tr>
<tr>
                     <td>Carte graphique :</td>
                     <td><input type="text" name="carte_graphique" value="<?php echo $rs['carte_graphique'] ?>"></td>
</tr>
<tr>
                     <td>RAM :</td>
                     <td><input type="text" name="ram" value="<?php echo $rs['ram'] ?>"></td>
</tr>
<tr>
                     <td>Capacité disque dur :</td>
                     <td><input type="text" name="memoire_dur" value="<?php echo $rs['memoire_dur'] ?>"></td>
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
								  	<td><input type="text" name="affectation" value="<?php echo $rs['affectation'] ?>"></td>
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
										<td>Créer le :</td>
                    <td><?php echo date('Y-m-d H:i:s'); ?></td>
</tr>
<tr>
										 <td>Commentaire :</td>
										 <td><TEXTAREA class="area" name="commentaires" rows=4 cols=40><?php echo $rs['commentaires'] ?></TEXTAREA></td>
</tr>
</table>
										 <input name="enregistrer" name="enregistrer" type="submit" value="Enregistrer">
										 <a href="../ordinateur.php">
									 			<input type="button" value="Annuler">
									 	</a>

								 </fieldset>
</form>

</body>
</html>
