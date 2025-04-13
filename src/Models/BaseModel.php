<?php

namespace App\Models;

use App\Core;
use PDOException;

class BaseModel
{
  protected $db;

  public function __construct(){
       $this->db = Core\Database::getInstance();
  }


 protected function query($sql, $params = []){
  try {
    $stmt = $this->db->prepare($sql);
    $stmt->execute($params);
    return $stmt;
   } catch (PDOException $e) {
    echo "DataBase Error: <br>" . $e->getMessage();
   }

 }


}
 
 
 
 ?>