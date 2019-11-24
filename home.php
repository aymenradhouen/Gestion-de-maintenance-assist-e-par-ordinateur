<?php
require_once("connection.php");
session_start();
echo"<h3>Bonjour : ".$_SESSION["login"]."</h3>";
?>

<!doctype html>
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
  </div>

   <h1 align="">Stock :</h1>
   <table class="tab" border="1" width="20%" align="left">
     <tr>
       <th>Equipement</th>
       <th>Quantite</th>
     </tr>
   <tr>
     <td><a class="link" href="consommable.php">Consommables</td>
   <td>
     <?php
      $a=mysql_query("select count(nom) as total from consommables");
      $r=mysql_fetch_assoc($a);
      $num=$r['total'];
      echo $num;?></td>
    </tr>
    <tr>
     <td><a class="link" href="imprimante.php">Imprimantes</td>
     <td>
       <?php
        $a=mysql_query("select count(nom) as total from imprimantes");
        $r=mysql_fetch_assoc($a);
        $num=$r['total'];
        echo $num;?></td>
    </tr>
    <tr>
     <td><a class="link" href="materielres.php">Matériels reseaux</td>
     <td>
       <?php
        $a=mysql_query("select count(nom) as total from materiel_reseaux");
        $r=mysql_fetch_assoc($a);
        $num=$r['total'];
        echo $num;?></td>
    </tr>
    <tr>
     <td><a class="link" href="moniteur.php">Moniteurs</td>
     <td>
       <?php
        $a=mysql_query("select count(nom) as total from moniteurs");
        $r=mysql_fetch_assoc($a);
        $num=$r['total'];
        echo $num;?></td>
    </tr>
    <tr>
     <td><a class="link" href="ordinateur.php">Ordinateurs</td>
     <td>
       <?php
        $a=mysql_query("select count(nom) as total from ordinateurs");
        $r=mysql_fetch_assoc($a);
        $num=$r['total'];
        echo $num;?></td>
    </tr>
    <tr>
     <td><a class="link" href="peripherique.php">Peripheriques</td>
     <td>
       <?php
        $a=mysql_query("select count(nom) as total from peripheriques");
        $r=mysql_fetch_assoc($a);
        $num=$r['total'];
        echo $num;?></td>
    </tr>
  </table>
  </br></br></br></br></br></br></br></br></br></br></br>

  <?php
  $d=mysql_query("select * from demandes where etat <2 order by id");
  $count=mysql_num_rows($d);
  if($count >0)
  {
  ?>
  <?php if($_SESSION['type'] == "Technicien" || $_SESSION['type'] == "Administrateur"){ ?>
     <h1>La liste des demandes en attentes :</h1>
     <table class="tab" border="1" width="70%" align="left">

           <tr>
             <th>ID</th>
             <th>Equipement</th>
             <th>Description</th>
             <th>Date</th>
             <th>Statut</th>
             <th></th>
             <th></th>
             <th></th>
           </tr> <br/><br/><br/>

         <?php while($ET=mysql_fetch_assoc($d)) { ?>
         <tr>
           <td><?php echo($ET['id'])?></td>
           <td><?php echo($ET['equipement'])?></td>
           <td><?php echo($ET['description'])?></td>
           <td><?php echo($ET['date'])?></td>
           <td><?php echo($ET['urgence'])?></td>

                   <?php if($_SESSION['type'] == "Administrateur"){ ?>
                      <td><a class="link" href="./modifier/mod_demande.php?eid=<?php echo($ET['id'])?>"> Modifier</a></td>
                    <?php } ?>
                    <td><a class="link" href="./ajouter/traiter.php?tid=<?php echo($ET['id'])?>">Traiter</a></td>
                    <td><a class="link" href="demande.php?did=<?php echo($ET['id'])?>">Details</a></td>

         </tr>
         <?php } ?>

       </table>
     <?php } ?>
       </br></br></br><br/></br></br></br></br>
<?php } ?>
<h1>Rechercher :</h1><br />
<fieldset>
  <legend>Rechercher equipement :</legend>
  <?php
  if(isset($_POST['submit']) )
  {
    if(!empty($_POST['chercher']))
    {

    $radio = $_POST['equipement'];
  } else echo"";
}
    ?>
