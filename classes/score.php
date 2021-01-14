<?php
require_once("database.php");

class score
{
    private $pdo;
    private $id_utilisateur;

//CONSTRUCTEUR
    function __construct()
    {
        $this->pdo = new database();
    }

    function setId($id)
    {
        $this->id_utilisateur = $id;
    }

//INSERER LE SCORE
    function insertScore($level, $time, $moves)
    {
        $this->pdo->Insert("INSERT INTO score (id_utilisateur, niveau, nb_coup, time) VALUES (:id, :level, :moves, :time)",
            ['id' => $this->id_utilisateur, 'level' => $level, 'moves' => $moves, 'time' => $time]);
        return 1;
    }


//RECUPERER LE TOP 10 PAR NB DE COUPS
    function scoreByMoves($level)
    {
        $topMoves = $this->pdo->Select("SELECT login, score.id as 'partie n°', nb_coup as 'coups' FROM score inner join utilisateurs on score.id_utilisateur = utilisateurs.id WHERE niveau = :level ORDER BY nb_coup ASC LIMIT 10",
            ['level' => $level]);
        return $topMoves;
    }

//RECUPERER LE TOP 10 PAR TEMPS
    public function scoreByTime($level)
    {
        $toptime = $this->pdo->Select("SELECT login, score.id as 'partie n°', time as 'temps' FROM score inner join utilisateurs on score.id_utilisateur = utilisateurs.id WHERE niveau = :level ORDER BY time ASC LIMIT 10",
            ['level' => $level]);
        return $toptime;
    }


//RECUPERER 5 DERNIERS SCORES PERSO
    public function lastGames()
    {
        $lastgames = $this->pdo->Select("SELECT niveau, score.id as 'partie n°', nb_coup as 'coups', time as 'temps' FROM score WHERE id_utilisateur = :id ORDER BY score.id DESC LIMIT 5",
            ['id' => $this->id_utilisateur]);
        return $lastgames;
    }


//RECUPERER 3 MEILLEURS TEMPS PERSO
    public function scoreUserTime($level)
    {
        $toptimeUser = $this->pdo->Select("SELECT score.id as 'partie n°', time as 'temps' FROM score inner join utilisateurs on score.id_utilisateur = utilisateurs.id WHERE niveau = :level AND utilisateurs.id = :id ORDER BY time ASC LIMIT 3",
            ['level' => $level, 'id' => $this->id_utilisateur]);
        return $toptimeUser;
    }

//RECUPERER 3 MEILLEURS COUPS PERSO
    function scoreUserMoves($level)
    {
        $topUserMoves = $this->pdo->Select("SELECT score.id as 'partie n°', nb_coup as 'coups' FROM score inner join utilisateurs on score.id_utilisateur = utilisateurs.id WHERE niveau = :level AND utilisateurs.id = :id ORDER BY nb_coup ASC LIMIT 3",
            ['level' => $level, 'id' => $this->id_utilisateur]);
        return $topUserMoves;
    }

}