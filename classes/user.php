<?php

require_once('database.php');
require_once('validator.php');


class User{
    private $id;
    private $login;
    private $password;
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

    } 



//SE CONNECTER

function connect($login, $password){

    $requser = $this->pdo->Select( 'Select * FROM utilisateurs WHERE login = :login AND password = :password ' , [
        'login' => $login,
        'password' => $password,
    ]);


}

//UPDATE

function update($login, $password)
{
  
    $update = $this->pdo->Update("Update utilisateurs set login = :login, password = :password where id = $this->id ",[
        'login' => $login,
        'password' => $password
    ]);


}

//GETID


function getId(){
    return $this->id;
    }
    
        

//GETLOGIN

function getLogin(){
    return $this->login;
    }



//DECONNEXION

function disconnect(){ 
    
    $this->id = NULL;
    $this->login = NULL;
    $this->password = NULL;
    $this->pdo = NULL;

    
}


}

?>