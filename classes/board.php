<?php

require_once('database.php');

class board {


    //function téléchargement cartes
function downloadCards($pdo){

}

    //function display jeu



    //function turncard


    //function max paires


    //function cartes visibles


    //function vérification paires



    //function jeu gagné
   


    //function shuffle
    function my_str_shuffle($str)
    {
        if ($str == '') {
            return $str;
        }
    
        $n_left = strlen($str);
    
        while (--$n_left) {
            $rnd_idx = mt_rand(0, $n_left);
            if ($rnd_idx != $n_left) {
                $tmp = $str[$n_left];
                $str[$n_left] = $str[$rnd_idx];
                $str[$rnd_idx] = $tmp;
            }
        }
    
        return $str;
    }




}
?>