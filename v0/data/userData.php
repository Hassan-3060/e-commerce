<?php


function userData_findOneWithCredentials($userMail, $userPwd)
{
    //$request = "SELECT * From user Where mail = :mail AND pwd = :pwd";
    $request = "SELECT * FROM " . BDD_SCHEMA . ".user WHERE email = '" . $userMail . "' AND mdp = '" . $userPwd . "'";
    $request = Connexion::query($request);
    return $request;

}