<?php

function verifierRedacteur(): bool {
    if (isset($_SESSION['login']) && $_SESSION['login'] === true && $_SESSION['role'] === 'redacteur') 
        return true;
    else
        return false;
}