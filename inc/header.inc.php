<!Doctype html>
<html>
    <head>
        <title>Annonceo - <?= $page ?></title>
        <link rel="stylesheet" href="<?= RACINE_SITE ?>css/style.css"/>
    </head>
    <body>    
        <header>
			<div class="conteneur">                      
				<span>
					<a href="index.php" title="Mon Site">Annonceo</a>
                </span>
<nav>
<?php if(userConnecte()) : ?>

	<a <?= active('Profil') ?> href="<?= RACINE_SITE ?>profil.php"></a>
	
	<a <?= ($page == 'Profil') ? 'class="active"' : '' ?> href="<?= RACINE_SITE ?>profil.php"></a>
	
	<a href="<?= RACINE_SITE ?>connexion.php?action=deconnexion">Déconnexion</a>
<?php else : ?>
	<a <?= ($page == 'Inscription') ? 'class="active"' : '' ?> href="<?= RACINE_SITE ?>inscription.php">Inscription</a>
	<a <?= ($page == 'Connexion') ? 'class="active"' : '' ?> href="<?= RACINE_SITE ?>connexion.php">Connexion</a>
	
		
<?php endif; ?>	


<?php if(userAdmin()) : ?>
	<a <?= ($page == 'Gestion Boutique') ? 'class="active"' : '' ?> href="<?= RACINE_SITE ?>backoffice/gestion_boutique.php"></a>
	<a <?= ($page == 'Gestion membres') ? 'class="active"' : '' ?> href="<?= RACINE_SITE ?>backoffice/gestion_membres.php">Gestion membres</a>
	<a <?= ($page == 'Gestion commandes') ? 'class="active"' : '' ?> href="<?= RACINE_SITE ?>backoffice/gestion_commandes.php"></a>
<?php endif; ?>
	
</nav>
			</div>
        </header>
        <section>
			<div class="conteneur">