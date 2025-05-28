<?php
function authenticateControl($userAction)
{
    switch ($userAction) {
        case "login":
            authenticateControl_loginAction();
            break;
        case "logout":
            authenticateControl_logoutAction();
            break;
        default:
            authenticateControl_defaultAction();
            break;
    }
}

function authenticateControl_defaultAction()
{
    $tabTitle = "Nostra - Connexion";
    $message = "";
    include('../page/authenticatePage_default.php');
}

function authenticateControl_loginAction()
{
    $mail = $_POST['mail'];
    $pwd = hash('sha1', $_POST['pwd']);

    $user = userData_findOneWithCredentials($mail, $pwd);

    if (empty($user)) {

        $tabTitle = "Nostra - Connexion";
        $message = "Identifiants incorrects";
        include('../page/authenticatePage_default.php');
    } else {

        if ($user[0]['acces']) {

            $_SESSION['id'] = $user[0]['id'];
            $_SESSION['email'] = $user[0]['email'];
            $_SESSION['nom'] = $user[0]['nom'];
            $_SESSION['prenom'] = $user[0]['prenom'];
            $_SESSION['ligue_id'] = $user[0]['ligue_id'];
            header('Location:?route=dashboard');

        } else {
            $tabTitle = "Connexion";
            $message = "Vous n'avez pas les droits pour accéder à l'application";
            include('../page/authenticatePage_default.php');
        }
    }
}