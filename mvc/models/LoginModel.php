<?php
 class LoginModel extends Database{
     public function login($username){
         $sql = "SELECT * FROM users where username ='$username'";
         return mysqli_query($this->con, $sql);
     }
 }
