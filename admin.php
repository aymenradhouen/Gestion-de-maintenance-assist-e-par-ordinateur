<?php
require_once("connection.php");
if(isset($_REQUEST["supprimer"]))
{
  if(!empty($_REQUEST["delid"]))
  {
  $delid=$_REQUEST["delid"];
  $a=implode(",",$delid);
  mysql_query("delete from users where id in ($a)");
  } else echo "<p class='faux'>Veuillez selectioner quelque chose a supprimer !</p>";
}
$req="select * from users order by id";
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

<form method="post" action="ajouter/ajouter_utilisateur.php">
  <input class="ajouter" type="submit" name="ajouter" value="Ajouter">
</form>

<form method="post" action="#">




<table class="tab" border="1" width="100%" align="left">

      <tr>
        <th>Selection</th>
        <th>ID</th>
        <th>Login</th>
        <th>Mot de passe</th>
        <th>Email</th>
        <th>Type d'accees</th>
        <th></th>
        <br/><br/><br/>

    <?php while($ET=mysql_fetch_assoc($rs)) { ?>
    <tr>
      <td><input type="checkbox" name="delid[]" value="<?php echo($ET['id']) ?> "></td>
      <td><?php echo($ET['id'])?></td>
      <td><?php echo($ET['login'])?></td>
      <td><?php echo($ET['passwd'])?></td>
      <td><?php echo($ET['email'])?></td>
      <td><?php echo($ET['type'])?></td>

             <?php  if($_SESSION['type'] == "Administrateur"){ ?>
                 <td><a class="link" href="./modifier/mod_utilisateur.php?eid=<?php echo($ET['id'])?>"> Modifier</a></td>
               <?php } ?>
    </tr>
  <?php } ?>

</table>
    <input class="supprimer" type="submit" name="supprimer" value="Supprimer">
  </form>
    </body>
</html>