<form method="post">
<input type="text" name="chercher">
<p>Equipement :</p>
<input type="radio" name="equipement" <?php if (isset($radio) && $radio=="consommable") echo "checked";?> value="consommable">Consommable
<input type="radio" name="equipement" <?php if (isset($radio) && $radio=="imprimante") echo "checked";?> value="imprimante">Imprimante
<input type="radio" name="equipement" <?php if (isset($radio) && $radio=="materielres") echo "checked";?> value="materielres">Matériel reseau
<input type="radio" name="equipement" <?php if (isset($radio) && $radio=="moniteur") echo "checked";?> value="moniteur">Moniteur
<input type="radio" name="equipement" <?php if (isset($radio) && $radio=="ordinateur") echo "checked";?> value="ordinateur">Ordinateur
<input type="radio" name="equipement" <?php if (isset($radio) && $radio=="peripherique") echo "checked";?> value="peripherique">Peripherique
<input type="submit" name="submit">
</from>
</br></br>
<?php
if(isset($_POST['submit']) )
{
  if(!empty($_POST['chercher']))
  {
  $radio = $_POST['equipement'];
  if (isset($radio) && $radio=="consommable")
  {

$chercher=$_POST['chercher'];
$req=mysql_query("select * from consommables where nom like '%$chercher%' OR type like '%$chercher%' OR fabriquant like '%$chercher%' OR date_achat like '%$chercher%'");
$count=mysql_num_rows($req);
if ($count >0)
{
?>
<table class="tab" id="myTable" border="1" width="70%" align="center">
<tr>
<th>ID</th>
<th>Nom</th>
<th>Type</th>
<th>Fabriquant</th>
<th>Date achat</th>
<th>Commentaires</th>
<?php if($_SESSION['type'] == "Administrateur du parc" || $_SESSION['type'] == "Administrateur"){ ?>
<th></th> <?php } ?>
</tr>

<?php
while($ET=mysql_fetch_assoc($req))
{
  ?>
  <tr>
    <td><?php echo($ET['id'])?></td>
    <td><?php echo($ET['nom'])?></td>
    <td><?php echo($ET['type'])?></td>
    <td><?php echo($ET['fabriquant'])?></td>
    <td><?php echo($ET['date_achat'])?></td>
    <td><?php echo($ET['commentaires'])?></td>

            <?php if($_SESSION['type'] == "Administrateur du parc" || $_SESSION['type'] == "Administrateur"){ ?>
               <td><a class="link" href="./modifier/mod_consommable.php?eid=<?php echo($ET['id'])?>"> Modifier</a></td>
             <?php } ?>
  </tr>
  <?php
}
?>
</table>
<?php
} else echo "<div class='alert'>
<span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span>
Aucun résultat trouvé !
</div>";
} else if (isset($radio) && $radio=="imprimante")
{
   $chercher=$_POST['chercher'];
   $req=mysql_query("select * from imprimantes where nom like '%$chercher%' OR type like '%$chercher%' OR fabriquant like '%$chercher%' OR modele like '%$chercher%' OR num_serie like '%$chercher%' OR code_inv like '%$chercher%' OR date_achat like '%$chercher%'");
   $count=mysql_num_rows($req);
   if ($count >0)
   {
 ?>
  <table class="tab" border="1" width="70%" align="center">

  <tr>
  <th>ID</th>
  <th>Nom</th>
  <th>Type</th>
  <th>Fabriquant</th>
  <th>Modele</th>
  <th>Numero de serie</th>
  <th>Code inventaire</th>
  <th>Caractéristiques</th>
  <th>Date d'achat</th>
  <th>Commentaires</th>
  <th></th>
  <?php if($_SESSION['type'] == "Administrateur du parc" || $_SESSION['type'] == "Administrateur"){ ?>
  <th></th>
   <?php } ?>
  </tr>
  <br/><br/><br/>

  <?php while($ET=mysql_fetch_assoc($req)) { ?>
  <tr>
  <td><?php echo($ET['id'])?></td>
  <td><?php echo($ET['nom'])?></td>
  <td><?php echo($ET['type'])?></td>
  <td><?php echo($ET['fabriquant'])?></td>
  <td><?php echo($ET['modele'])?></td>
  <td><?php echo($ET['num_serie'])?></td>
  <td><?php echo($ET['code_inv'])?></td>
  <td><?php echo($ET['caracteristiques'])?></td>
  <td><?php echo($ET['date_achat'])?></td>
  <td><?php echo($ET['commentaires'])?></td>

  <?php if($_SESSION['type'] == "Administrateur du parc" || $_SESSION['type'] == "Administrateur"){ ?>
     <td><a class="link" href="./modifier/mod_imprimante.php?eid=<?php echo($ET['id'])?>"> Modifier</a></td>
   <?php } ?>
   <?php if($_SESSION['type'] == "Technicien" || $_SESSION['type'] == "Administrateur"){ ?>
   <td><a class="link" href="imprimante.php?did=<?php echo($ET['modele'])?>">Intervention</a></td>
<?php } ?>
</tr>
    <?php } ?>
  </table>
<?php
} else echo "<div class='alert'>
<span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span>
Aucun résultat trouvé !
</div>";
} else if (isset($radio) && $radio=="materielres")
{
$chercher=$_POST['chercher'];
$req=mysql_query("select * from materiel_reseaux where nom like '%$chercher%' OR type like '%$chercher%' OR fabriquant like '%$chercher%' OR modele like '%$chercher%' OR num_serie like '%$chercher%' OR code_inv like '%$chercher%' OR date_achat like '%$chercher%'");
$count=mysql_num_rows($req);
if ($count >0)
{
 ?>
  <table class="tab" border="1" width="70%" align="center">

  <tr>
  <th>ID</th>
  <th>Nom</th>
  <th>Type</th>
  <th>Fabriquant</th>
  <th>Modele</th>
  <th>Numero de serie</th>
  <th>Code inventaire</th>
  <th>Adresse MAC</th>
  <th>Date d'achat</th>
  <th>Commentaires</th>
    <th></th>
  <?php if($_SESSION['type'] == "Administrateur du parc" || $_SESSION['type'] == "Administrateur"){ ?>
  <th></th> <?php } ?>
  </tr>
   <br/><br/><br/>

  <?php while($ET=mysql_fetch_assoc($req)) { ?>
  <tr>
  <td><?php echo($ET['id'])?></td>
  <td><?php echo($ET['nom'])?></td>
  <td><?php echo($ET['type'])?></td>
  <td><?php echo($ET['fabriquant'])?></td>
  <td><?php echo($ET['modele'])?></td>
  <td><?php echo($ET['num_serie'])?></td>
  <td><?php echo($ET['code_inv'])?></td>
  <td><?php echo($ET['adresse_mac'])?></td>
  <td><?php echo($ET['date_achat'])?></td>
  <td><?php echo($ET['commentaires'])?></td>

  <?php if($_SESSION['type'] == "Administrateur du parc" || $_SESSION['type'] == "Administrateur"){ ?>
     <td><a class="link" href="./modifier/mod_materielRes.php?eid=<?php echo($ET['id'])?>"> Modifier</a></td>
   <?php } ?>
   <?php if($_SESSION['type'] == "Technicien" || $_SESSION['type'] == "Administrateur"){ ?>
   <td><a class="link" href="materielres.php?did=<?php echo($ET['modele'])?>">Intervention</a></td>
<?php } ?>
</tr>
<?php } ?>

  </table>
  <?php
}else echo "<div class='alert'>
<span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span>
Aucun résultat trouvé !
</div>";
} else if (isset($radio) && $radio=="moniteur")
{
  $chercher=$_POST['chercher'];
  $req=mysql_query("select * from moniteurs where nom like '%$chercher%' OR type like '%$chercher%' OR fabriquant like '%$chercher%' OR modele like '%$chercher%' OR num_serie like '%$chercher%' OR code_inv like '%$chercher%' OR date_achat like '%$chercher%'");
  $count=mysql_num_rows($req);
  if ($count >0)
  {
?>
<table class="tab" border="1" width="70%" align="center">

<tr>
<th>ID</th>
<th>Nom</th>
<th>Type</th>
<th>Fabriquant</th>
<th>Modele</th>
<th>Numero de serie</th>
<th>Code inventaire</th>
<th>Caractéristiques</th>
<th>Taille</th>
<th>Date d'achat</th>
<th>Commentaires</th>
<th></th>
<?php if($_SESSION['type'] == "Administrateur du parc" || $_SESSION['type'] == "Administrateur"){ ?>
<th></th> <?php } ?>
</tr>
 <br/><br/><br/>

<?php while($ET=mysql_fetch_assoc($req)) { ?>
<tr>
<td><?php echo($ET['id'])?></td>
<td><?php echo($ET['nom'])?></td>
<td><?php echo($ET['type'])?></td>
<td><?php echo($ET['fabriquant'])?></td>
<td><?php echo($ET['modele'])?></td>
<td><?php echo($ET['num_serie'])?></td>
<td><?php echo($ET['code_inv'])?></td>
<td><?php echo($ET['caracteristiques'])?></td>
<td><?php echo($ET['taille'])?></td>
<td><?php echo($ET['date_achat'])?></td>
<td><?php echo($ET['commentaires'])?></td>

<?php if($_SESSION['type'] == "Administrateur du parc" || $_SESSION['type'] == "Administrateur"){ ?>
   <td><a class="link" href="modifier/mod_moniteur.php?eid=<?php echo($ET['id'])?>"> Modifier</a></td>
 <?php } ?>
 <?php if($_SESSION['type'] == "Technicien" || $_SESSION['type'] == "Administrateur"){ ?>
 <td><a class="link" href="moniteur.php?did=<?php echo($ET['modele'])?>">Intervention</a></td>
<?php } ?>
</tr>
<?php } ?>

</table>
<?php
}else echo "<div class='alert'>
<span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span>
Aucun résultat trouvé !
</div>";
} else if (isset($radio) && $radio=="ordinateur")
{
  $chercher=$_POST['chercher'];
  $req=mysql_query("select * from ordinateurs where nom like '%$chercher%' OR type like '%$chercher%' OR fabriquant like '%$chercher%' OR modele like '%$chercher%' OR num_serie like '%$chercher%' OR code_inv like '%$chercher%' OR date_achat like '%$chercher%'");
  $count=mysql_num_rows($req);
  if ($count >0)
  {
?>
<table class="tab" border="1" width="70%" align="center">

<tr>
<th>ID</th>
<th>Nom</th>
<th>Type</th>
<th>Fabriquant</th>
<th>Modele</th>
<th>Numero de serie</th>
<th>Code inventaire</th>
<th>Date d'achat</th>
<th>Commentaires</th>
<th></th>
<th></th>
<?php if($_SESSION['type'] == "Administrateur du parc" || $_SESSION['type'] == "Administrateur"){ ?>
<th></th> <?php } ?>
</tr>
 <br/><br/><br/>

<?php while($ET=mysql_fetch_assoc($req)) { ?>
<tr>
<td><?php echo($ET['id'])?></td>
<td><?php echo($ET['nom'])?></td>
<td><?php echo($ET['type'])?></td>
<td><?php echo($ET['fabriquant'])?></td>
<td><?php echo($ET['modele'])?></td>
<td><?php echo($ET['num_serie'])?></td>
<td><?php echo($ET['code_inv'])?></td>
<td><?php echo($ET['date_achat'])?></td>
<td><?php echo($ET['commentaires'])?></td>

<?php if($_SESSION['type'] == "Administrateur du parc" || $_SESSION['type'] == "Administrateur"){ ?>
   <td><a class="link" href="modifier/mod_ordinateur.php?eid=<?php echo($ET['id'])?>"> Modifier</a></td>
 <?php } ?>
 <?php if($_SESSION['type'] == "Technicien" || $_SESSION['type'] == "Administrateur"){ ?>
 <td><a class="link" href="ordinateur.php?did=<?php echo($ET['modele'])?>">Intervention</a></td>
 <?php } ?>
 <td><a class="link" href="ordinateur.php?detid=<?php echo($ET['id'])?>">Details</a></td>
</tr>
<?php } ?>

</table>
  <?php
}else echo "<div class='alert'>
<span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span>
Aucun résultat trouvé !
</div>";
} else if (isset($radio) && $radio=="peripherique")
{
  $chercher=$_POST['chercher'];
  $req=mysql_query("select * from peripheriques where nom like '%$chercher%' OR type like '%$chercher%' OR fabriquant like '%$chercher%' OR modele like '%$chercher%' OR num_serie like '%$chercher%' OR code_inv like '%$chercher%' OR date_achat like '%$chercher%'");
  $count=mysql_num_rows($req);
  if ($count >0)
  {
?>
<table class="tab" border="1" width="70%" align="center">

<tr>
<th>ID</th>
<th>Nom</th>
<th>Type</th>
<th>Fabriquant</th>
<th>Modele</th>
<th>Numero de serie</th>
<th>Code inventaire</th>
<th>Date d'achat</th>
<th>Commentaires</th>
<th></th>
<th></th>
<th></th>
</tr>
<br/><br/><br/>

<?php while($ET=mysql_fetch_assoc($req)) { ?>
<tr>
<td><?php echo($ET['id'])?></td>
<td><?php echo($ET['nom'])?></td>
<td><?php echo($ET['type'])?></td>
<td><?php echo($ET['fabriquant'])?></td>
<td><?php echo($ET['modele'])?></td>
<td><?php echo($ET['num_serie'])?></td>
<td><?php echo($ET['code_inv'])?></td>
<td><?php echo($ET['date_achat'])?></td>
<td><?php echo($ET['commentaires'])?></td>

<?php if($_SESSION['type'] == "Administrateur"){ ?>
<td><a class="link" href="./modifier/mod_peripherique.php?eid=<?php echo($ET['id'])?>"> Modifier</a></td>
<?php } ?>
<td><a class="link" href="./ajouter/ajouter_demande.php?pid=<?php echo($ET['id'])?>">Intervention</a></td>
</tr>
<?php } ?>

</table>
<?php
}else echo "<div class='alert'>
<span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span>
Aucun résultat trouvé !
</div>";
}else echo "<div class='alert'>
<span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span>
Aucun résultat trouvé !
</div>";
}}
?>
</fieldset> </br></br>


