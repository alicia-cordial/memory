<?php

require_once('database.php');
require_once('user.php');


class validator{
    private $id;
    private $login;
    private $password;
    private $password2;
    private $pdo;


    //CONSTRUCTION

    function __construct()
    {
        $this->pdo = new database();
    }


    // vérification login existant

function userExists($login) 
{
    $check = $this->pdo->Select('Select * FROM utilisateurs WHERE login = :login', ['login' => $login]);
    if (!empty($check)) {
        return 1;
    } else {
        return 0;
    }
}




    // vérification update login identique pour éviter un doublon

function sameLogin($login, $firstlogin) {

    if ($login != $firstlogin) {
        return 1;

    } else {
        return 0;
    }
}



    // vérification bon password connexion

function passwordConnect($login, $password) {

{
    $checkpassword = $this->pdo->Select('Select * from utilisateurs WHERE login = :login', ['login' => $login]);
    
   

    if (!empty($checkpassword)) {
        return 1;

    } else {
        return 0;
    }
}

}


    // vérification passwords identiques

function passwordConfirm($password, $password2) 
{
    if ($password === $password2) {
        return 1;

    } else {
        return 0;
    }
}




}

?>