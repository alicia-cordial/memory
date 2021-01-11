<?php

class card
{
    private $status;
    private $id;
    private $placeInDeck;


    //CONSTRUCTEUR
    function __construct ($place, $id, $url)
    {
        $this->placeInDeck = $place;
        $this->id = $id;
        $this->status = "closed";
        $this->url = $url;
    }

    //SET STATUS CARTE
    function setStatus($status)
    {
        $this->status = $status;
        return $this->status;
    }

    //GET STATUS
    function getStatus()
    {
        return $this->status;
    }

    function getPlace() {
        return $this->placeInDeck;
    }


    //GET ID
    function getId()
    {
        return $this->id;
    }

    function getUrl()
    {
        return $this->url;
    }

    //TOURNER LA CARTE
    function turn()
    {
        if ($this->status == "closed") {
            $this->status = "opened";
        } else {
            $this->status = "closed";
        }
    }

    // DISPLAY CARTES
    function displayCards()
    {
       /* if ($this->status == "closed") {
            echo "<div><a href= 'memory.php?id=$this->id\'><img src ='src/back.png' alt='carte_retourné' class='covered'></a></div>";
        } elseif ($this->status == "opened") {
            echo "<div><img src='src/img$this->card_value.png' alt='carte_decouverte'></div>";
        } elseif ($this->status == "found") {
            echo "<div><img src='src/img$this->card_value.png' alt='carte_trouvee'></div>";
        }*/
    }

}



