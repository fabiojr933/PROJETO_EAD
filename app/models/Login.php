<?php 
namespace app\models;

use app\core\Model;

class Login extends Model{

    public function login($email, $senha){
        $sql = "SELECT * FROM CLIENTE WHERE EMAIL = :EMAIL AND SENHA = :SENHA";
        $qry = $this->db->prepare($sql);
        $qry->bindValue(":EMAIL", $email);
        $qry->bindValue(":SENHA", $senha);
        $qry->execute();
        return $qry->fetch(\PDO::FETCH_ASSOC);
    }
    public function retonaIdcliente(){
        $idCliente = isset($_SESSION[SESSION_LOGIN]) ? $_SESSION[SESSION_LOGIN]["id_cliente"] : null;
        return $idCliente;
    }
}
