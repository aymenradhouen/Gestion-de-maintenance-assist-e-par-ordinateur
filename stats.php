<?php
require_once("connection.php");
session_start();
echo"<h3>Bonjour : ".$_SESSION["login"]."</h3>";

if(isset($_POST['chercher1'])){
$chercher1 = $_POST['chercher1'];
}
if(isset($_POST['resultat'])){
$resultat = $_POST['resultat'];
}
$r=mysql_query("select type,fabriquant from consommables");
$ri=mysql_query("select type,fabriquant from imprimantes");
$rm=mysql_query("select type,fabriquant from materiel_reseaux");
$rmo=mysql_query("select type,fabriquant from moniteurs");
$ro=mysql_query("select type,fabriquant from ordinateurs");
$rp=mysql_query("select type,fabriquant from peripheriques");

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
  <script>

  function message() {

  var s = document.getElementById('materiel');
  var select = s.options[s.selectedIndex].value;
  if (select == "consommables")
  {

    document.getElementById('stat1').style.display='block';
    document.getElementById('stat2').style.display='none';
    document.getElementById('stat3').style.display='none';
    document.getElementById('stat4').style.display='none';
    document.getElementById('stat5').style.display='none';
    document.getElementById('stat6').style.display='none';
    document.getElementById('resultat').style.display='block';
    document.getElementById('resultat1').style.display='none';
    document.getElementById('resultat2').style.display='none';
    document.getElementById('resultat3').style.display='none';
    document.getElementById('resultat4').style.display='none';
    document.getElementById('resultat5').style.display='none';

  }
else  if (select == "imprimantes")
  {
    document.getElementById('stat2').style.display='block';
    document.getElementById('stat1').style.display='none';
    document.getElementById('stat3').style.display='none';
    document.getElementById('stat4').style.display='none';
    document.getElementById('stat5').style.display='none';
    document.getElementById('stat6').style.display='none';
    document.getElementById('resultat1').style.display='block';
    document.getElementById('resultat').style.display='none';
    document.getElementById('resultat2').style.display='none';
    document.getElementById('resultat3').style.display='none';
    document.getElementById('resultat4').style.display='none';
    document.getElementById('resultat5').style.display='none';
  }
else  if (select == "materiels_reseaux")
  {
    document.getElementById('stat3').style.display='block';
    document.getElementById('stat2').style.display='none';
    document.getElementById('stat1').style.display='none';
    document.getElementById('stat4').style.display='none';
    document.getElementById('stat5').style.display='none';
    document.getElementById('stat6').style.display='none';
    document.getElementById('resultat2').style.display='block';
    document.getElementById('resultat1').style.display='none';
    document.getElementById('resultat').style.display='none';
    document.getElementById('resultat3').style.display='none';
    document.getElementById('resultat4').style.display='none';
    document.getElementById('resultat5').style.display='none';
  }
else  if (select == "moniteurs")
  {
    document.getElementById('stat4').style.display='block';
    document.getElementById('stat2').style.display='none';
    document.getElementById('stat3').style.display='none';
    document.getElementById('stat1').style.display='none';
    document.getElementById('stat5').style.display='none';
    document.getElementById('stat6').style.display='none';
    document.getElementById('resultat3').style.display='block';
    document.getElementById('resultat1').style.display='none';
    document.getElementById('resultat2').style.display='none';
    document.getElementById('resultat').style.display='none';
    document.getElementById('resultat4').style.display='none';
    document.getElementById('resultat5').style.display='none';
  }
else  if (select == "ordinateurs")
  {
    document.getElementById('stat5').style.display='block';
    document.getElementById('stat2').style.display='none';
    document.getElementById('stat3').style.display='none';
    document.getElementById('stat4').style.display='none';
    document.getElementById('stat1').style.display='none';
    document.getElementById('stat6').style.display='none';
    document.getElementById('resultat4').style.display='block';
    document.getElementById('resultat1').style.display='none';
    document.getElementById('resultat2').style.display='none';
    document.getElementById('resultat3').style.display='none';
    document.getElementById('resultat').style.display='none';
    document.getElementById('resultat5').style.display='none';
  }
else  if (select == "peripheriques")
  {
    document.getElementById('stat6').style.display='block';
    document.getElementById('stat2').style.display='none';
    document.getElementById('stat3').style.display='none';
    document.getElementById('stat4').style.display='none';
    document.getElementById('stat5').style.display='none';
    document.getElementById('stat1').style.display='none';
    document.getElementById('resultat5').style.display='block';
    document.getElementById('resultat1').style.display='none';
    document.getElementById('resultat2').style.display='none';
    document.getElementById('resultat3').style.display='none';
    document.getElementById('resultat4').style.display='none';
    document.getElementById('resultat').style.display='none';
  }

}
  </script>
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
</br></br></br>
<h2>Sélectionnez les statistiques d'equipements à visualiser</h2>


