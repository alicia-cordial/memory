<?php

class database
{
    private $connection;

//Connexion
    public function __construct($host, $user, $password, $table)
    {
        try {
            $this->connection = new PDO($host, $table, $user, $password);
            return $this->connection;
        } catch (PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    //Déconnexion
    public function disconnect()
    {
        $this->connection = NULL;
    }

//Exécution d'une requête
    public function Execute($statement = '', $parameters = [])
    {
        try {
            $stmt = $this->connection->prepare($statement);
            $stmt->execute($parameters);
            return $stmt;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    //Insertion d'une ligne
    public function Insert($statement = '', $parameters = [])
    {
        try {
            $this->Execute($statement, $parameters);
            return $this->connection->lastInsertId();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    //Récupération de données
    public function Select($statement = "", $parameters = [])
    {
        try {

            $stmt = $this->Execute($statement, $parameters);
            return $stmt->fetchAll();

        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    //Mise à jour des données
    public function Update($statement = "", $parameters = [])
    {
        try {

            $this->Execute($statement, $parameters);

        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    //Suppression de données
    public function Delete($statement = "", $parameters = [])
    {
        try {

            $this->Execute($statement, $parameters);

        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

}

?>