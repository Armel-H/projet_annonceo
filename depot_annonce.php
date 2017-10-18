<?php  
require_once('inc/init.inc.php');



// Traitement pour la redirection si user est connecté
 // if(userConnecte()){
 // header('location:fiche_annonce.php');
 // }



// Traitement pour dépot de l'annonce
if($_POST){
	debug($_POST); 
	

	if(!empty($_POST['titre'])){
		
			if(strlen($_POST['titre']) < 3 ){ 
			$msg .= '<div class="erreur">Veuillez renseigner un titre compris entre 3 et 20 caractères.</div>';
			}
	}
	else{
		$msg .= '<div class="erreur">Veuillez renseigner un titre !</div>';
	}
    
	
			//Insertion dans la BDD (requete prepare()).
			
			$resultat = $pdo -> prepare("INSERT INTO annonce (titre, description_courte, description_longue, prix, photo, pays, ville, adresse, cp) VALUES (:titre, :description_courte, :description_longue, :prix, :photo, :pays, :ville, :adresse, :cp)");
						
			$resultat -> bindParam(':titre', $_POST['titre'], PDO::PARAM_STR);
			$resultat -> bindParam(':description_courte', $_POST['description_courte'], PDO::PARAM_STR);
			$resultat -> bindParam(':description_longue', $_POST['description_longue'], PDO::PARAM_STR);
			$resultat -> bindParam(':prix', $_POST['prix'], PDO::PARAM_STR);
			$resultat -> bindParam(':photo', $_POST['photo'], PDO::PARAM_STR);
			$resultat -> bindParam(':pays', $_POST['pays'], PDO::PARAM_STR);	
			$resultat -> bindParam(':ville', $_POST['ville'], PDO::PARAM_STR);	
			
			$resultat -> bindParam(':adresse', $_POST['adresse'], PDO::PARAM_STR);	
			$resultat -> bindParam(':cp', $_POST['cp'], PDO::PARAM_STR);	
				
			if($resultat -> execute()){
				header('location:fiche_annonce.php');
			}	
			// On ne fait la redirection que si tout s'est bien passé !	
	
			
		}
	


$page = 'Inscription';
require_once('inc/header.inc.php');
?>
<h1>Inscription</h1>
<?= $msg ?>
<form action="" method="post">
	<label>Titre : </label>
	<input type="text" name="titre" placeholder="Votre Titre"/><br>
	
	<label>description_courte : </label>
	<textarea type="text" rows="8" cols="30" name="description_courte"/>Votre description courte</textarea><br>
	
	<label>description_longue : </label>
	<textarea type="text" rows="8" cols="30" name="description_longue" />votre description longue</textarea><br>
	
	<label>prix : </label>
	<input type="text" name="prix"placeholder="Votre prix" /><br>
    
	<label>photo : </label>
	<input type="file" name="photo"placeholder="Votre photo" /><br>
    
	<label>pays : </label>
	<input type="text" name="pays"placeholder="Votre pays" /><br>
    
	<label>ville : </label>
	<input type="text" name="ville"placeholder="Votre ville" /><br>
    
	<label>adresse : </label>
	<input type="text" name="adresse"placeholder="Votre adresse" /><br>
	<label>cp : </label>
	<input type="text" name="cp"placeholder="Votre cp" /><br>
	

	
	<input type="submit" value="Inscription" />
</form>	

<?php
require_once('inc/footer.inc.php');
?>