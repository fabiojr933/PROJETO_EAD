<?php
namespace app\controllers;

use app\core\Controller;
use app\models\Login;

class PerfilController extends Controller{

   public function __construct()
   {
      $id_Login = new Login();
      $this->id_cliente = $id_Login->retonaIdcliente();
      if(!$this->id_cliente){
         header("location:".URL_BASE."login");
      }
   }
    
   public function index(){
    
      $dados["view"] = "Perfil/index";
      $this->load("template", $dados);
   } 
}
