<?php
namespace App\Views;

class AuthView{
 public function showlogin(){
   return <<<HTML
   <form action ="/loginRequest" method="POST">
       <label for="uname_login"><b>Username</b></label>
       <input type="text" placeholder="Enter Username" id="uname_login" name="uname_login" required>

       <label for="psw"><b>Password</b></label>
       <input type="password" placeholder="Enter Password" id="psw" name="psw" required>

       <button type="submit">Login</button>
       </form>
   HTML;


 }


public function showregister(){
 return <<<HTML
 <form action ="/registerRequest" method="POST">
    <label for="uname_register"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" id="uname_register" name="uname_register" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" id="psw" name ="psw" required>

    <button type="submit">Register</button>
    </form>
HTML;

 }


public function showregisterfail(){
    return <<<HTML
      <h1>Registration failed please try again</h1>
      <form action="/register" method="POST">
        <label for="uname_register"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" id="uname_register" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" id="psw" required>
        <button type="submit">Register</button>
      
      </form> 

  HTML;
 }




}
 ?>