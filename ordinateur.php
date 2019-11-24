<?php
require_once("connection.php");
if(isset($_REQUEST["supprimer"]))
{
  if(!empty($_REQUEST["delid"]))
  {
  $delid=$_REQUEST["delid"];
  $a=implode(",",$delid);
  mysql_query("delete from ordinateurs where id in ($a)");
  } else echo "<div class='alert'>
 <span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span>
 Veuillez selectioner quelque chose a supprimer.
</div>";
}
$req="select * from ordinateurs order by id";
$rs=mysql_query($req) or die(mysql_error());
if(isset($_REQUEST['did']))
{
$did=$_REQUEST["did"];
$ex=mysql_query("select equipement from demandes where equipement='$did'");
$exx=mysql_query("select id from demandes where equipement='$did'");
$exx1=mysql_fetch_assoc($exx);
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
   <link rel="stylesheet" href="./css/styles1.css">
   <script src="jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
   <title>GMAO</title>
   <script>
   function myFunction() {

     var input, filter, table, tr, td, i;
     input = document.getElementById("myInput");
     filter = input.value.toUpperCase();
     table = document.getElementById("myTable");
     tr = table.getElementsByTagName("tr");

     
     for (i = 0; i < tr.length; i++) {
       td = tr[i].getElementsByTagName("td")[2];
       if (td) {
         if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
           tr[i].style.display = "";
         } else {
           tr[i].style.display = "none";
         }
       }
     }
   }
   function myFunction1() {

     var input, filter, table, tr, td, i;
     input = document.getElementById("myInput1");
     filter = input.value.toUpperCase();
     table = document.getElementById("myTable");
     tr = table.getElementsByTagName("tr");


     for (i = 0; i < tr.length; i++) {
       td = tr[i].getElementsByTagName("td")[3];
       if (td) {
         if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
           tr[i].style.display = "";
         } else {
           tr[i].style.display = "none";
         }
       }
     }
   }
   function myFunction2() {

     var input, filter, table, tr, td, i;
     input = document.getElementById("myInput2");
     filter = input.value.toUpperCase();
     table = document.getElementById("myTable");
     tr = table.getElementsByTagName("tr");


     for (i = 0; i < tr.length; i++) {
       td = tr[i].getElementsByTagName("td")[4];
       if (td) {
         if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
           tr[i].style.display = "";
         } else {
           tr[i].style.display = "none";
         }
       }
     }
   }
   function myFunction3() {

     var input, filter, table, tr, td, i;
     input = document.getElementById("myInput3");
     filter = input.value.toUpperCase();
     table = document.getElementById("myTable");
     tr = table.getElementsByTagName("tr");


     for (i = 0; i < tr.length; i++) {
       td = tr[i].getElementsByTagName("td")[5];
       if (td) {
         if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
           tr[i].style.display = "";
         } else {
           tr[i].style.display = "none";
         }
       }
     }
   }
   function myFunction4() {

     var input, filter, table, tr, td, i;
     input = document.getElementById("myInput4");
     filter = input.value.toUpperCase();
     table = document.getElementById("myTable");
     tr = table.getElementsByTagName("tr");


     for (i = 0; i < tr.length; i++) {
       td = tr[i].getElementsByTagName("td")[11];
       if (td) {
         if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
           tr[i].style.display = "";
         } else {
           tr[i].style.display = "none";
         }
       }
     }
   }
   function myFunction5() {

     var input, filter, table, tr, td, i;
     input = document.getElementById("myInput5");
     filter = input.value.toUpperCase();
     table = document.getElementById("myTable");
     tr = table.getElementsByTagName("tr");


     for (i = 0; i < tr.length; i++) {
       td = tr[i].getElementsByTagName("td")[12];
       if (td) {
         if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
           tr[i].style.display = "";
         } else {
           tr[i].style.display = "none";
         }
       }
     }
   }
   function myFunction6() {

     var input, filter, table, tr, td, i;
     input = document.getElementById("myInput6");
     filter = input.value.toUpperCase();
     table = document.getElementById("myTable");
     tr = table.getElementsByTagName("tr");


     for (i = 0; i < tr.length; i++) {
       td = tr[i].getElementsByTagName("td")[13];
       if (td) {
         if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
           tr[i].style.display = "";
         } else {
           tr[i].style.display = "none";
         }
       }
     }
   }
   function myFunction7() {

     var input, filter, table, tr, td, i;
     input = document.getElementById("myInput7");
     filter = input.value.toUpperCase();
     table = document.getElementById("myTable");
     tr = table.getElementsByTagName("tr");


     for (i = 0; i < tr.length; i++) {
       td = tr[i].getElementsByTagName("td")[14];
       if (td) {
         if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
           tr[i].style.display = "";
         } else {
           tr[i].style.display = "none";
         }
       }
     }
   }
   function myFunction8() {

     var input, filter, table, tr, td, i;
     input = document.getElementById("myInput8");
     filter = input.value.toUpperCase();
     table = document.getElementById("myTable");
     tr = table.getElementsByTagName("tr");


     for (i = 0; i < tr.length; i++) {
       td = tr[i].getElementsByTagName("td")[10];
       if (td) {
         if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
           tr[i].style.display = "";
         } else {
           tr[i].style.display = "none";
         }
       }
     }
   }
   function myFunction9() {

     var input, filter, table, tr, td, i;
     input = document.getElementById("myInput9");
     filter = input.value.toUpperCase();
     table = document.getElementById("myTable");
     tr = table.getElementsByTagName("tr");


     for (i = 0; i < tr.length; i++) {
       td = tr[i].getElementsByTagName("td")[6];
       if (td) {
         if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
           tr[i].style.display = "";
         } else {
           tr[i].style.display = "none";
         }
       }
     }
   }
   function myFunction10() {

     var input, filter, table, tr, td, i;
     input = document.getElementById("myInput10");
     filter = input.value.toUpperCase();
     table = document.getElementById("myTable");
     tr = table.getElementsByTagName("tr");


     for (i = 0; i < tr.length; i++) {
       td = tr[i].getElementsByTagName("td")[7];
       if (td) {
         if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
           tr[i].style.display = "";
         } else {
           tr[i].style.display = "none";
         }
       }
     }
   }
   function myFunction11() {

     var input, filter, table, tr, td, i;
     input = document.getElementById("myInput11");
     filter = input.value.toUpperCase();
     table = document.getElementById("myTable");
     tr = table.getElementsByTagName("tr");


     for (i = 0; i < tr.length; i++) {
       td = tr[i].getElementsByTagName("td")[8];
       if (td) {
         if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
           tr[i].style.display = "";
         } else {
           tr[i].style.display = "none";
         }
       }
     }
   }
   function myFunction12() {

     var input, filter, table, tr, td, i;
     input = document.getElementById("myInput12");
     filter = input.value.toUpperCase();
     table = document.getElementById("myTable");
     tr = table.getElementsByTagName("tr");


     for (i = 0; i < tr.length; i++) {
       td = tr[i].getElementsByTagName("td")[9];
       if (td) {
         if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
           tr[i].style.display = "";
         } else {
           tr[i].style.display = "none";
         }
       }
     }
   }
   function myFunction13() {

     var input, filter, table, tr, td, i;
     input = document.getElementById("myInput13");
     filter = input.value.toUpperCase();
     table = document.getElementById("myTable");
     tr = table.getElementsByTagName("tr");


     for (i = 0; i < tr.length; i++) {
       td = tr[i].getElementsByTagName("td")[10];
       if (td) {
         if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
           tr[i].style.display = "";
         } else {
           tr[i].style.display = "none";
         }
       }
     }
   }

   function message() {

   var s = document.getElementById('myselect');
   var select = s.options[s.selectedIndex].value;
   if (select == "nom")
   {
     document.getElementById('myInput').style.display='block';
     document.getElementById('id1').style.display='block';
   }
 if (select == "type")
 {
   document.getElementById('myInput1').style.display='block';
   document.getElementById('id2').style.display='block';
 }
 if (select == "fabriquant")
 {
   document.getElementById('myInput2').style.display='block';
   document.getElementById('id3').style.display='block';
 }
 if (select == "modele")
 {
   document.getElementById('myInput3').style.display='block';
   document.getElementById('id4').style.display='block';
 }
 if (select == "lieu")
 {
   document.getElementById('myInput4').style.display='block';
   document.getElementById('id5').style.display='block';
 }
 if (select == "affectation")
 {
   document.getElementById('myInput5').style.display='block';
   document.getElementById('id6').style.display='block';
 }
 if (select == "num_serie")
 {
   document.getElementById('myInput6').style.display='block';
   document.getElementById('id7').style.display='block';
 }
 if (select == "code_inv")
 {
   document.getElementById('myInput7').style.display='block';
   document.getElementById('id8').style.display='block';
 }
 if (select == "date_achat")
 {
   document.getElementById('myInput8').style.display='block';
   document.getElementById('id9').style.display='block';
 }
 if (select == "sys_exp")
 {
   document.getElementById('myInput9').style.display='block';
   document.getElementById('id10').style.display='block';
 }
 if (select == "processeur")
 {
   document.getElementById('myInput10').style.display='block';
   document.getElementById('id11').style.display='block';
 }
 if (select == "carte_graphique")
 {
   document.getElementById('myInput11').style.display='block';
   document.getElementById('id12').style.display='block';
 }
 if (select == "ram")
 {
   document.getElementById('myInput12').style.display='block';
   document.getElementById('id13').style.display='block';
 }
 if (select == "memoire_dur")
 {
   document.getElementById('myInput13').style.display='block';
   document.getElementById('id14').style.display='block';
 }

}
function hide1() {
 document.getElementById('myInput').style.display = 'none';
 document.getElementById('id1').style.display = 'none';
 $('#myselect option[value=--]').prop('selected', true);
}
function hide2() {
document.getElementById('myInput1').style.display = 'none';
document.getElementById('id2').style.display = 'none';
$('#myselect option[value=--]').prop('selected', true);
}
function hide3() {
document.getElementById('myInput2').style.display = 'none';
document.getElementById('id3').style.display = 'none';
$('#myselect option[value=--]').prop('selected', true);
}
function hide4() {
document.getElementById('myInput3').style.display = 'none';
document.getElementById('id4').style.display = 'none';
$('#myselect option[value=--]').prop('selected', true);
}
function hide5() {
document.getElementById('myInput4').style.display = 'none';
document.getElementById('id5').style.display = 'none';
$('#myselect option[value=--]').prop('selected', true);
}
function hide6() {
document.getElementById('myInput5').style.display = 'none';
document.getElementById('id6').style.display = 'none';
$('#myselect option[value=--]').prop('selected', true);
}
function hide7() {
document.getElementById('myInput6').style.display = 'none';
document.getElementById('id7').style.display = 'none';
$('#myselect option[value=--]').prop('selected', true);
}
function hide8() {
document.getElementById('myInput7').style.display = 'none';
document.getElementById('id8').style.display = 'none';
$('#myselect option[value=--]').prop('selected', true);
}
function hide9() {
document.getElementById('myInput8').style.display = 'none';
document.getElementById('id9').style.display = 'none';
$('#myselect option[value=--]').prop('selected', true);
}
function hide10() {
document.getElementById('myInput9').style.display = 'none';
document.getElementById('id10').style.display = 'none';
$('#myselect option[value=--]').prop('selected', true);
}
function hide11() {
document.getElementById('myInput10').style.display = 'none';
document.getElementById('id11').style.display = 'none';
$('#myselect option[value=--]').prop('selected', true);
}
function hide12() {
document.getElementById('myInput11').style.display = 'none';
document.getElementById('id12').style.display = 'none';
$('#myselect option[value=--]').prop('selected', true);
}
function hide13() {
document.getElementById('myInput12').style.display = 'none';
document.getElementById('id13').style.display = 'none';
$('#myselect option[value=--]').prop('selected', true);
}
function hide14() {
document.getElementById('myInput13').style.display = 'none';
document.getElementById('id14').style.display = 'none';
$('#myselect option[value=--]').prop('selected', true);
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
  </div> <br/>


  <?php
  if(isset($_REQUEST['did']))
  {
    echo"<fieldset>";
    $did=$_REQUEST['did'];
    $query=mysql_query("select * from demandes where equipement='$did'");
    $q=mysql_fetch_assoc($query);
    if(mysql_num_rows($ex) > 0)
    {

  echo "<div><h2>Demande d'intervention</h2>
  <h3>Equipement concerné :</h3>{$q['equipement']}
  <h3>Description de la demande :</h3><p>{$q['description']} , emise le {$q['date']}";
  if($q['etat']>0)
  { $num=1;
    $riq=mysql_query("select * from interventions where nom='$did'");
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
    echo"</div>";

  } else {
  echo"<div style='color:#ff6666'><h2>Traitement en attente</h2></div>";
  ?>
<a class="link" href="./ajouter/traiter.php?tid=<?php echo($exx1['id'])?>">Ajouter un rapport d'intervention pour cet equipement</a>
  <?php
}
} else {
echo"<div style='color:#ff6666'><h2>Pas de demande pour cet equipement</h2></div>";

?>
<a class="link" href="./ajouter/ajouter_demande.php?oid=<?php echo($did)?>">Ajouter une demande pour cet equipement</a>
<?php

}echo"</fieldset>";
}
   ?>

<?php
  if(isset($_REQUEST['detid']))
  {
    $detid=$_REQUEST['detid'];
    $query=mysql_query("select * from ordinateurs where id='$detid'");
    $q=mysql_fetch_assoc($query);
    echo"<fieldset>";
    echo "<h2>Details de l'ordinateur : </h2>{$q['nom']}
    <h3>Systeme d'exploitation : </h3>{$q['sys_exp']}
    <h3>Processeur : </h3>{$q['processeur']}
    <h3>Carte graphique : </h3>{$q['carte_graphique']}
    <h3>RAM : </h3>{$q['ram']}
    <h3>Memoire disque dur : </h3>{$q['memoire_dur']} Go";
    echo"</fieldset>";
}
?>

<h1 align="">Ordinateurs :</h1>
<?php if($_SESSION['type'] == "Administrateur du parc" || $_SESSION['type'] == "Administrateur"){ ?>
<form method="post" action="ajouter/ajouter_ordinateur.php">
  <td><input class="ajouter" type="submit" name="ajouter" value="Ajouter"></td>
</form>

<h3>Rechercher :</h3>
<form method="post" action="#">
<?php } ?>
<select id="myselect" onclick="message()">
  <optgroup label="Caractéristiques">
    <option value="--">----</option>
    <option value="nom">Nom</option>
    <option value="type">Type</option>
    <option value="fabriquant">Fabriquant</option>
    <option value="modele">Modele</option>
    <option value="lieu">Lieu</option>
    <option value="affectation">Affectation</option>
    <option value="num_serie">Numero de serie</option>
    <option value="code_inv">Code inventaire</option>
    <option value="date_achat">Date d'achat</option>
  </optgroup>
  <optgroup label="Composants">
    <option value="sys_exp">Systeme d'exploitation</option>
    <option value="processeur">Processeur</option>
    <option value="carte_graphique">Carte graphique</option>
    <option value="ram">RAM</option>
    <option value="memoire_dur">Taille disque dur</option>
  </optgroup>
</select>



<a class="link" id="id1" onclick="hide1()" href="#" style="display:none">supprimer</a><input type="text" id="myInput" onkeyup="myFunction()" placeholder="Chercher un nom ..." title="Ecrire un nom" style='display:none'>
<a class="link" id="id2" onclick="hide2()" href="#" style="display:none">supprimer</a><input type="text" id="myInput1" onkeyup="myFunction1()" placeholder="Chercher un type ..." title="Ecrire un type" style='display:none'>
<a class="link" id="id3" onclick="hide3()" href="#" style="display:none">supprimer</a><input type="text" id="myInput2" onkeyup="myFunction2()" placeholder="Chercher un fabriquant ..." title="Ecrire un fabriquant" style='display:none'>
<a class="link" id="id4" onclick="hide4()" href="#" style="display:none">supprimer</a><input type="text" id="myInput3" onkeyup="myFunction3()" placeholder="Chercher un modele ..." title="Ecrire un modele" style='display:none'>
<a class="link" id="id5" onclick="hide5()" href="#" style="display:none">supprimer</a><input type="text" id="myInput4" onkeyup="myFunction4()" placeholder="Chercher un lieu ..." title="Ecrire un lieu" style='display:none'>
<a class="link" id="id6" onclick="hide6()" href="#" style="display:none">supprimer</a><input type="text" id="myInput5" onkeyup="myFunction5()" placeholder="Chercher une affectation ..." title="Ecrire une affectation" style='display:none'>
<a class="link" id="id7" onclick="hide7()" href="#" style="display:none">supprimer</a><input type="text" id="myInput6" onkeyup="myFunction6()" placeholder="Chercher un numero de serie ..." title="Ecrire un numero de serie" style='display:none'>
<a class="link" id="id8" onclick="hide8()" href="#" style="display:none">supprimer</a><input type="text" id="myInput7" onkeyup="myFunction7()" placeholder="Chercher un code inventaire ..." title="Ecrire un code inventaire" style='display:none'>
<a class="link" id="id9" onclick="hide9()" href="#" style="display:none">supprimer</a><input type="text" id="myInput8" onkeyup="myFunction8()" placeholder="Chercher une date ..." title="Ecrire une date" style='display:none'>
<a class="link" id="id10" onclick="hide10()" href="#" style="display:none">supprimer</a><input type="text" id="myInput9" onkeyup="myFunction9()" placeholder="Chercher un systeme d'exploitation ..." title="Ecrire un systeme d'exploitation" style='display:none'>
<a class="link" id="id11" onclick="hide11()" href="#" style="display:none">supprimer</a><input type="text" id="myInput10" onkeyup="myFunction10()" placeholder="Chercher un processeur ..." title="Ecrire un processeur" style='display:none'>
<a class="link" id="id12" onclick="hide12()" href="#" style="display:none">supprimer</a><input type="text" id="myInput11" onkeyup="myFunction11()" placeholder="Chercher une carte graphique ..." title="Ecrire une carte graphique" style='display:none'>
<a class="link" id="id13" onclick="hide13()" href="#" style="display:none">supprimer</a><input type="text" id="myInput12" onkeyup="myFunction12()" placeholder="Chercher RAM ..." title="Ecrire RAM" style='display:none'>
<a class="link" id="id14" onclick="hide14()" href="#" style="display:none">supprimer</a><input type="text" id="myInput13" onkeyup="myFunction13()" placeholder="Chercher une taille disque dur ..." title="Ecrire une taille disque dur" style='display:none'>

<table class="tab" id="myTable" border="1" width="100%" align="left">

      <tr>
        <th>Selection</th>
        <th>ID</th>
        <th>Nom</th>
        <th>Type</th>
        <th>Fabriquant</th>
        <th>Modele</th>
        <th style="display:none">Systeme d'exploitation</th>
        <th style="display:none">Processeur</th>
        <th style="display:none">Carte graphique</th>
        <th style="display:none">RAM</th>
        <th style="display:none">Memoire disque dur</th>
        <th>Lieu</th>
        <th>Affectation</th>
        <th>Numero de serie</th>
        <th>Code inventaire</th>
        <th>Date d'achat</th>
        <th>Commentaires</th>
        <th></th>
        <th></th>
        <?php if($_SESSION['type'] == "Administrateur du parc" || $_SESSION['type'] == "Administrateur"){ ?>
        <th></th> <?php } ?>
      </tr> <br/><br/><br/>

    <?php while($ET=mysql_fetch_assoc($rs)) { ?>
    <tr>
      <td><input type="checkbox" name="delid[]" value="<?php echo($ET['id']) ?> "></td>
      <td><?php echo($ET['id'])?></td>
      <td><?php echo($ET['nom'])?></td>
      <td><?php echo($ET['type'])?></td>
      <td><?php echo($ET['fabriquant'])?></td>
      <td><?php echo($ET['modele'])?></td>
      <td style="display:none"><?php echo($ET['sys_exp'])?></td>
      <td style="display:none"><?php echo($ET['processeur'])?></td>
      <td style="display:none"><?php echo($ET['carte_graphique'])?></td>
      <td style="display:none"><?php echo($ET['ram'])?></td>
      <td style="display:none"><?php echo($ET['memoire_dur'])?></td>
      <td><?php echo($ET['lieu'])?></td>
      <td><?php echo($ET['affectation'])?></td>
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
    </br></br></br></br></br></br></br>
    <?php if($_SESSION['type'] == "Administrateur du parc" || $_SESSION['type'] == "Administrateur"){ ?>
    <form>
    <input class="supprimer" type="submit" name="supprimer" value="Supprimer">
</form>
<?php } ?>

    </body>
</html>
