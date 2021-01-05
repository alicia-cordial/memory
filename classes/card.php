<?php

class card {

    private $status;
    private $card_value;
    private $id;


    //CONSCTRUCTEUR

function __construct($status, $value){
    $this->status= $status;
    $this->card_value = $value;
        
}


    //ID

function id($id){
        
    $this->id = $id;
       
    return $this->id;

}


    //GET STATUS

function get_status(){
            
    return $this->status ;

}


    //TOURNER LA CARTE

function turn(){
            
        if($this->status == "closed"){
            $this->status = "opened";
        }

        else{
            $this->status = "closed"; 
        }
            
    }


    //SET STATUS CARTE

function set_status($status){

        $this->status = $status;
        return $this->status;
    }



    //GET VALUE

function get_value(){
        return $this->card_value;
    }


    // DISPLAY CARTES

function display_cards(){

    if( $this->status == "closed"){
            
        echo "<div><a href= \"memory.php?id=$this->id\"><img src =\"src/img/cloud.jpg\" alt=\"carte_retourné\" class=\"covered\"></a></div>";
    }

    elseif($this->status == "opened"){
            
        echo "<div><img src='src/img/IMG$this->card_value.png' alt=\"carte_decouverte\"></div>";
    }
    
    elseif($this->status == "found"){
        echo "<div><img src='src/img/IMG$this->card_value.png' alt=\"carte_decouverte\"></div>";

    }
            
    }



}
?>