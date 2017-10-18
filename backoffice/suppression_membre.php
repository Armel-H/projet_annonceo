<?php
require('../inc/init.inc.php');

// redirection si USER n'est pa admin
if(!userAdmin()){
	header('location:' . RACINE_SITE . 'profil.php');
}

// Traitement pour supprimer un membre : 

// recupurer le nom de l'image (SELECT) 
if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])){ // Est-ce qu'on recupère un id dans l'url ? Et est-ce qu'il n'est pas vide, et est-ce que c'est bien un chiffre ? 
	
	$resultat = $pdo -> prepare("SELECT * FROM membre WHERE id_membre = :id");
	$resultat -> bindParam(':id', $_GET['id'], PDO::PARAM_INT);
	$resultat -> execute(); 
	
	if($resultat -> rowCount() > 0){ // OK le membre existe bien !
		$membre = $resultat -> fetch(PDO::FETCH_ASSOC);
		
		// requete delete grace à l'id dans l'URL 
		$resultat = $pdo -> exec("DELETE FROM membre WHERE id_membre = $membre[id_membre]");
		
		if($resultat){
			header('location:gestion_membres.php?msg=suppr&id=' . $membre['id_membre']);
		}	
	}
	
}




?>