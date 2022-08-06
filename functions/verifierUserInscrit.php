<?php

function verifierUserInscrit(): bool {
    if (isset($_SESSION['login']) && $_SESSION['login'] === true && $_SESSION['role'] === 'utilisateurInscrit') 
        return true;
    else
        return false;
}