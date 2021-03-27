<?php
namespace app\controllers;
use app\models\ClienteCurso;
use app\core\Controller;
use app\models\Login;

class HomeController extends Controller{

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

      $dados["lista_curso"] = $obj->ListaCursoPorCliente($this->id_cliente);
      $dados["view"] = "home";
      $this->load("template", $dados);
   } 
}
