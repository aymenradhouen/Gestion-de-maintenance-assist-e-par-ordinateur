<?php
require_once("connection.php");
session_start();
$tid=$_REQUEST["tid"];
$ex=mysql_query("select * from demandes where id='$tid'");
$exx=mysql_fetch_assoc($ex);
if(isset($_POST['enregistrer']) && !empty($_POST))
{
  if (!empty($_POST['description'])&&!empty($_POST['type_intervention'])&&!empty($_POST['decision'])&&!empty($_POST['prix']))
     {
     $tid=$_REQUEST["tid"];
     $ex=mysql_query("select * from demandes where id='$tid'");
     $exx=mysql_fetch_assoc($ex);
     $nom=$exx['equipement'];
     $type_maintenance=$_POST['type_maintenance'];
     $description=mysql_real_escape_string($_POST['description']);
     $type_intervention=$_POST['type_intervention'];
     $decision=$_POST['decision'];
     $prix=$_POST['prix'];
     $date_intervention=date('Y-m-d H:i:s');
     $technicien=$_SESSION["login"];
     $observations=mysql_real_escape_string($_POST['observations']);

     $req ="insert into interventions VALUES ('$tid','$nom','$type_maintenance','$description','$type_intervention','$decision','$prix','$date_intervention','$technicien','$observations')";
     mysql_query($req);
     $r="update demandes set etat='$decision' where id='$tid'";
     mysql_query($r);
     header('Location: ../demande.php');
   }
   else echo "<p class='faux'>Champs requis ne sont pas remplis</td>";
}

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
      <li><a href='lieu.php'><span>Ajouter un lieu</span></a></li>
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
<h1 align="">Traitement :</h1><br />
<form method="post" action="">

                     <fieldset>
                       <legend><strong>Veuillez saisir les informations : </strong></legend>
<table border="0" class="tab1">
  <tr>
                       <td>Nom de l'equipement :</td>
                       <td><input type="text" name="nom" value="<?php echo $exx['equipement'] ?>" readonly="readonly"></td>
</tr>
<tr>
                       <td>Type de maintenance :</td>
                       <td><select name="type_maintenance">
                         <option value="corrective">Maintenance corrective</option>
                         <option value="preventive">Maintenance préventive</option>
                       </select></td>
</tr>
<tr>
                     <td>Description :</td>
                     <td><TEXTAREA class="area" name="description" rows=4 cols=40></TEXTAREA></td>
</tr>
<tr>
                     <td>Type d'intervention :</td>
                    <td><input type="radio" name="type_intervention" value="interne">Interne
                    <input type="radio" name="type_intervention" value="externe">Externe</td>
</tr>
<tr>
                     <td>Décision :</td>
                     <td><select name="decision">
                       <option value="2">Probleme resolu</option>
                       <option value="1">Probleme persistant</option>
                     </select></td>
</tr>
<tr>
                     <td>Prix depensé :</td>
                     <td><input type="text" name="prix"></td>
</tr>
<tr>
                     <td>Créer le :</td>
                     <td><?php echo date('Y-m-d H:i:s'); ?></td>
</tr>
<tr>
                     <td>Technicien : <?php echo $_SESSION["login"];  ?></td>
</tr>
<tr>
                     <td>Observations :</td>
                     <td><TEXTAREA class="area" name="observations" rows=4 cols=40></TEXTAREA></td>
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
