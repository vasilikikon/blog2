<?php

namespace App\Controllers;

use App\Views;
use App\Models;
use Exception;

 class AuthController  {

  public function get_login_page(){
   $page = new Views\AuthView; 
   echo $page -> showlogin();
  }

  public function get_register_page(){
   $page = new Views\AuthView;
   echo $page -> showregister();
  }

  public function post_register_page(){
  try {
    $createUserObj = new Models\UserModel;
    $createUserObj->createUser($_POST["uname_register"], $_POST["psw"]);
    header("Location: /login");
    exit;
  } catch (Exception $e) {
    echo $e->getMessage();
  }

}


  public function post_login_page(){
    $createUserObj = new Models\UserModel;
    $user = $createUserObj->getUserByUsername($_POST["uname_login"]);
    
    if (password_verify($_POST["psw"], $user['password'])) {
      $_SESSION['user_id'] = $user['id'];
      header("Location: /blogscollection");
        exit;
    } else {
      echo "<H1>Password or email is incorrect, prease try again.</H1>";
      $this->get_login_page();
    }

    
  
  }

  }
 
 ?>