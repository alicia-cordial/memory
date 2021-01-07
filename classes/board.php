<?php

require_once('database.php');
require_once('card.php');

class board
{

    private $pdo;


    function __construct()
    {
        $this->pdo = new database();
    }


    public function createGame($nbcards)
    {
        $pairs1 = $this->pdo->Select("SELECT * FROM cards  LIMIT $nbcards");
        $pairs2 = $pairs1;
        $deck = array_merge($pairs1, $pairs2);
        shuffle($deck);

        for($i = 0; $i < count($deck); $i++) {
            $deck[$i]['status'] = 'closed';
        }
        return $deck;
    }
}


