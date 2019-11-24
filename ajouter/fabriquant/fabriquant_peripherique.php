<?php
require_once("../connection.php");
if(isset($_POST['enregistrer']) && !empty($_POST))
{
  if(!empty($_POST['fabriquant']))
   {

     $fabriquant=mysql_real_escape_string($_POST['fabriquant']);

     $req ="insert into fabriquant_peripheriques VALUES ('$id','$fabriquant')";
     mysql_query($req);
     header('Location: ../ajouter_peripherique.php');
   }
   else echo "<p class='faux'>Champs requis ne sont pas remplis</p>";
}
$req = "select * from fabriquant_peripheriques order by id";
$rs=mysql_query($req);

if(isset($_REQUEST["delid"]))
{
  $delid=$_REQUEST["delid"];
  mysql_query("delete from fabriquant_peripheriques where id='$delid'");
  header('Location: fabriquant_peripherique.php');
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
   <link rel="stylesheet" href="../../css/styles1.css">
   <script src="jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
   <title>GMAO</title>
</head>
<body>

  <div id='cssmenu'>
  <ul>
    <li><a href='../../home.php'><span>Accueil</span></a></li>
     <li class='active has-sub'><a href='#'><span>Parc</span></a>
              <ul>
                <ul>
                   <li><a href='../../ordinateur.php'><span>Ordinateurs</span></a></li>
                   <li><a href='../../imprimante.php'><span>Imprimantes</span></a></li>
                   <li><a href='../../moniteur.php'><span>Moniteurs</span></a></li>
                   <li><a href='../../materielRes.php'><span>Materiel reseaux</span></a></li>
                   <li><a href='../../peripherique.php'><span>Peripheriques</span></a></li>
                   <li class='last'><a href='../../consommable.php'><span>Consommables</span></a></li>
                </ul>
              </ul>
           </li>
           <?php if($_SESSION['type'] == "Technicien" || $_SESSION['type'] == "Administrateur"){ ?>
     <li class='active has-sub'><a href='#'><span>Maintenance</span></a>
     <ul>
        <li><a href='../../demande.php'><span>Liste des demandes</span></a></li>
     </ul>
     </li>
   <?php } ?>
   <?php if($_SESSION['type'] == "Administrateur"){ ?>
   <li class='active has-sub'><a href='#'><span>Administration</span></a>
   <ul>
     <li><a href='../../admin.php'><span>Gestion des utilisateurs</span></a></li>
      <li><a href='../lieu.php'><span>Ajouter un lieu</span></a></li>
   </ul>
   </li>
    <?php } ?>
     <li class='active has-sub'><a href='#'><span>Statistiques</span></a>
     <ul>
        <li><a href='../../stats.php'><span>Statistiques equipements</span></a></li>
     </ul>
     </li>
     <li class='last'><a href='deco.php'><span>Déconnection</span></a></li>
  </ul>
  </div>
<h1 align="">Ajouter un type de peripheriques :</h1><br />
<form method="post" action="">

                     <fieldset>
                       <legend><strong>Veuillez saisir les informations : </strong></legend>


                     <p>Fabriquant :</p>
                     <input type="text" name="fabriquant">

                     <input name="enregistrer" type="submit" value="Enregistrer">
                     <a href="../ajouter_peripherique.php">
                         <input type="button" value="Annuler">
                     </a>

                 </fieldset>
      </form>
      <table class="tab" border="1" width="40%" align="center">
         <tr><th>Fabriquant</th><th></th></tr>

         <?php while($ET=mysql_fetch_assoc($rs)) { ?>
         <tr>
           <td><?php echo($ET['fabriquant'])?></td>
             <td><a href="fabriquant_peripherique.php?delid=<?php echo($ET['id'])?>">Supprimer</a></td>
         </tr>
         <?php } ?>

      </table>
    </body>
</html>
