<?php
require_once('../inc/init.inc.php');

if (isset($_GET['msg']) && $_GET['msg'] == 'validation' && isset($_GET['id'])) {
   $msg .= '<p style="color: white; background: #2EB872 ; padding: 5px">Le membre N°' . $_GET['id'] . ' a été correctement modifié !</p>';
}

if (isset($_GET['msg']) && $_GET['msg'] == 'suppr' && isset($_GET['id'])) {
   $msg .= '<p style="color: white; background: #2EB872 ; padding: 5px">Le membre N°' . $_GET['id'] . ' a été correctement supprimé !</p>';
}

if($_POST) // si je clique sur le bouton submit du formulaire
{
   $resultat = $pdo->prepare("UPDATE membre SET titre = :titre, description_courte = :description_courte, description_longue = :description_longue, prix = :prix, photo = :photo, photo = :photo, pays = :pays, ville = :ville, adresse = :adresse, cp = :cp WHERE id_membre = '$_GET[id_membre]'");

   $resultat -> bindParam(':titre', $_POST['titre'], PDO::PARAM_STR);
   $resultat -> bindParam(':description_courte', $_POST['description_courte'], PDO::PARAM_STR);
   $resultat -> bindParam(':description_longue', $_POST['description_longue'], PDO::PARAM_STR);
   $resultat -> bindParam(':prix', $_POST['prix'], PDO::PARAM_STR);
   $resultat -> bindParam(':photo', $_POST['photo'], PDO::PARAM_INT);
   $resultat -> bindParam(':pays', $_POST['pays'], PDO::PARAM_STR);
   $resultat -> bindParam(':ville', $_POST['ville'], PDO::PARAM_STR);
   $resultat -> bindParam(':adresse', $_POST['adresse'], PDO::PARAM_STR);
   $resultat -> bindParam(':cp', $_POST['cp'], PDO::PARAM_STR);

   if ($resultat -> execute()) {
       header("location:gestion_annonce.php");
   }


}


$resultat = $pdo -> query("SELECT * FROM annonce");
$membres = $resultat -> fetchAll(PDO::FETCH_ASSOC);
$contenu .= 'Nombre de résultats : ' . $resultat ->rowCount() . '<br><hr>';

$contenu .= $msg;
$contenu .= '<table border="1">';
$contenu .= '<tr>'; // ligne des titres

for ($i = 0; $i < $resultat -> columnCount(); $i++) {
   $meta = $resultat -> getColumnMeta($i);
       $contenu .=  '<th>' . $meta['name'] . '</th>';
   }



$contenu .= '<th colspan="2">Actions</th>';
$contenu .= '</tr>'; // fin ligne des titres

foreach ($membres as $valeur) { // parcourt tous les enregistrement
   $contenu .= "<tr>"; // ligne pour chaque enregistrement
       foreach ($valeur as $indice => $valeur2) { // Parcourt toutes les infos de chaque enregistrement
               $contenu .= '<td>' . $valeur2 . '</td>';

   }
       $contenu .= '<td><a href="?action=modification&id_annonce='. $valeur['id_annonce'] .'"><img src="../img/refresh.png" style="height:20px; width:20px;"></a></td>';
       $contenu .= '<td><a onclick="confirm(\'Etes-vous certain de vouloir supprimer cette  annonce' . $valeur['id_annonce'] . '\');" href="supprimer_annonce.php?id=' . $valeur['id_annonce'] . '"><img src="../img/trash.png" style="height:20px; width:20px;"></a></td>';
   $contenu .= "</tr>";
   }
$contenu .= '</table>';
$contenu .= "<br>";


if(isset($_GET['action']) && $_GET['action'] == 'modification') {


   if(isset($_GET['id_annonce']))
   {
   $resultat = $pdo->query("SELECT * FROM annonce WHERE id_annonce = '$_GET[id_annonce]'");
   $annonce_actuel = $resultat->fetch(PDO::FETCH_ASSOC);

   $id_annonce = (isset($annonce_actuel)) ? $annonce_actuel['id_annonce'] : '';
   $titre = (isset($annonce_actuel)) ? $annonce_actuel['titre'] : '';
   $description_courte = (isset($annonce_actuel)) ? $annonce_actuel['description_courte'] : '';
   $description_longue = (isset($annonce_actuel)) ? $annonce_actuel['description_longue'] : '';
   $prix = (isset($annonce_actuel)) ? $annonce_actuel['prix'] : '';
   $photo = (isset($annonce_actuel)) ? $annonce_actuel['photo'] : '';
   $pays = (isset($annonce_actuel)) ? $annonce_actuel['pays'] : '';
   $ville = (isset($annonce_actuel)) ? $annonce_actuel['ville'] : '';
   $adresse = (isset($annonce_actuel)) ? $annonce_actuel['adresse'] : '';
   $cp = (isset($annonce_actuel)) ? $annonce_actuel['cp'] : '';
   }

   $contenu .= '<h1>Modification :</h1>

   <form class="coucou" action="" method="post">


       <input type="hidden" name="id_annonce" value= . ' . $id_annonce .'">

       <label>titre :</label>
       <input type="text" name="titre" value="' . $titre . '">

       <label>description_courte :</label>
       <input type="text" name="description_courte" value=" ' . $description_courte .'" >

       <label>description_longue :</label>
       <input type="text" name="description_longue" value=" ' . $description_longue .'" >

       <label>prix :</label>
       <input type="number" name="prix" value=" ' . $prix . '" >

       <label>photo :</label>
       <input type="text" name="photo" value=" ' . $photo . '" >

       <label>photo :</label>
       <input type="text" name="pays" value=" ' . $pays . '" >

       <labelville :</label>
       <input type="text" name=ville" value=" ' . $ville . '" >

       <labelcp :</label>
       <input type="text" name=cp" value=" ' . $cp . '" >


       <input type="submit" value="Valider">

   </form>';
}
$page="";
require_once('../inc/header.inc.php')
?>

<!-- Contenu HTML -->
<h1>Gestion des annonces</h1>
<?= $contenu ?>




<?php
require_once('../inc/footer.inc.php');
?>