<select id="materiel" name="materiel" onclick="message()">
<option value="--">----</option>
<option <?php if (isset($materiel) && $materiel=="consommables") echo "selected";?> value="consommables">Consommables</option>
<option <?php if (isset($materiel) && $materiel=="imprimantes") echo "selected";?> value="imprimantes">Imprimantes</option>
<option <?php if (isset($materiel) && $materiel=="materiels_reseaux") echo "selected";?> value="materiels_reseaux">Materiels reseaux</option>
<option <?php if (isset($materiel) && $materiel=="moniteurs") echo "selected";?> value="moniteurs">Moniteurs</option>
<option <?php if (isset($materiel) && $materiel=="ordinateurs") echo "selected";?> value="ordinateurs">Ordinateurs</option>
<option <?php if (isset($materiel) && $materiel=="peripheriques") echo "selected";?> value="peripheriques">Peripheriques</option>
</select>

<form action="" method="post">

<select id="stat1" name="type" style="display:none">
  <option  value="type">Type</option>
  <option  value="fabriquant">Fabriquant</option>
</select>
<input id="resultat" style="display:none" type="submit" name="resultat" value="valider">
</form>

<form action="" method="post">
<select id="stat2" name="type1" style="display:none">
  <option  value="type1">Type</option>
  <option  value="fabriquant1">Fabriquant</option>
  </select>
  <input id="resultat1" style="display:none" type="submit" name="resultat1" value="valider">
</form>

<form action="" method="post">
<select id="stat3" name="type2" style="display:none">
  <option  value="type2">Type</option>
  <option  value="fabriquant2">Fabriquant</option>
  </select>
  <input id="resultat2" style="display:none" type="submit" name="resultat2" value="valider">
  </form>

<form action="" method="post">
<select id="stat4" name="type3" style="display:none">
  <option  value="type3">Type</option>
  <option   value="fabriquant3">Fabriquant</option>
  </select>
  <input id="resultat3" style="display:none" type="submit" name="resultat3" value="valider">
 </form>

<form action="" method="post">
<select id="stat5" name="type4" style="display:none">
  <option  value="type4">Type</option>
  <option  value="fabriquant4">Fabriquant</option>
  </select>
  <input id="resultat4" style="display:none" type="submit" name="resultat4" value="valider">
   </form>

<form action="" method="post">
<select id="stat6" name="type5" style="display:none">
  <option  value="type5">Type</option>
  <option  value="fabriquant5">Fabriquant</option>
</select>
<input id="resultat5" style="display:none" type="submit" name="resultat5" value="valider">
</form>


