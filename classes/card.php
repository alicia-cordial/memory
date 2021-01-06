<?php

class card
{
    private $status;
    private $card_value;
    private $id;


    //CONSTRUCTEUR
    function __construct($status, $value, $id)
    {
        $this->status = $status;
        $this->card_value = $value;
        $this->id = $id;
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

    //GET VALUE
    function getValue()
    {
        return $this->card_value;
    }

    //GET ID
    function getId()
    {
        return $this->id;
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
        if ($this->status == "closed") {
            echo "<div><a href= 'memory.php?id=$this->id\'><img src ='src/back.png' alt='carte_retourné' class='covered'></a></div>";
        } elseif ($this->status == "opened") {
            echo "<div><img src='src/img$this->card_value.png' alt='carte_decouverte'></div>";
        } elseif ($this->status == "found") {
            echo "<div><img src='src/img$this->card_value.png' alt='carte_trouvee'></div>";
        }
    }
}

