<?php
namespace app\controllers;

use app\core\Controller;
use app\models\Aula;
use app\models\AulaAssistida;
use app\models\Baixar;
use app\models\Comentario;
use app\models\Login;

class AulaController extends Controller{

   public function __construct()
   {
      $id_Login = new Login();
      $this->id_cliente = $id_Login->retonaIdcliente();
      if(!$this->id_cliente){
         header("location:".URL_BASE."login");
      }
   }
    
   public function index(){
     
      $dados["view"] = "Aula/index";
      $this->load("template", $dados);
   } 
   public function assistir($id_aula){
      $objAula = new Aula();
      $objAulaAssistida = new AulaAssistida();
      $objBaixar = new Baixar();
      $objComentario = new Comentario();

      $aula = $objAula->getAula($id_aula);
      
      if(!$objAulaAssistida->getJaAssistiu($id_aula, $this->id_cliente)){ 
            $objAulaAssistida->MarcarAssistida($id_aula, $this->id_cliente, $aula["id_curso"]);
      }
      
      $dados["aula"] = $aula; 
      $dados["aulas"] = $objAulaAssistida->listaAulasAssistidas($aula["id_curso"], $this->id_cliente);
      $dados["baixar"] = $objBaixar->lista($aula["id_curso"]);
      $dados["comentarios"] = $objComentario->listaPorAula($id_aula);


      $dados["view"] = "Aula/index";
      $this->load("template", $dados);
   }
}
