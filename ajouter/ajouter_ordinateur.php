<?php
require_once("connection.php");
if(isset($_POST['enregistrer']) && !empty($_POST))
{
  if(!empty($_POST['nom'])&&!empty($_POST['type'])&&!empty($_POST['fabriquant'])&&!empty($_POST['modele'])&&!empty($_POST['num_serie'])&&!empty($_POST['code_inv'])&&!empty($_POST['lieu'])&&!empty($_POST['affectation']))
   {
     $nom=mysql_real_escape_string($_POST['nom']);
     $type=$_POST['type'];
     $fabriquant=$_POST['fabriquant'];
     $modele=$_POST['modele'];
     $sys_exp=$_POST['sys_exp'];
     $processeur=$_POST['processeur'];
     $carte_graphique=$_POST['carte_graphique'];
     $ram=$_POST['ram'];
     $memoire_dur=$_POST['memoire_dur'];
     $lieu=$_POST['lieu'];
     $affectation=mysql_real_escape_string($_POST['affectation']);
     $num_serie=$_POST['num_serie'];
     $code_inv=mysql_real_escape_string($_POST['code_inv']);
     $date_achat=date('Y-m-d H:i:s');
     $commentaires=mysql_real_escape_string($_POST['commentaires']);

     $req ="insert into ordinateurs VALUES ('$id','$nom','$type','$fabriquant','$modele','$sys_exp','$processeur','$carte_graphique','$ram','$memoire_dur','$lieu','$affectation','$num_serie','$code_inv','$date_achat','$commentaires')";
     mysql_query($req);
     header('Location: ../ordinateur.php');
   }
   else echo "<p class='faux'>Champs requis ne sont pas remplis</td>";
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
<h1 align="">Ajouter un ordinateur :</h1><br />
<form method="post" action="">
  <fieldset>
  <legend><strong>Veuillez saisir les informations : </strong></legend>
  <table border="0">
                      <tr>
                     <td>Nom :</td>
                     <td><input type="text" name="nom"></td>
                   </tr>

<tr>
                     <td>Type :</td>
                     <td><select name="type">
                       <?php
                       $req ="select type from type_ordinateurs";
                       $rs = mysql_query($req) or die(mysql_error());
                       while($ET=mysql_fetch_assoc($rs))
                       {
                         echo"<option value='{$ET['type']}'>{$ET['type']}</option>";
                       }
                        ?>
                      </select>
                     <a href="type/type_ordinateur.php"><img class="img" src="add.jpg"></a></td>
                     </tr>
<tr>
                     <td>Fabriquant :</td>
                     <td><select name="fabriquant">
                       <?php
                       $req ="select fabriquant from fabriquant_ordinateurs";
                       $rs = mysql_query($req) or die(mysql_error());
                       while($ET=mysql_fetch_assoc($rs))
                       {
                         echo"<option value='{$ET['fabriquant']}'>{$ET['fabriquant']}</option>";
                       }
                        ?>
                      </select>
                     <a href="fabriquant/fabriquant_ordinateur.php"><img class="img" src="add.jpg"></a></td>
                     </tr>

<tr>
                     <td>Modele :</td>
                     <td><select name="modele">
                       <?php
                       $req ="select modele from modele_ordinateurs";
                       $rs = mysql_query($req) or die(mysql_error());
                       while($ET=mysql_fetch_assoc($rs))
                       {
                         echo"<option value='{$ET['modele']}'>{$ET['modele']}</option>";
                       }
                        ?>
                      </select>
                     <a href="modele/modele_ordinateur.php"><img class="img" src="add.jpg"></a></td>
                     </tr>
<tr>
                     <td>Systeme d'exploitation :</td>
                     <td><select name="sys_exp">
                       <option value="windowsXp">Windows XP</option>
                       <option value="windows7">Windows 7</option>
                       <option value="windows8">Windows 8</option>
                       <option value="windows10">Windows 10</option>
                     </select></td>
                     </tr>
<tr>
                     <td>Processeur :</td>
                     <td><input type="text" name="processeur"></td>
                     </tr>
<tr>
                     <td>Carte graphique :</td>
                     <td><input type="text" name="carte_graphique"></td>
                     </tr>
<tr>
                     <td>RAM :</td>
                     <td><input type="text" name="ram"></td>
                     </tr>
<tr>
                     <td>Capacité disque dur :</td>
                     <td><input type="text" name="memoire_dur"></td>
                     </tr>
<tr>
                     <td>Lieu :</td>
                     <td><select name="lieu">
                       <?php
                       $req ="select lieu from lieu_aff";
                       $rs = mysql_query($req) or die(mysql_error());
                       while($ET=mysql_fetch_assoc($rs))
                       {
                         echo"<option value='{$ET['lieu']}'>{$ET['lieu']}</option>";
                       }
                        ?>
                      </select></td>
                      </tr>
<tr>
                     <td>Affectation :</td>
                     <td><input type="text" name="affectation"></td>
                     </tr>

<tr>
                    <td>Numero de serie :</td>
                    <td><input type="text" name="num_serie"></td>
                    </tr>

<tr>
                    <td>Code inventaire :</td>
                    <td><input type="text" name="code_inv"></td>
<tr>
                    <td>Créer le :</td>
                    <td><?php echo date('Y-m-d H:i:s'); ?></td>
                    </tr>

<tr>
                     <td>Commentaire :</td>
                     <td><TEXTAREA class="area" name="commentaires" rows=4 cols=40></TEXTAREA></td>
                     </tr>
                   </table>

                     <input name="enregistrer" type="submit" value="Enregistrer">
                     <a href="../ordinateur.php">
                         <input type="button" value="Annuler">
                     </a>

                 </fieldset>
</form>
    </body>
</html>
