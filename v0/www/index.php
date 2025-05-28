<?php

$route = isset($_GET['route']) ? $_GET['route'] : null;

$action = isset($_GET['action']) ? $_GET['action'] : null;

if (!isset($_SESSION['id'])) {
    $route = 'authenticate';
}

switch ($route) {

    case 'authenticate':
        include('../control/authenticateControl.php');
        break;

    case 'accueil':
        include('../control/accueilControl.php');
        break;

    case 'product':
        include('../control/productControl.php');
        break;

    case 'panier':
        include('../control/panierControl.php');
        break;

    case 'profil':
        include('../control/profilControl.php');
        break;

    default:
        echo '<p>La route spécifiée n\'existe pas !</p>';
        break;
}