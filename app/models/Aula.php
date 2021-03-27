<?php
namespace app\models;
use app\core\Model;

class Aula extends Model{
    public function ListaPorCurso($id_curso){
       $sql = "SELECT * FROM aula a WHERE a.id_curso =  :id_curso";
       $qry = $this->db->prepare($sql);
       $qry->bindValue(":id_curso", $id_curso);
       $qry->execute();
       return $qry->fetchAll(\PDO::FETCH_ASSOC); 
    }

    public function getAula($id_aula){
        $sql = "SELECT * FROM aula a WHERE a.id_aula =  :id_aula";
        $qry = $this->db->prepare($sql);
        $qry->bindValue(":id_aula", $id_aula);
        $qry->execute();
        return $qry->fetch(\PDO::FETCH_ASSOC); 
     }

}
?>