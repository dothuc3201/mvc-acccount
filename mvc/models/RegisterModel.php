<?php
 class RegisterModel extends Database{
     public function register($username, $password){
         $sql = "INSERT INTO `users`(`username`, `password`) VALUES ('$username','$password')";
         $result = false;
         if (mysqli_query($this->con, $sql)){
             $result = true;
         }
         return json_decode($result);
     }
     
 }
