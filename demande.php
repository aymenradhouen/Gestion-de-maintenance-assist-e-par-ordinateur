<?php
require_once("connection.php");

if(isset($_REQUEST["supprimer"]))
{
  if(!empty($_REQUEST["delid"]))
  {
  $delid=$_REQUEST["delid"];
  $a=implode(",",$delid);
  mysql_query("delete from demandes where id in ($a)");
  }else echo "<div class='alert'>
 <span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span>
 Veuillez selectioner quelque chose a supprimer.
</div>";
}
$req="select * from demandes order by id";
$rs=mysql_query($req) or die(mysql_error());
session_start();
echo"<h3>Bonjour : ".$_SESSION["login"]."</h3>";
?>

<!DOCTYPE html>
<html lang=''>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="./css/styles1.css">
   <script src="jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
   <title>GMAO</title>
</head>
<body>

  <div id='cssmenu'>
  <ul>
     <li><a href='home.php'><span>Accueil</span></a></li>
     <li class='active has-sub'><a href='#'><span>Parc</span></a>
              <ul>
                 <li><a href='ordinateur.php'><span>Ordinateurs</span></a></li>
                 <li><a href='imprimante.php'><span>Imprimantes</span></a></li>
                 <li><a href='moniteur.php'><span>Moniteurs</span></a></li>
                 <li><a href='materielRes.php'><span>Materiel reseaux</span></a></li>
                 <li><a href='peripherique.php'><span>Peripheriques</span></a></li>
                 <li class='last'><a href='consommable.php'><span>Consommables</span></a></li>
              </ul>
           </li>
           <?php if($_SESSION['type'] == "Technicien" || $_SESSION['type'] == "Administrateur"){ ?>
      <li class='active has-sub'><a href='#'><span>Maintenance</span></a>
      <ul>
        <li><a href='demande.php'><span>Liste des demandes</span></a></li>
      </ul>
      </li>
      <?php } ?>
     <?php if($_SESSION['type'] == "Administrateur"){ ?>
     <li class='active has-sub'><a href='#'><span>Administration</span></a>
     <ul>
       <li><a href='admin.php'><span>Gestion des utilisateurs</span></a></li>
        <li><a href='ajouter/lieu.php'><span>Ajouter un lieu</span></a></li>
     </ul>
     </li>
      <?php } ?>
      <li class='active has-sub'><a href='#'><span>Statistiques</span></a>
      <ul>
         <li><a href='stats.php'><span>Statistiques equipements</span></a></li>
      </ul>
      </li>
     <li class='last'><a href='deco.php'><span>Déconnection</span></a></li>
  </ul>
  </div> <br/>

  <form method="post" action="demande.php">


<?php
if(isset($_REQUEST['did']))
{
  $did=$_REQUEST['did'];
  $query=mysql_query("select * from demandes where id='$did'");
  $q=mysql_fetch_assoc($query);
echo"<fieldset>";
echo "<div><h2>Demande d'intervention</h2>
<h3>Equipement concerné :</h3>{$q['equipement']}
<h3>Description de la demande :</h3><p>{$q['description']} , emise le {$q['date']}";
if($q['etat']>0)
{ $num=1;
  $riq=mysql_query("select * from interventions where id='$did'");
  while($ET=mysql_fetch_assoc($riq))
  {
    if($ET['decision']==2)
    {
     $decision='Probleme resolu';
     echo"<div style='background:#7FFFD4;color:#000'>";
   }
      else {
       $decision='Probleme persistant';
       echo"<div style='background:#ff6666;color:#000'>";
     }
    echo"<h2>Rapport d'intervention N° $num :</h2>";
    echo"<p>Intervention faite le {$ET['date_intervention']}</p>";
    echo"<p>Type de maintenance : {$ET['type_maintenance']}</p>";
    echo"<p>Description : {$ET['description']}</p>";
    echo"<p>Prix depensé {$ET['prix']} DT</p>";
    echo"<p>Décision : $decision</p>";
    echo"<p>Technicien : {$ET['technicien']}</p>";
    $num++;
  }

} else echo"<div style='color:#ff6666'><h2>Traitement en attente</h2></div>";
echo"</fieldset>";
?>
<a class="link" href="./ajouter/traiter.php?tid=<?php echo($did)?>">Ajouter un rapport d'intervention pour cet equipement</a>
<?php
}

 ?>

<h1 align="">La liste des demandes d'interventions :</h1>
<table id="myTable" class="tab" border="1" width="100%" align="left">

      <tr>
        <th>Selection</th>
        <th>ID</th>
        <th>Equipement</th>
        <th>Description</th>
        <th>Date</th>
        <th>Statut</th>
        <th></th>
        <th></th>
        <th></th>
      </tr> <br/><br/><br/>

    <?php while($ET=mysql_fetch_assoc($rs)) { ?>
    <tr>
      <td><input type="checkbox" name="delid[]" value="<?php echo($ET['id']) ?> "></td>
      <td><?php echo($ET['id'])?></td>
      <td><?php echo($ET['equipement'])?></td>
      <td><?php echo($ET['description'])?></td>
      <td><?php echo($ET['date'])?></td>
      <td><?php echo($ET['urgence'])?></td>

      <?php if($_SESSION['type'] == "Technicien" || $_SESSION['type'] == "Administrateur"){ ?>
               <td><a class="link" href="./modifier/mod_demande.php?eid=<?php echo($ET['id'])?>"> Modifier</a></td>
               <td><a class="link" href="./ajouter/traiter.php?tid=<?php echo($ET['id'])?>">Traiter</a></td>
               <td><a class="link" href="demande.php?did=<?php echo($ET['id'])?>">Details</a></td>
               <?php } ?>

    </tr>
    <?php } ?>

    </table>
    </br></br></br></br></br></br></br>
    <form>
    <input class="supprimer" type="submit" name="supprimer" value="Supprimer">
  </form>

    </body>
</html>
