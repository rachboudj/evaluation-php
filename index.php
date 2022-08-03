<?php 

require_once './functions/autoLoad.php';
autoLoad("*.php");

require_once './includes/header.php';
require_once './includes/main.php';
require_once './includes/footer.php';

if (verifierAdmin()) 
    require_once './includes/headerAdmin.php';
else 
    require_once './includes/header.php';