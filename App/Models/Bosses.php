<?php
namespace App\Models;

use MF\Model\Model;

class Bosses extends Model{
    private $id;
    private $name;
    private $game;
    private $trophy;
    private $image;
    private $status;

    public function __get($atributo){
        return $this->$atributo;
    }

    public function __set($atributo, $valor){
        $this->$atributo = $valor;
    }

    public function getStatusBoss(){
        $query = "
                SELECT 
                    * 
                FROM 
                    bosses 
                WHERE 
                    status = 0";
        
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC); 
    }
  
    public function updateStatusBoss(){
        $query = '
                UPDATE
                    bosses 
                SET 
                    status = :status 
                WHERE 
                    id = :id';

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':status', $this->__get('status'), \PDO::PARAM_INT);
        $stmt->bindValue(':id', $this->__get('id'), \PDO::PARAM_INT);
        $stmt->execute();
    }
    
}

?>