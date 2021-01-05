<?php

class User{
    private $id;
    private $login;
    private $password;
    private $password2;
    private $status;
    private $db;    




//S'ENREGISTRER
 function register($login, $password, $password2){
  
    $db = new PDO('mysql:host=localhost;dbname=memory', 'root', '');

    $this->login = htmlspecialchars($login);
    $this->password = htmlspecialchars($password);
    $this->password2 = htmlspecialchars($password2);

    $requetelogin= $db->prepare("SELECT * FROM utilisateurs WHERE login = ?");
    $requetelogin->execute(array($login));
    $loginexist= $requetelogin->rowCount();


    if($loginexist == 0) {

      if (!preg_match("#[0-9]+#", $this->password)) {
                $this->status = "strength";
                return 0;

            } elseif ($this->password != $this->password2) {
                $this->status = "notsame";
                return 0;

            } else {
                $hashed_password = password_hash($this->password, PASSWORD_BCRYPT, ["cost" => 10]);
            }

            $stmt = $this->db->prepare('INSERT INTO utilisateurs (login, password) VALUES (?,?)');
            $stmt->execute(array($this->login, $hashed_password));
            $this->status = "Enregistrement réussi.";
            return 1;

        } else {
            $this->status = "unavailable";
            return 0;
        }
    }
 

//SE CONNECTER

function connect($login, $password){
   
    $this->login = htmlspecialchars($login);
    $this->password = htmlspecialchars($password);

    $db = new PDO('mysql:host=localhost;dbname=reservationsalles', 'root', '');
    $requser = $db->prepare("SELECT * FROM utilisateurs WHERE login = ? AND password = ?");
    
    $requser->execute(array($login, $password));
    $userexist = $requser->rowCount();

    if($userexist == 1){
            
        $user= $requser->fetch(PDO::FETCH_ASSOC);
        

            $login = htmlspecialchars($login);
            $password = sha1($password);

              $this->id = $user['id'];
              $this->login = $user['login'];
              $this->password = $user['password'];
              header("Location: profil.php?id=".$this->id);
              return $user;
            
            }
            
            else
            {   
                $erreur = "Mauvais login ou mot de passe !";
            }

}




//UPDATE

function update($login, $password, $password2)
{
    $login = htmlspecialchars($login);
    $this->password = htmlspecialchars($password);
    $this->password2 = htmlspecialchars($password2);
    
    $stmt = $this->db->prepare('SELECT * FROM utilisateurs WHERE login= ?');
    $stmt->execute([$login]);
    
    $userExists = $stmt->rowCount();
    $userfetch = $stmt->fetch();

    if ($userExists == 0 or $this->id == $userfetch['id']) {

        if (!preg_match("#[0-9]+#", $this->password)) {
            $this->status = "strength";
            return 0;

        } elseif ($this->password != $this->password2) {
            $this->status = "notsame";
            return 0;

        } else {
            $hashed_password = password_hash($this->password, PASSWORD_BCRYPT, ["cost" => 10]);
            $this->login = $login;
        }

        $stmt = $this->db->prepare('UPDATE utilisateurs SET login = ?, password = ? WHERE id = ?');
        $stmt->execute([$this->login, $hashed_password, $this->id]);
        
        $this->status = "update";
        return 1;

    } else {
        $this->status = "login";
        return 0;
    }
}



//DECONNEXION




//GETID


function getId(){
    return $this->id;
    }
    
        

//GETLOGIN

function getLogin(){
    return $this->login;
    }


//GETSTATUS

function getStatus()
    {
        return $this->status;
    }


//DESTRUCTION

function __destruct()
    {
        $this->db = NULL;
    }


}

?>