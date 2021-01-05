<?php

class score {
    private $id;
    public $level;
    public $time;
    public $moves;
    public $db;

    //INSERER SCORE

    function insertScore($id, $level, $time, $moves){

        $this->id = $id;
        $this->level = $level;
        $this->time = $time;
        $this->moves = $moves;

        $req_insert = $this->db->prepare("INSERT INTO score( id_utilisateur, niveau, nb_coup, time) VALUES (?, ?, ?, ?)") ;
        $req_insert->execute([$this->id , $this->level , $this->moves , $this->time]);
        
         return true;
         

    }

    //RECUPERER RESULTAT

 function fetchScore(){

    $req_fetch = $this->db->prepare("SELECT * from score inner join utilisateurs on score.id_utilisateur =  utilisateurs.id");
    $req_fetch->execute();
    
    $data = $req_fetch->fetchAll();

    return true;
    }   

    //RECUPERER TOUS LES SCORES PAR NIVEAU


function scorebyLevel($level){
        
    $req_level = $this->db->prepare("SELECT login, niveau, nb_coup, DATE_FORMAT(time, '%i:%s') AS time FROM score inner join utilisateurs on score.id_utilisateur =  utilisateurs.id WHERE niveau = ? ORDER BY score.nb_coup ASC LIMIT 10 ");
    $req_level->execute([$level]);
        
    $data_level = $req_level->fetchAll();
        
    return $data_level;
        

    }



    //RECUPERER TOUS LES SCORES PAR TEMPS

public function scorebytime($level){
        
    $req_time = $this->db->prepare("SELECT login, niveau, nb_coup, DATE_FORMAT(time, '%i:%s') AS time FROM score inner join utilisateurs on score.id_utilisateur =  utilisateurs.id WHERE niveau = ? ORDER BY score.time ASC LIMIT 10 ");
    $req_time->execute([$level]);
    
    $data_time =$req_time->fetchAll();

        return $data_time ;
    }

    
    //RECUPERER LES SCORES PERSOS

    public function scoreUser($id){

        $req_score= $this->db->prepare("SELECT * FROM score WHERE id_utilisateur = ? ORDER BY score.id DESC LIMIT 10");
        $req_score->execute([$id]);
        $data_user =  $req_score->fetchAll();

        return $data_user;
    }

}
?>