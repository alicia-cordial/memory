<?php

require_once('database.php');
require_once('validator.php');


class User{
    private $id;
    private $login;
    private $password;
    private $status;
    private $pdo;

    function __construct()
    {
        $this->pdo = new database();
    }

//S'ENREGISTRER

 function register($login, $password){

    $register = $this->pdo->Insert('Insert into utilisateurs (login, password) values ( :login , :password )', [
            'login' => $login,
            'password' => $password,
        ]);
     return $login;
    } 


}

//$user = new User('lila', 'lila');
//var_dump($user->register('lila', 'lila'));
?>