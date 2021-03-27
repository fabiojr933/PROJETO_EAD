<?php
namespace app\models;
use app\core\Model;

class Baixar extends Model{
    public function lista($id_curso){
        $sql = "SELECT * FROM download WHERE ID_CURSO = :IDCURSO";
        $qry = $this->db->prepare($sql);
        $qry->bindValue(":IDCURSO", $id_curso);
        $qry->execute();
        return $qry->fetchAll(\PDO::FETCH_ASSOC);
    }
}