<fieldset>
  <legend>Rechercher une demande d'intervention :</legend>
  <form method="post">
  <input type="text" name="trouver">
  <input type="submit" name="urgence" value="chercher">
</form>

</br></br></br>
<?php
if(isset($_POST['urgence']))
{
  if(!empty($_POST['trouver']))
  {
  $trouver=$_POST['trouver'];
  $rq=mysql_query("select * from demandes where equipement like '%$trouver%' OR description like '%$trouver%' OR urgence like '%$trouver%'");
  $count=mysql_num_rows($rq);
  if($count >0)
  {
?>
<table class="tab" border="1" width="70%" align="center">

<tr>
<th>ID</th>
<th>equipement</th>
<th>Description</th>
<th>Date</th>
<th>Statut</th>
<th></th>
<th></th>
</tr>

<?php
while($ET=mysql_fetch_assoc($rq))
{
  ?>
  <tr>
    <td><?php echo($ET['id'])?></td>
    <td><?php echo($ET['equipement'])?></td>
    <td><?php echo($ET['description'])?></td>
    <td><?php echo($ET['date'])?></td>
    <td><?php echo($ET['urgence'])?></td>

            <?php if($_SESSION['type'] == "Administrateur"){ ?>
               <td><a class="link" href="./modifier/mod_consommable.php?eid=<?php echo($ET['id'])?>"> Modifier</a></td>
             <?php } ?>
             <td><a class="link" href="demande.php?did=<?php echo($ET['id'])?>">Details</a></td>

  </tr>
  <?php
}
}else echo "<div class='alert'>
<span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span>
Aucun résultat trouvé !
</div>";
}else echo "<div class='alert'>
<span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span>
Aucun résultat trouvé !
</div>";
}
?>
</table>
</fieldset>

</body>
</html>
