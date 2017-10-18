<?php

require_once('inc/init.inc.php');

 // traitement pour récupérer les infos du produit
if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])){
	$resultat = $pdo -> prepare("SELECT * FROM annonce WHERE id_annonce = :id_annonce"); 
	$resultat -> bindParam(':id_annonce', $_GET['id'], PDO::PARAM_INT);
 	$resultat -> execute();
// 	
 	if($resultat -> rowCount() > 0){ // Le produit existe bien
		$ligne_annonce = $resultat -> fetch(PDO::FETCH_ASSOC);
		 extract($ligne_annonce);
		debug($ligne_annonce);
		
		
	}
	
	//else{  S'il n'y a pas de produit existant avec cette ID (user a modifié l'URL)
		//header('location:fiche_annonce.php');
	//}
}
//traitement pour ajouter une annonce
if(!empty($_POST)){
    ajouterProduit($id_annonce, $titre, $photo, $description_courte, $description_longue, $prix, $categorie, $pays, $ville, $adresse, $cp);
}
 //else{  Cela signifie soit : il n'y a pas d'id dans l'URL. L'id est vide. L'id n'est pas un chiffre : PROBLEME ! 
	 //header('location:fiche_annonce.php');
//}


//Traitement pour ajouter le produit au panier


debug($_SESSION);



// traitement pour récupérer les suggestions de produit : 

// ----- Produits des autres catégories : 
// $resultat = $pdo -> query("SELECT * FROM produit WHERE categorie != '$categorie' ORDER BY prix DESC LIMIT 0,6");

// ----- Produits de la même catégorie: 
// $resultat = $pdo -> query("SELECT * FROM produit WHERE categorie = '$categorie' AND id_produit != $id_produit ORDER BY prix DESC LIMIT 0,6");

// peu importe la requête choisie, je fait un fetchAll pour récupérer dans un tableau multi les suggestions de produit
// $suggestions = $resultat -> fetchAll(PDO::FETCH_ASSOC);




$page = 'fiche_annonce';
require_once('inc/header.inc.php');
?>
<h1><?= $titre ?></h1>

<img src="photo/<?= $photo ?>" width="250" />
<p>Détails du produit : </p>
<ul>
	<li>titre: <b><?= $titre ?></b></li>
	<li>Prix : <b style="color: red; font-size:20px"><?= $prix ?>€ TTC</b></li>
	<li>photo : <b><?= $photo ?></b></li>
	<li>pays : <b><?= $pays ?></b></li>
	<li>ville : <b><?= $ville ?></b></li>
	<li>adresse : <b><?= $adresse ?></b></li>
	<li>cp : <b><?= $cp ?></b></li>
	<li>description courte : <b><?= $description_courte ?></b></li>
	
</ul>
<br/>
<p>Description longue : <br/>
<em><?= $description_longue ?></em></p>	



<!-- <div class="profil" style="overflow:hidden;">
	<h2>Suggestions de produits</h2> -->
	
	<!-- Dans le PHP faire une requête qui va récupérer des produits (limités à 5): 
		Soit des produits de la même catégorie (sauf celui qu'on est en train de visiter)
		
		Soit les produits des autres catégories
	-->
	
	<?php foreach($suggestions as $valeur) : ?>
	<!-- Debut vignette produit -->
	<div class="boutique-produit">
		<h3><?= $valeur['titre'] ?></h3>
		<a href="fiche_annonce.php?id=<?= $valeur['id_annonce'] ?>"><img src="photo/<?= $valeur['photo'] ?>" height="100"/></a>
		<p style="font-weight: bold; font-size: 20px;"><?= $valeur['prix'] ?>€</p>

		<p style="height: 40px"><?= substr($valeur['description_courte'], 0, 40) ?>...</p>
		<a href="fiche_annonce.php?id=<?= $valeur['id_annonce'] ?>" style="padding:5px 15px; background: red; color:white; text-align: center; border: 2px solid black; border-radius: 3px" >Voir la fiche</a>
		<!-- href="fiche_produit.php?id=id_du_produit" -->
	</div>
	<!-- Fin vignette produit -->
	<?php endforeach; ?>
	
	
</div>



<?php
require_once('inc/footer.inc.php');
?> 