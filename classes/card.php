<?php

class card
{
    private $status;
    private $id;
    private $placeInDeck;
    private $url;


    //CONSTRUCTEUR
    function __construct($place, $id, $url)
    {
        $this->placeInDeck = $place;
        $this->id = $id;
        $this->url = $url;
        $this->status = "closed";
    }

    //Change le statut de la carte
    function setStatus($status)
    {
        $this->status = $status;
    }

    function getId()
    {
        return $this->id;
    }

    function displayCards()
    {
        if ($this->status == 'closed') {
            return "<form method='post' id='formMemory' action='memory.php'><button type='input' name='carte' class='cardbutton' value=" . $this->placeInDeck . "><img class='imgcard' src='../src/back.png'></button></form>";
        } elseif ($this->status == 'open') {
            return "<img class='imgcard' src=" . $this->url . ">";
        } elseif ($this->status == 'found') {
            return "<img class='imgcard imgfound' src=" . $this->url . ">";
        }
    }

}



