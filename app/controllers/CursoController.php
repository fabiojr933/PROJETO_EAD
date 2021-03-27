<?php
namespace app\controllers;

use app\core\Controller;
use app\models\Aula;
use app\models\AulaAssistida;
use app\models\Curso;
use app\models\Login;

class CursoController extends Controller{
    
   public function __construct()
   {
      $id_Login = new Login();
      $this->id_cliente = $id_Login->retonaIdcliente();
      if(!$this->id_cliente){
         header("location:".URL_BASE."login");
      }
   }
    
   public function index(){
     
      $dados["view"] = "Curso/index";
      $this->load("template", $dados);
   } 
   public function detalhe($id_curso){
      $obj = new Curso();
      $objAula = new Aula();
      $objAulaAssistida = new AulaAssistida();     
      

      $dados["curso"] = $obj->getCurso($id_curso);
      $dados["qtde_assistida"] = $objAulaAssistida->qtdeaulaAssitida($id_curso, $this->id_cliente);
     
      $dados["aulas"] = $objAulaAssistida->listaAulasAssistidas($id_curso, $this->id_cliente);
      $dados["qtde_aula"] = count($dados["aulas"]);
      $dados["view"] = "Curso/index";
      $this->load("template", $dados);
   }
  
}
