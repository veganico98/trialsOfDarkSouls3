<?php
namespace App\Models;

use MF\Model\Model;

class Quests extends Model{

    public function __get($atributo){
        return $this->$atributo;
    }

    public function __set($atributo, $valor){
        $this->$atributo = $valor;
    }

    public function getStatusQuests(){
        $query = "
            SELECT 
                * 
            FROM 
                quests 
            WHERE 
                status = :status";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':status', $this->__get('status'), \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC); 
    }

    public function getAllQuests(){
        $query = "
            SELECT 
                * 
            FROM 
                quests";

        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC); 
    }

    public function updateStatusQuests(){
        $query = '
            UPDATE
                quests 
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
                quests
            WHERE 
                id = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $this->__get('id'), \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC); 
    }
}