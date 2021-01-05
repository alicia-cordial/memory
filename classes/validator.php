<?php

class Validator{
    private $id;
    private $login;
    private $password;
    private $password2;
    private $status;
    private $db;    


//connexion base données

function dbConnect() 
{
    try {
        $db = new PDO('mysql:host=localhost;dbname=memory;charset=utf8', 'root', '');
        return $db;

    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}



// vérification login existant

function userExists($login) 
{
    $db = dbConnect();
    
    $check = $db->prepare('SELECT * FROM utilisateurs WHERE login =?');
    $check->execute([$login]);

    $userExists = $check->rowCount();
    $user = $check->fetch();

    if ($userExists == 1) {

        $this->id = $user['id'];
        $this->login = $user['login'];
        $this->password = $user['password'];
        header("Location: profil.php?id=".$this->id);

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
    $db = dbConnect();
    $insertnewdata = $db->prepare('UPDATE utilisateurs SET login = ?, password = ? WHERE id = ?');
    $insertnewdata->execute(array($login, $hashed_password, $this->id));
    
    $this->login = $login;
    return 1;
}




// vérification bon password

function passwordExists($login, $password) 
{
    $db = dbConnect();
    $sqlcheck = $db->prepare('SELECT * from utilisateurs WHERE login =?');
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
    $db = dbConnect();

    $sql = $db->prepare('INSERT INTO utilisateurs (login, password) VALUES (?,?)');
    $sql->execute(array($login, $hashed_password));
    return 1;
}


}


?>