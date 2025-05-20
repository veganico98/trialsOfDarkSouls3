<?php
namespace App\Models;

use MF\Model\Model;

class Covenants extends Model{
    private $id;
    private $name;
    private $game;
    private $trophy;
    private $image_path;
    private $status;


    public function __get($atributo){
        return $this->$atributo;
    }

    public function __set($atributo, $valor){
        $this->$atributo = $valor;
    }

    public function getStatusCovenant(){
        $query = "
            SELECT 
                * 
            FROM 
                covenants 
            WHERE 
                status = :status";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':status', $this->__get('status'), \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC); 
    }

    public function getAllCovenants(){
        $query = "
            SELECT 
                * 
            FROM 
                covenants";

        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC); 
    }

    public function updateStatusCovenant(){
        $query = '
            UPDATE
                covenants 
            SET 
                status = :status 
            WHERE 
                id = :id';

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':status', $this->__get('status'), \PDO::PARAM_INT);
        $stmt->bindValue(':id', $this->__get('id'), \PDO::PARAM_INT);
        $stmt->execute();
    }

    public function getItemsById(){
        $query = "
            SELECT 
                * 
            FROM 
                covenants
            WHERE 
                id = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $this->__get('id'), \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC); 
    }

}