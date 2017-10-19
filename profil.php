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
	<div class="row">
 <div class="col-sm-6 col-md-6 col-sm-offset-3 col-md-offset-3">
   <div class="thumbnail">
     <img src="img/user1.png" alt="profil_default">
     <div class="caption">
       <h3><?= $pseudo ?></h3>
       <p><?= $prenom ?> <?= $nom ?></p>
     </div>
   </div>
 </div>
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
