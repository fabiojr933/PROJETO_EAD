<?php
namespace app\models;
use app\core\Model;

class Curso extends Model{

    public function getCurso($id_curso){
        $sql = "SELECT * FROM CURSO a where a.id_curso = :id_curso";
        $qry = $this->db->prepare($sql);
        $qry->bindValue(":id_curso",$id_curso);
        $qry->execute();
        return $qry->fetch(\PDO::FETCH_ASSOC);
    }
    public function qtdeaulaPorCurso($id_curso){
        $sql = "SELECT COUNT(*) AS QTDE FROM AULA WHERE ID_CURSO = :IDCURSO ";
        $qry = $this->db->prepare($sql);
       $qry->bindValue(":IDCURSO", $id_curso);
       $qry->execute();
       return $qry->fetch(\PDO::FETCH_ASSOC);
    }
}