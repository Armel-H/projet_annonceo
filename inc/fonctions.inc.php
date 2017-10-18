<?php
// Fonction debug pour faire les print_r()
function debug($arg){
	echo '<div style="color:white; padding: 20px; font-weight: bold; background:#' . rand(111111, 999999) . '">';
	$trace = debug_backtrace(); // debug_backtrace() me retourne les infos sur l'emplacement où a été exécuter la fonction. Array multidimentionnel
	echo 'Le debug a été demandé dans le fichier : ' . $trace[0]['file'] . ' à la ligne : ' . $trace[0]['line'] . '<hr/>';
	
	echo '<pre>';
	print_r($arg);
	echo '</pre>';
	
	echo '</div>';
}

// Fonction pour savoir si l'utilisateur est connecté
function userConnecte(){
	if(isset($_SESSION['membre'])){
		return TRUE;
	}
	else{
		return FALSE;
	}
}

// Fonction pour savoir si l'utilisateur est admin
function userAdmin(){
	if(userConnecte() && $_SESSION['membre']['statut'] == 1){
	   return TRUE;
	}
	else{
		return FALSE;
	}
}

// function qui nous permet de mettre un lien en sur-brillance quand on est sur la page (permet de mettre moins de PHP dans l'HTML de notre menu <nav>).
function active($arg){
	global $page;
	if($page == $arg){
		return 'class="active"';
	}
}






