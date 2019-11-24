<?php
require_once("connection.php");
if(isset($_POST['enregistrer']) && !empty($_POST))
{
  if(!empty($_POST['description']))
   {
     if(strlen($_POST['description'])<5)
     {
       echo "<p class='faux'>La description doit être plus long (plus de 5 caractères)</td>";
     } else{
     $equipement= $_POST['type'];
     $description = mysql_real_escape_string($_POST['description']);
     $date = date('Y-m-d H:i:s');
     $urgence =$_POST['urgence'];
     $req ="insert into demandes VALUES ('$id','$equipement','$description','$date','$urgence','$etat')";
     mysql_query($req);
     header('Location: ../demande.php');
   }
 }
   else echo "<p class='faux'>Champs requis ne sont pas remplis</td>";
}

if(isset($_REQUEST['cid']))
{
  $cid=$_REQUEST['cid'];
  $c=mysql_query("select modele from consommables where modele='$cid'");
  $b=mysql_fetch_assoc($c);
}
if(isset($_REQUEST['iid']))
{
  $iid=$_REQUEST['iid'];
  $c=mysql_query("select modele from imprimantes where modele='$iid'");
  $b=mysql_fetch_assoc($c);
}

if(isset($_REQUEST['mid']))
{
  $mid=$_REQUEST['mid'];
  $c=mysql_query("select modele from materiel_reseaux where modele='$mid'");
  $b=mysql_fetch_assoc($c);
}

if(isset($_REQUEST['moid']))
{
  $moid=$_REQUEST['moid'];
  $c=mysql_query("select modele from moniteurs where modele='$moid'");
  $b=mysql_fetch_assoc($c);
}

if(isset($_REQUEST['oid']))
{
  $oid=$_REQUEST['oid'];
  $c=mysql_query("select modele from ordinateurs where modele='$oid'");
  $b=mysql_fetch_assoc($c);
}

if(isset($_REQUEST['pid']))
{
  $pid=$_REQUEST['pid'];
  $c=mysql_query("select modele from peripheriques where modele='$pid'");
  $b=mysql_fetch_assoc($c);
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
   <script src="../jquery.min.js" type="text/javascript"></script>
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
<h1 align="">Ajouter une demande :</h1><br />
<form method="post" action="#">

                     <fieldset>
                       <legend><strong>Veuillez saisir les informations : </strong></legend>
                       <table class="tab1" border="0">

<tr>
                       <td>Equipement :</td>
                       <td><input type="text" name="type" value="<?php echo $b['modele']?>" readonly="readonly"></td>
                     </tr>

<tr>
                     <td>Description :</td>
                     <td><TEXTAREA class="area" name="description" rows=4 cols=40></TEXTAREA></td>
</tr>

<tr>
                   <td>Créer le :</td>
                   <td><?php echo date('Y-m-d H:i:s'); ?></td>
</tr>
<tr>
                     <td>Urgence :</td>
                     <td><select name="urgence">
                       <option value="pas Urgent">Pas Urgent</option>
                       <option value="Urgent">Urgent</option>
                       <option value="tres Urgent">Tres Urgent</option>
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
