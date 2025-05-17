<?php
namespace App\Models;

use MF\Model\Model;

class Items extends Model{

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

    // Infusions
    public function getStatusItemsInfusions(){
        $query = "
            SELECT 
                * 
            FROM 
                items 
            WHERE
                type = 'infusions' AND 
                status = :status";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':status', $this->__get('status'), \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC); 
    }

    public function getAllInfusions(){
        $query = "
            SELECT 
                * 
            FROM 
                items 
            WHERE
                type = 'infusions'";

        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC); 
    }

    //Sorceries
    public function getStatusItemsSorceries(){
        $query = "
            SELECT
                *
            FROM
                items
            WHERE
                type = 'sorceries' AND 
                status = :status";                
        
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':status', $this->__get('status'), \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getAllSorceries(){
        $query = "
            SELECT 
                * 
            FROM 
                items 
            WHERE
                type = 'sorceries'";

        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getStatusItemsPyromancies(){
        $query = "
        SELECT
            *
        FROM
            items
        WHERE
            type = 'pyromancies' AND
            status = :status";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':status', $this->__get('status'), \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getAllPyromancies(){
        $query = "
            SELECT
                *
            FROM
                items
            WHERE
                type = 'pyromancies'";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    //Miracles
    public function getStatusItemsMiracles(){
        $query = "
            SELECT 
                * 
            FROM 
                items 
            WHERE 
                type = 'miracles' 
            AND 
                status = :status";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':status', $this->__get('status'), \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getAllMiracles(){
        $query = "SELECT * FROM items WHERE type = 'miracles'";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    //Gestures
    public function getStatusGestures(){
        $query = "
            SELECT 
                * 
            FROM 
                items 
            WHERE 
                type = 'gestures' 
            AND 
                status = :status";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':status', $this->__get('status'), \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getAllGestures(){
        $query = "
            SELECT 
                * 
            FROM 
                items 
            WHERE 
                type = 'gestures'";

        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    //Rings
    public function getStatusItemsRings(){
        $query = "
            SELECT 
                * 
            FROM 
                items 
            WHERE 
                type = 'rings' 
            AND 
                status = :status";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':status', $this->__get('status'), \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getAllRings(){
        $query = "
            SELECT 
                * 
            FROM 
                items 
            WHERE 
                type = 'rings'";

        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    //All items
    public function updateStatusItems(){
        $query = '
            UPDATE
                items 
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
                items 
            WHERE 
                id = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $this->__get('id'), \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC); 
    }
}