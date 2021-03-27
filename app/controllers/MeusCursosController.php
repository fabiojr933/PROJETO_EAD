<?php
namespace app\controllers;

use app\core\Controller;
use app\models\AulaAssistida;
use app\models\ClienteCurso;
use app\models\Curso;
use app\models\Login;

class MeusCursosController extends Controller{

   public function __construct()
   {
      $id_Login = new Login();
      $this->id_cliente = $id_Login->retonaIdcliente();
      if(!$this->id_cliente){
         header("location:".URL_BASE."login");
      }
   }
    
   public function index(){
      $obj = new ClienteCurso();     
     
      $dados["lista_curso"] = $this->lista($this->id_cliente);
      $dados["view"] = "Meus_cursos/index";
      $this->load("template", $dados);
   } 
   public function lista($id_cliente){
      $obj = new ClienteCurso();    
      $objCurso = new Curso();
      $aulaAssitida = new AulaAssistida();  
      $lista = $obj->ListaCursoPorCliente($id_cliente);
      $resultado = array();

      if($lista){
         foreach($lista as $curso){
            $qtde_assistida = $aulaAssitida->qtdeaulaAssitida($curso["id_curso"], $id_cliente);
            $qtde_aula = $objCurso->qtdeaulaPorCurso($curso["id_curso"]);
            $curso["qtde_assistida"] = $qtde_assistida["QTDE"];  
            $curso["qtde_aula"] = $qtde_aula["QTDE"];            
            $resultado[] = $curso;           
         }
      }           
      return $resultado;
   }
}
