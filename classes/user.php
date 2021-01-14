<?php
require_once('database.php');
require_once('validator.php');


class User
{
    private $id;
    private $login;
    private $pdo;

    function __construct()
    {
        $this->pdo = new database();
    }


    //S'ENREGISTRER
    function register($login, $password)
    {
        $this->pdo->Insert('Insert into utilisateurs (login, password) values ( :login , :password )',
            ['login' => $login,
            'password' => password_hash($password, PASSWORD_BCRYPT, ["cost" => 10]),]);
        return $login;
    }

    //SE CONNECTER ET RECUPERER LES DONNEES
    function connect($login)
    {
        $requser = $this->pdo->Select('Select * FROM utilisateurs WHERE login = :login',
            ['login' => $login,]);
        $this->id = $requser[0]['id'];
        $this->login = $requser[0]['login'];
        return $requser;
    }

    //UPDATE
    function update($login, $password)
    {
        $this->pdo = new database();
        $update = $this->pdo->Update("Update utilisateurs SET login = :login, password = :password WHERE id = $this->id ",
            ['login' => $login, 'password' => password_hash($password, PASSWORD_BCRYPT, ["cost" => 10])]);
        $this->login = $login;
        return $update;
    }

    //GETID
    function getId()
    {
        return $this->id;
    }

    //GETLOGIN
    function getLogin()
    {
        return $this->login;
    }

}

