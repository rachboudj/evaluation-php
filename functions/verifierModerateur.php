<?php

function verifierModerateur(): bool {
    if (isset($_SESSION['login']) && $_SESSION['login'] === true && $_SESSION['role'] === 'moderateur') 
        return true;
    else
        return false;
}