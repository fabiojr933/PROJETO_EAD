<?php

namespace app\controllers;

use app\core\Controller;
use app\models\Login;

class LoginController extends Controller
{

   public function index()
   {
      $dados["view"] = "login";
      $this->load("login", $dados);
   }
   public function logar()
   {
      $email = $_POST["email"];
      $senha = $_POST["senha"];

      $Clientelogar = new Login();
      $cliente = $Clientelogar->login($email, $senha);
      if ($cliente) {
         $_SESSION[SESSION_LOGIN] = $cliente;
         header("location:" . URL_BASE);
      } else {
         session_destroy();
         echo "cliente não econtrado;";
      }
   }
   public function logoff(){
      session_destroy();
  //  unset($_SESSION[SESSION_LOGIN]);
      header("location:" . URL_BASE);
   }
}
