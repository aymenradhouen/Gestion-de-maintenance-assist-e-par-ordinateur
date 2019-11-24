<?php
require_once("connection.php");
if(isset($_POST['enregistrer']) && !empty($_POST))
{
  if(!empty($_POST['nom'])&&!empty($_POST['type'])&&!empty($_POST['fabriquant'])&&!empty($_POST['modele'])&&!empty($_POST['num_serie'])&&!empty($_POST['code_inv'])&&!empty($_POST['carac'])&&!empty($_POST['lieu'])&&!empty($_POST['affectation']))
   {
     $nom=mysql_real_escape_string($_POST['nom']);
     $type=$_POST['type'];
     $fabriquant=$_POST['fabriquant'];
     $modele=$_POST['modele'];
     $lieu=$_POST['lieu'];
     $affectation=mysql_real_escape_string($_POST['affectation']);
     $date = date('Y-m-d H:i:s');
     $num_serie=$_POST['num_serie'];
     $code_inv=mysql_real_escape_string($_POST['code_inv']);
     $carac=$_POST['carac'];
     $d=implode(",", $carac);
     $date_achat=date('Y-m-d H:i:s');
     $commentaires=mysql_real_escape_string($_POST['commentaires']);

     $req ="insert into imprimantes VALUES ('$id','$nom','$type','$fabriquant','$modele','$lieu','$affectation','$num_serie','$code_inv','$d','$date_achat','$commentaires')";
     mysql_query($req);
     header('Location: ../imprimante.php');
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
<h1 align="">Ajouter une imprimante :</h1><br />
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
                       $req ="select type from type_imprimantes";
                       $rs = mysql_query($req) or die(mysql_error());
                       while($ET=mysql_fetch_assoc($rs))
                       {
                         echo"<option value='{$ET['type']}'>{$ET['type']}</option>";
                       }
                        ?>
                      </select>
                     <a href="type/type_imprimante.php"><img class="img" src="add.jpg"></a></td>
</tr>
<tr>
                     <td>Fabriquant :</td>
                     <td><select name="fabriquant">
                       <?php
                       $req ="select fabriquant from fabriquant_imprimantes";
                       $rs = mysql_query($req) or die(mysql_error());
                       while($ET=mysql_fetch_assoc($rs))
                       {
                         echo"<option value='{$ET['fabriquant']}'>{$ET['fabriquant']}</option>";
                       }
                        ?>
                      </select>
                     <a href="fabriquant/fabriquant_imprimante.php"><img class="img" src="add.jpg"></a></td>
</tr>
<tr>
                     <td>Modele :</td>
                     <td><select name="modele">
                       <?php
                       $req ="select modele from modele_imprimantes";
                       $rs = mysql_query($req) or die(mysql_error());
                       while($ET=mysql_fetch_assoc($rs))
                       {
                         echo"<option value='{$ET['modele']}'>{$ET['modele']}</option>";
                       }
                        ?>
                      </select>
                     <a href="modele/modele_imprimante.php"><img class="img" src="add.jpg"></a></td>
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
                     <td><select name="affectation">
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
                     <td><input type="text" name="num_serie"></td>
</tr>
<tr>
                     <td>Code inventaire :</td>
                     <td><input type="text" name="code_inv"></td>
</tr>
<tr>
                     <td><label>Caractéristique</label></td>
                     <td><input type="checkbox" name="carac[]" value="serie">Serie
                     <input type="checkbox" name="carac[]" value="parallele">Parallele
                     <input type="checkbox" name="carac[]" value="wifi">Wifi
                     <input type="checkbox" name="carac[]" value="ethernet">Ethernet
                     <input type="checkbox" name="carac[]" value="usb">USB</td>

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
                     <a href="../imprimante.php">
                         <input type="button" value="Annuler" />
                     </a>

                 </fieldset>
               </form>

    </body>
</html>
