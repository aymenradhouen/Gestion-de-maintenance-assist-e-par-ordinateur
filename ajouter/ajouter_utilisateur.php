<?php
require_once("connection.php");
if(isset($_POST['enregistrer']) && !empty($_POST))
{
  if(!empty($_POST['login'])&&!empty($_POST['passwd'])&&!empty($_POST['email'])&&!empty($_POST['type']))
   {
     $login=$_POST['login'];
     $passwd=$_POST['passwd'];
     $email=$_POST['email'];
     $type=$_POST['type'];

     $req ="insert into users VALUES ('$id','$login','$passwd','$email','$type')";
     mysql_query($req);
     header('Location: ../admin.php');
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
<h1 align="">Ajouter un utilisateur :</h1><br />
<form method="post" action="">

  <fieldset>
  <legend><strong>Veuillez saisir les informations : </strong></legend>
  <table class="tab1" border="0">
<tr>
                     <td>Login :</td>
                     <td><input type="text" name="login"></td>
</tr>
<tr>
                     <td>Mot de passe :</td>
                     <td><input type="text" name="passwd"></td>
</tr>
<tr>
                     <td>Email :</td>
                     <td><input type="email" name="email"></td>
</tr>
<tr>
                     <td>Type :</td>
                     <td><select name="type">
                       <?php
                       $req ="select type from type_users";
                       $rs = mysql_query($req) or die(mysql_error());
                       while($ET=mysql_fetch_assoc($rs))
                       {
                         echo"<option value='{$ET['type']}'>{$ET['type']}</option>";
                       }
                        ?>
                      </select></td>
</tr>
</table>
                     <input name="enregistrer" type="submit" value="Enregistrer">
                     <a href="../admin.php">
                         <input type="button" value="Annuler">
                     </a>


                 </fieldset>
</form>
    </body>
</html>
