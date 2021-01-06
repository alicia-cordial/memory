<?php
require_once("database.php");

class score
{
    private $pdo;
    private $id_utilisateur;

    //CONNEXION BDD
    function __construct($id)
    {
        $this->pdo = new database();
        $this->id_utilisateur = $id;
    }

    //INSERER SCORE
    function insertScore($level, $time, $moves)
    {
        $insertscore = $this->pdo->Insert("INSERT INTO score (id_utilisateur, niveau, nb_coup, time) VALUES (:id, :level, :moves, :time)",
            ['id' => $this->id_utilisateur, 'level' => $level, 'moves' => $moves, 'time' => $time]);
        return 1;
    }


    //RECUPERER LE TOP 10 PAR NB DE COUPS
    function scoreByMoves($level)
    {
        $topMoves = $this->pdo->Select("SELECT * FROM score inner join utilisateurs on score.id_utilisateur = utilisateurs.id WHERE niveau = :level ORDER BY score.nb_coup ASC LIMIT 10 ",
            ['level' => $level]);
        return $topMoves;
    }

    //RECUPERER LE TOP 10 PAR TEMPS
    public function scoreByTime($level)
    {
        $toptime = $this->pdo->Select("SELECT * FROM score inner join utilisateurs on score.id_utilisateur = utilisateurs.id WHERE niveau = :level ORDER BY score.time ASC LIMIT 10 ",
        ['level' => $level]);
        return $toptime;
    }


    //RECUPERER LE MEILLEUR SCORE PERSO DE CHAQUE NIVEAU

    public function scoreUserByLevel($id)
    {
       $topperso = $this->pdo->Select("",
       ['id' => $this->id_utilisateur]);
        return $topperso;
    }

    //RECUPERER 5 DERNIERS SCORES PERSO
    public function lastGames($id)
    {
        $lastgames = $this->pdo->Select("SELECT * FROM score WHERE id_utilisateur = :id ORDER BY score.id DESC LIMIT 10",
        ['id' => $this->id_utilisateur]);
        return $lastgames;
    }

}


$score = new score;
//var_dump($score->insertScore(1, 2, 000000, 5));
