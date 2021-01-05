<?php

class database
{

    private $host;
    private $user;
    private $password;
    private $table;
    private $db;

    public function __construct($host, $user, $password, $table)
    {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->table = $table;
    }

    public function connect()
    {
        try {
            $this->db = new PDO("mysql:host=$this->host;dbname=$this->table", $this->user, $this->password);
            return $this->db;
        } catch (PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function disconnect()
    {
        $this->db->close();
    }
}

?>