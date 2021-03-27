<?php
namespace app\models;
use app\core\Model;

class ClienteCurso extends Model{

    public function ListaCursoPorCliente($id){
        $sql = "SELECT * FROM CURSO a, cliente_curso b where a.id_curso = b.id_curso and id_cliente = :idcliente";
        $qry = $this->db->prepare($sql);
        $qry->bindValue(":idcliente",$id);
        $qry->execute();
        return $qry->fetchAll(\PDO::FETCH_ASSOC);
    }
}