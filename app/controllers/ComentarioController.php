<?php
namespace app\controllers;

use app\core\Controller;
use app\models\Comentario;
use app\models\Login;

class ComentarioController extends Controller{

   public function __construct()
   {
      $id_Login = new Login();
      $this->id_cliente = $id_Login->retonaIdcliente();
      if(!$this->id_cliente){
         header("location:".URL_BASE."login");
      }
   }
    
   public function index(){
      $objComentario = new Comentario();
     
      $dados["view"] = "Comentarios/index";
     // $dados["comentarios"] = $objComentario->listaPorAula($this->id_aula);
      $this->load("template", $dados);
   } 
   public function inserir(){
      $objComentario = new Comentario();
   
      $id_aula  = $_POST["id_aula"];
      $id_cliente  = $this->id_cliente;
      $comentario  = $_POST["comentario"];
      $id_curso  = $_POST["id_curso"];
      $dados["comentarios"] = $objComentario->listaPorAula($id_aula);

      $resultado = $objComentario->inserir($id_aula,$id_cliente,$id_curso,$comentario);

     header("location:".URL_BASE."aula/assistir/".$id_aula);      
   }
}
