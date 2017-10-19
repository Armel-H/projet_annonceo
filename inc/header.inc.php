<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?= RACINE_SITE ?>css/style.css"/>
        <title>Annonceo - <?= $page ?></title>
    </head>
    <body>
        <header>
			<div class="conteneur">
				<span>
					<a href="<?= RACINE_SITE ?>accueil.php" title="Mon Site">Annonceo</a>
                    <?php if(userConnecte()) : ?>

                    <li><a <?= ($page == 'Profil') ? 'class="active"' : '' ?> href="<?= RACINE_SITE ?>profil.php">profil</a></li>
                    <li><a href="<?= RACINE_SITE ?>connexion.php?action=deconnexion">Déconnexion</a></li>

                </span>
<nav>
    <!-- <div class="stage" style="width: 150px; height: 150px;">
    <div class="cubespinner">
    <div class="face1"></div>
    <div class="face2"></div>
    <div class="face3"></div>
    <div class="face4"></div>
    <div class="face5"></div>
    <div class="face6"></div>
    </div> -->

<ul>

<?php else : ?>
	<a <?= ($page == 'Inscription') ? 'class="active"' : '' ?> href="<?= RACINE_SITE ?>inscription.php">Inscription</a>
	<a <?= ($page == 'Connexion') ? 'class="active"' : '' ?> href="<?= RACINE_SITE ?>connexion.php">Connexion</a>
</ul>

<?php endif; ?>


<?php if(userAdmin()) : ?>
	<a <?= ($page == 'Gestion Boutique') ? 'class="active"' : '' ?> href="<?= RACINE_SITE ?>backoffice/gestion_annonce.php"></a>
	<a <?= ($page == 'Gestion membres') ? 'class="active"' : '' ?> href="<?= RACINE_SITE ?>backoffice/gestion_membres.php">Gestion membres</a>

<?php endif; ?>

</nav>
			</div>
        </header>
        <section>
			<div class="conteneur">
