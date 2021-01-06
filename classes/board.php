<?php

require_once('database.php');
require_once('card.php');

class board {


//function construct



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


//function displayBoard




//function turnCard



}
?>