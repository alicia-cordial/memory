<?php

require_once('database.php');
require_once('user.php');


//$pdo = new database();

class Validator{
    private $id;
    private $login;
    private $password;
    private $password2;
    private $status;
   // private $pdo = new database();    



// vérification login existant

function userExists($login) 
{
     $pdo = new database();    
    
    $check = $pdo->Execute('SELECT * FROM utilisateurs WHERE login =?', [$login]);

    $userExists = $check->rowCount();
    $user = $check->fetch();

    if ($userExists == 1) {

     
//$this->login = htmlspecialchars($login);
//$this->password = htmlspecialchars($password);
//$this->password2 = htmlspecialchars($password2);


        return $user;

    } else {
        return 0;
    }
}



// vérification login identique pour éviter un doublon

function sameLogin($login) 
{
    if ($login != $this->login) {
        return 1;

    } else {
        return 0;
    }
}





// modification infos bdd

function updateUser($login, $hashed_password) 
{
   
    $insertnewdata = $this->pdo->Execute('UPDATE utilisateurs SET login = ?, password = ? WHERE id = ?');
    $insertnewdata->execute(array($login, $hashed_password, $this->id));
    
    $this->login = $login;
    return 1;
}




// vérification bon password

function passwordExists($login, $password) 
{
    $sqlcheck = $this->pdo->Execute('SELECT * from utilisateurs WHERE login =?');
    $sqlcheck->execute([$login]);
    
    $user = $sqlcheck->fetch();
    
    $auth = password_verify($_POST['password'], $user['password']);

    if ($auth == 1) {
        return 1;

    } else {
        return 0;
    }
}


// maximum caractères

function maxLenght($password, $login) 
{
    if (strlen($password) > 20 or strlen($login) > 20) {
        return 1;

    } else {
        return 0;
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


//insertion utilisateur bdd

function createUser($login, $hashed_password) 
{


    $sql = $this->pdo->Execute('INSERT INTO utilisateurs (login, password) VALUES (?,?)');
    $sql->execute(array($login, $hashed_password));
    return 1;
}


}

?>