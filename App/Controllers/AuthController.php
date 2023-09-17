<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class AuthController extends Action {

    public function autenticar(){
        
        $usuario = Container::getModel('usuario');
        $usuario->__set('email', $_POST['email']);
        $usuario->__set('senha', md5($_POST['senha']));

        $retorno = $usuario->autenticar();
        
        if($retorno->__get('id')!='' && $retorno->__get('nome')!=''){
            session_start();
           
            $_SESSION['id'] = $retorno->__get('id');
            $_SESSION['nome'] = $retorno->__get('nome');
        
            header('Location: /timeline');
  
        }else{
            header('location: /?login=erro');
        }
    }

    public function sair(){
        session_start();
        session_destroy();
        header('Location: /');
    }

}


?>