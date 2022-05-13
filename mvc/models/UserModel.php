<?php
class UserModel extends Database{
    public function get($id){
        $sql = "SELECT * FROM `employees` where user_id =$id";
        return mysqli_query($this->con, $sql);
    }
    public function update($user_id,$lastName, $firstName, $gender, $phoneNumber){
        $sql = "UPDATE `employees` SET firstName='$firstName', lastName='$lastName', gender='$gender', phoneNumber='$phoneNumber' where user_id=$user_id";
        $result = false;
         if (mysqli_query($this->con, $sql)){
             $result = true;
         }
         return json_decode($result);
    }

    public function insert($user_id,$lastName, $firstName, $gender, $phoneNumber){
        $sql = "INSERT INTO `employees`(`lastName`, `firstName`, `gender`, `phoneNumber`, `user_id`) VALUES ('$lastName','$firstName','$gender','$phoneNumber','$user_id')";
        $result = false;
         if (mysqli_query($this->con, $sql)){
             $result = true;
         }
         return json_decode($result);
    }
}
?>