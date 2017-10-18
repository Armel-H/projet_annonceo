<?php
require_once('../inc/init.inc.php');

// redirection si USER n'est pa admin
//if(!userAdmin()){
  //header('location:' . RACINE_SITE . 'profil.php');
//}

// Traitement pour supprimer un membre :

// recupérer le nom de l'image (SELECT)
if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])){ // Est-ce qu'on récupére un id dans l'url ? Et est-ce qu'il n'est pas vide, et est-ce que c'est bien un chiffre ?

  $resultat = $pdo -> prepare("SELECT * FROM annonce WHERE id_annonce = :id");
  $resultat -> bindParam(':id', $_GET['id'], PDO::PARAM_INT);
  $resultat -> execute();

  if($resultat -> rowCount() > 0){ // OK le membre existe bien !
      $annonce = $resultat -> fetch(PDO::FETCH_ASSOC);

      // requete delete grace a l'id dans l'URL
      $resultat = $pdo -> exec("DELETE FROM annonce WHERE id_annonce = $annonce[id_annonce]");

      if($resultat){
          header('location:gestion_annonce.php?msg=suppr&id=' . $annonce['id_annonce']);
      }
  }

}


?>