<?php

require_once('database.php');
require_once('card.php');

class board
{

    private $pdo;
    private $nbcoups;

    function __construct()
    {
        $this->pdo = new database();
        $this->nbcoups = 0;
        $this->foundpairs = 1;
    }


    public function createGame($nbcards)
    {
        $pairs1 = $this->pdo->Select("SELECT * FROM cards  LIMIT $nbcards");
        $pairs2 = $pairs1;
        $deck = array_merge($pairs1, $pairs2);
        shuffle($deck);

        for ($i = 0; $i < count($deck); $i++) {
            $deck[$i] = new card($i, $deck[$i]['id'], $deck[$i]['img_url']);
        }
        return $deck;
    }

    function addCoup()
    {
        $this->nbcoups++;
    }

    function getCoups()
    {
        return $this->nbcoups;
    }

    function AddPairsFound()
    {
        $this->foundpairs++;
    }

    function getPairsFound()
    {
        return $this->foundpairs;
    }
}


