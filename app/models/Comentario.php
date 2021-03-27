<?php
namespace app\models;
use app\core\Model;

class Comentario extends Model{
    public function inserir($id_aula,$id_cliente,$id_curso,$comentario){
        $sql = "INSERT INTO COMENTARIO SET 
        id_aula = :ID_AULA,
        id_cliente = :ID_CLIENTE,
        id_curso = :ID_CURSO,
        comentario = :comentario,
        data_comentario = :DATA,
        hora_comentario = :HORA";
$qry = $this->db->prepare($sql);
$qry->bindValue(":ID_AULA", $id_aula);
$qry->bindValue(":ID_CLIENTE", $id_cliente);
$qry->bindValue(":ID_CURSO", $id_curso);
$qry->bindValue(":comentario", $comentario);
$qry->bindValue(":DATA", date("Y-m-d"));
$qry->bindValue(":HORA", date("H:i:s"));
$qry->execute();
return $this->db->lastInsertId(); 
    }

    public function listaPorAula($id_aula){
        $sql = "SELECT * FROM COMENTARIO WHERE ID_AULA = :ID_AULA";
        $qry = $this->db->prepare($sql);
        $qry->bindValue(":ID_AULA", $id_aula);
        $qry->execute();
        return $qry->fetchAll(\PDO::FETCH_ASSOC);
    }
}