<?php if(isset($_POST['resultat'])){
  $type=$_POST['type'];
  if($type == 'type') { ?>
    <h3>Voici la liste des types de consommables :</h3>
<table class="tab" border="1" width="40%" >
  <?php
  $resultat0 = array(); ?>
  <tr>
    <th>Type</th>
    <th>Nombre</th>
  </tr>
  <?php while($ET=mysql_fetch_assoc($r)) {
    $r1=mysql_query("select count(type) as total from consommables where type='{$ET['type']}'");
    $ET1=mysql_fetch_assoc($r1);
    $num=$ET1['total'];
    if(!in_array($ET['type'],$resultat0))
    {
    ?>
    <tr>
      <td><?php echo($ET['type'])?></td>
    <?php  array_push($resultat0,$ET['type']); ?>
      <td><?php echo($num)?></td>
    </tr>
  <?php } } ?>
</table>
<?php } else if($type == 'fabriquant') { ?>
  <h3>Voici la liste des fabriquants de consommables :</h3>
<table class="tab" border="1" width="40%">
<?php
$resultat0 = array(); ?>
<tr>
  <th>Fabriquant</th>
  <th>Nombre</th>
</tr>
<?php while($ET=mysql_fetch_assoc($r)) {
  $r1=mysql_query("select count(fabriquant) as total from consommables where fabriquant='{$ET['fabriquant']}'");
  $ET1=mysql_fetch_assoc($r1);
  $num=$ET1['total'];
  if(!in_array($ET['fabriquant'],$resultat0))
  {
  ?>
  <tr>
    <td><?php echo($ET['fabriquant'])?></td>
  <?php  array_push($resultat0,$ET['fabriquant']); ?>
    <td><?php echo($num)?></td>
  </tr>
<?php } } ?>
</table>

<?php } }
if(isset($_POST['resultat1'])){
  $type1=$_POST['type1'];
if($type1 == 'type1') { ?>
  <h3>Voici la liste des types des imprimantes :</h3>
<table class="tab" border="1" width="40%">
<?php
$resultat0 = array(); ?>
<tr>
  <th>Type</th>
  <th>Nombre</th>
</tr>
<?php while($ET=mysql_fetch_assoc($ri)) {
  $r1=mysql_query("select count(type) as total from imprimantes where type='{$ET['type']}'");
  $ET1=mysql_fetch_assoc($r1);
  $num=$ET1['total'];
  if(!in_array($ET['type'],$resultat0))
  {
  ?>
  <tr>
    <td><?php echo($ET['type'])?></td>
  <?php  array_push($resultat0,$ET['type']); ?>
    <td><?php echo($num)?></td>
  </tr>
<?php } } ?>
</table>
<?php } else if($type1 == 'fabriquant1') { ?>
  <h3>Voici la liste des fabriquants des imprimantes :</h3>
<table class="tab" border="1" width="40%">
<?php
$resultat0 = array(); ?>
<tr>
  <th>Fabriquant</th>
  <th>Nombre</th>
</tr>
<?php while($ET=mysql_fetch_assoc($ri)) {
  $r1=mysql_query("select count(fabriquant) as total from imprimantes where fabriquant='{$ET['fabriquant']}'");
  $ET1=mysql_fetch_assoc($r1);
  $num=$ET1['total'];
  if(!in_array($ET['fabriquant'],$resultat0))
  {
  ?>
  <tr>
    <td><?php echo($ET['fabriquant'])?></td>
  <?php  array_push($resultat0,$ET['fabriquant']); ?>
    <td><?php echo($num)?></td>
  </tr>
<?php } } ?>
</table>

<?php } }
if(isset($_POST['resultat2'])){
  $type2=$_POST['type2'];
 if($type2 == 'type2') { ?>
  <h3>Voici la liste des types des materiels reseaux :</h3>
<table class="tab" border="1" width="40%">
<?php
$resultat0 = array(); ?>
<tr>
  <th>Type</th>
  <th>Nombre</th>
</tr>
<?php while($ET=mysql_fetch_assoc($rm)) {
  $r1=mysql_query("select count(type) as total from materiel_reseaux where type='{$ET['type']}'");
  $ET1=mysql_fetch_assoc($r1);
  $num=$ET1['total'];
  if(!in_array($ET['type'],$resultat0))
  {
  ?>
  <tr>
    <td><?php echo($ET['type'])?></td>
  <?php  array_push($resultat0,$ET['type']); ?>
    <td><?php echo($num)?></td>
  </tr>
<?php } } ?>
</table>
<?php } else if($type2 == 'fabriquant2') { ?>
  <h3>Voici la liste des fabriquants des materiels reseaux :</h3>
<table class="tab" border="1" width="40%">
<?php
$resultat0 = array(); ?>
<tr>
  <th>Fabriquant</th>
  <th>Nombre</th>
</tr>
<?php while($ET=mysql_fetch_assoc($rm)) {
  $r1=mysql_query("select count(fabriquant) as total from materiel_reseaux where fabriquant='{$ET['fabriquant']}'");
  $ET1=mysql_fetch_assoc($r1);
  $num=$ET1['total'];
  if(!in_array($ET['fabriquant'],$resultat0))
  {
  ?>
  <tr>
    <td><?php echo($ET['fabriquant'])?></td>
  <?php  array_push($resultat0,$ET['fabriquant']); ?>
    <td><?php echo($num)?></td>
  </tr>
<?php } } ?>
</table>

<?php } }
if(isset($_POST['resultat3'])){
  $type3=$_POST['type3'];
 if($type3 == 'type3') { ?>
  <h3>Voici la liste des types des moniteurs :</h3>
<table class="tab" border="1" width="40%">
<?php
$resultat0 = array(); ?>
<tr>
  <th>Type</th>
  <th>Nombre</th>
</tr>
<?php while($ET=mysql_fetch_assoc($rmo)) {
  $r1=mysql_query("select count(type) as total from moniteurs where type='{$ET['type']}'");
  $ET1=mysql_fetch_assoc($r1);
  $num=$ET1['total'];
  if(!in_array($ET['type'],$resultat0))
  {
  ?>
  <tr>
    <td><?php echo($ET['type'])?></td>
  <?php  array_push($resultat0,$ET['type']); ?>
    <td><?php echo($num)?></td>
  </tr>
<?php } } ?>
</table>
<?php } else if($type3 == 'fabriquant3') { ?>
  <h3>Voici la liste des fabriquants des moniteurs :</h3>
<table class="tab" border="1" width="40%">
<?php
$resultat0 = array(); ?>
<tr>
  <th>Fabriquant</th>
  <th>Nombre</th>
</tr>
<?php while($ET=mysql_fetch_assoc($rmo)) {
  $r1=mysql_query("select count(fabriquant) as total from moniteurs where fabriquant='{$ET['fabriquant']}'");
  $ET1=mysql_fetch_assoc($r1);
  $num=$ET1['total'];
  if(!in_array($ET['fabriquant'],$resultat0))
  {
  ?>
  <tr>
    <td><?php echo($ET['fabriquant'])?></td>
  <?php  array_push($resultat0,$ET['fabriquant']); ?>
    <td><?php echo($num)?></td>
  </tr>
<?php } } ?>
</table>

<?php } }
if(isset($_POST['resultat4'])){
  $type4=$_POST['type4'];
 if($type4 == 'type4') { ?>
  <h3>Voici la liste des types des ordinateurs :</h3>
<table class="tab" border="1" width="40%">
<?php
$resultat0 = array(); ?>
<tr>
  <th>Type</th>
  <th>Nombre</th>
</tr>
<?php while($ET=mysql_fetch_assoc($ro)) {
  $r1=mysql_query("select count(type) as total from ordinateurs where type='{$ET['type']}'");
  $ET1=mysql_fetch_assoc($r1);
  $num=$ET1['total'];
  if(!in_array($ET['type'],$resultat0))
  {
  ?>
  <tr>
    <td><?php echo($ET['type'])?></td>
  <?php  array_push($resultat0,$ET['type']); ?>
    <td><?php echo($num)?></td>
  </tr>
<?php } } ?>
</table>
<?php } else if($type4 == 'fabriquant4') { ?>
  <h3>Voici la liste des fabriquants des ordinateurs :</h3>
<table class="tab" border="1" width="40%">
<?php
$resultat0 = array(); ?>
<tr>
  <th>Fabriquant</th>
  <th>Nombre</th>
</tr>
<?php while($ET=mysql_fetch_assoc($ro)) {
  $r1=mysql_query("select count(fabriquant) as total from ordinateurs where fabriquant='{$ET['fabriquant']}'");
  $ET1=mysql_fetch_assoc($r1);
  $num=$ET1['total'];
  if(!in_array($ET['fabriquant'],$resultat0))
  {
  ?>
  <tr>
    <td><?php echo($ET['fabriquant'])?></td>
  <?php  array_push($resultat0,$ET['fabriquant']); ?>
    <td><?php echo($num)?></td>
  </tr>
<?php } } ?>
</table>

<?php } }
if(isset($_POST['resultat5'])){
  $type5=$_POST['type5'];
 if($type5 == 'type5') { ?>
  <h3>Voici la liste des types des peripheriques :</h3>
<table class="tab" border="1" width="40%">
<?php
$resultat0 = array(); ?>
<tr>
  <th>Type</th>
  <th>Nombre</th>
</tr>
<?php while($ET=mysql_fetch_assoc($rp)) {
  $r1=mysql_query("select count(type) as total from peripheriques where type='{$ET['type']}'");
  $ET1=mysql_fetch_assoc($r1);
  $num=$ET1['total'];
  if(!in_array($ET['type'],$resultat0))
  {
  ?>
  <tr>
    <td><?php echo($ET['type'])?></td>
  <?php  array_push($resultat0,$ET['type']); ?>
    <td><?php echo($num)?></td>
  </tr>
<?php } } ?>
</table>
<?php } else if($type5 == 'fabriquant5') { ?>
  <h3>Voici la liste des fabriquants des peripheriques :</h3>
<table class="tab" border="1" width="40%">
<?php
$resultat0 = array(); ?>
<tr>
  <th>Fabriquant</th>
  <th>Nombre</th>
</tr>
<?php while($ET=mysql_fetch_assoc($rp)) {
  $r1=mysql_query("select count(fabriquant) as total from peripheriques where fabriquant='{$ET['fabriquant']}'");
  $ET1=mysql_fetch_assoc($r1);
  $num=$ET1['total'];
  if(!in_array($ET['fabriquant'],$resultat0))
  {
  ?>
  <tr>
    <td><?php echo($ET['fabriquant'])?></td>
  <?php  array_push($resultat0,$ET['fabriquant']); ?>
    <td><?php echo($num)?></td>
  </tr>
<?php } } ?>
</table>

<?php }


 } ?>


 </body>
 </html>
