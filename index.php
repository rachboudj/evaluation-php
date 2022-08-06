<?php 

session_start();

require_once './functions/autoLoad.php';
autoLoad("*.php");

if (verifierAdmin()) {
    require_once './includes/headerAdmin.php';
} else {
    require_once './includes/header.php';
}

if (verifierModerateur()) 
{
    require_once './includes/headerModerateur.php';
} else {
    require_once './includes/header.php';
}

if (verifierRedacteur()) {
    require_once './includes/headerRedacteur.php';
} else {
    require_once './includes/header.php';
}





require_once './includes/main.php';
require_once './includes/footer.php';
