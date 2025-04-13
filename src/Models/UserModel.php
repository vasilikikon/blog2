<?php 
 namespace App\Models;
 use PDO;
 
 class UserModel extends BaseModel{


  public function createUser($username, $password){

      $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
      $sql = "INSERT INTO blog_dev.users
                    (username, password, created_at)
                      VALUES (?,?,?);";

      $this->query($sql, [$username, $hashedPassword, date("Y-m-d H:i:s")]);
 }


 public function getUserByUsername($username){

   $sql = "SELECT id, username, password FROM blog_dev.users WHERE username = ?";
   $stmt = $this->query($sql, [$username]);
   return $stmt->fetch(PDO::FETCH_ASSOC); 
 }


}
 
 ?>