<?php
require_once('inc/init.inc.php');

$resultat = $pdo -> query("SELECT * FROM membre WHERE id_membre='1'");
$ligne_membre = $resultat -> fetch();

// traitement pour redirection si user n'est pas connecté
if(!userConnecte()){
	header('location:connexion.php');
}

extract($_SESSION['membre']);



$page = 'Profil';
require_once('inc/header.inc.php');
?>



<h1>Profil de <?= $pseudo ?> </h1>

<div class="profil">
	<p>Bonjour <?= $pseudo ?> !!</p><br/>
	
	<div class="profil_img"> 
		<img src="img/user1.png" />
	</div>
	<div class="profil_infos">
		<ul>
			<li>Pseudo : <b><?= $pseudo ?></b></li>
			<li>Prénom : <b><?= $prenom ?></b></li>
			<li>Nom : <b><?= $nom ?></b></li>
			<li>Email : <b><?= $email ?></b></li>
			<li>Civilité : <b><?= $civilite ?></b></li>
			<li>téléphone : <b><?= $telephone?></b></li>
			
        
		</ul>
	</div>
	
</div>

<?php
require_once('inc/footer.inc.php');
?>