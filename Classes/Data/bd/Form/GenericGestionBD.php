<?php
declare(strict_types=1);
namespace bd\Form;

require_once("./_connection.php");

class GenericGestionBD{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    public function requete_gestion_bd($requete_gestion) {
        try{
            $this->pdo->exec($requete_gestion);
            return $this->pdo;
        }
        catch (PDOException $e){
            var_dump($e->getMessage());
        }
    }
}