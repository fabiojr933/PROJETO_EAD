<?php
namespace app\models;
use app\core\Model;

class AulaAssistida extends Model{
    public function MarcarAssistida($id_aula, $id_cliente, $id_curso){
        $sql = "INSERT INTO AULA_ASSISTIDA SET 
                id_aula = :ID_AULA,
                id_cliente = :ID_CLIENTE,
                id_curso = :ID_CURSO,
                data_assistida = :DATA,
                hora_assistida = :HORA";
        $qry = $this->db->prepare($sql);
        $qry->bindValue(":ID_AULA", $id_aula);
        $qry->bindValue(":ID_CLIENTE", $id_cliente);
        $qry->bindValue(":ID_CURSO", $id_curso);
        $qry->bindValue(":DATA", date("Y-m-d"));
        $qry->bindValue(":HORA", date("H:i:s"));
        $qry->execute();
        return $this->db->lastInsertId(); 
    }
    public function getJaAssistiu($id_aula, $id_cliente){
        $sql = "SELECT * FROM AULA_ASSISTIDA A WHERE A.ID_AULA = :ID_AULA AND A.ID_CLIENTE = :ID_CLIENTE";
        $qry = $this->db->prepare($sql);
        $qry->bindValue(":ID_AULA", $id_aula);
        $qry->bindValue(":ID_CLIENTE", $id_cliente); 
        $qry->execute();
        return $qry->fetch(\PDO::FETCH_ASSOC);
        
    }
    public function listaAulasAssistidas($id_curso, $id_cliente){
        $objAula = new Aula();
        $objAulaAssistida = new AulaAssistida();
        $aulas = $objAula->ListaPorCurso($id_curso);
        $lista = array();
        if($aulas){
              foreach($aulas as $aula){
              $assistiu = $objAulaAssistida->getJaAssistiu($aula["id_aula"], $id_cliente);            
              if($assistiu){              
                 $data = $assistiu["data_assistida"];
                 $hora = $assistiu["hora_assistida"];
                    $assistido = true;
              }else{
                    $data = "0000-00-00";
                    $hora = "00:00:00";
                    $assistido = false;
              }       
             
              $lista[] = array(
                 "id_aula"         => $aula["id_aula"],
                 "id_curso"        => $aula["id_curso"],
                 "aula"            => $aula["aula"],
                 "duracao_aula"    => $aula["duracao_aula"],
                 "embed_youtube"   => $aula["embed_youtube"],
                 "slug_aula"       => $aula["slug_aula"],
                 "ativo_aula"      => $aula["ativo_aula"],
                 "data"            => $data,
                 "hora"            => $hora,
                 "assistido"       => $assistido               
              );
              }
            }          
        return $lista;    
     }

     public function qtdeaulaAssitida($id_curso, $id_cliente){
         $sql = "SELECT COUNT(*) AS QTDE FROM AULA_ASSISTIDA WHERE ID_CURSO = :IDCURSO AND ID_CLIENTE = :ID_CLIENTE";
         $qry = $this->db->prepare($sql);
        $qry->bindValue(":IDCURSO", $id_curso);
        $qry->bindValue(":ID_CLIENTE", $id_cliente); 
        $qry->execute();
        return $qry->fetch(\PDO::FETCH_ASSOC);
     }
}