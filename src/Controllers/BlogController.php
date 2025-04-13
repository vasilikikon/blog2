<?php

namespace App\Controllers;

 class BlogController  {
      public function __construct() {
        if (!isset($_SESSION['user_id'])) {
            echo "<h2>Unauthorized access. Please log in first.</h2>";
            header ("Location: /login");
            exit;
        }
    }

  
  public function get_blog($id){
   echo "this is the blog page with the id: ".$id;
  }

  public function get_blogscollection(){
   
    echo "this is the blogscollection page";
   
    echo $_SESSION['user_id'];
  }

public function post_blog(){
   echo "this is post a blog";
  }

  public function post_blogscollection(){
   echo "this is post a blogscollection";
  }

 public function get_default_page(){
  echo "this is the default page";
 }


  }
 
 ?>