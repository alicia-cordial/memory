<?php
require_once("classes/database.php");
$login = 'may';
$password = "may";

$pdo = new database();
var_dump($pdo);
$test = $pdo->Insert('Insert into utilisateurs (login, password) values ( :login , :password )', [
        'login' => $login,
        'password' => $password,
    ]);
var_dump($test);

$test = $pdo->Update("Update utilisateurs set login = :login where id = :id",[
        'id' => 3,
        'login' => 'may2'
    ]);
var_dump($test);