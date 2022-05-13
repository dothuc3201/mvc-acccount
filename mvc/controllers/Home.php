<?php
    class Home extends Controller{
        public $usermodel;
        public function __construct()
        {
            $this->usermodel = $this->model("UserModel");
        }
        public function index(){
            $this->view("layout", [
                "page" => "home/user",
                "thongtin" => $this->usermodel->get($_SESSION["id"]),
            ]);
        }
        public function insert(){
            $firstName = $_POST["firstName"];
            $lastName = $_POST["lastName"];
            $gender = $_POST["gender"];
            $phoneNumber = $_POST["phoneNumber"];
            $kq = $this->usermodel->insert($_SESSION["id"],$lastName, $firstName, $gender, $phoneNumber);
            $this->view("layout", [
                "page" => "home/user",
                "thongtin" => $this->usermodel->get($_SESSION["id"]),
                
            ]);
        }
        public function update(){
            $result_mess = false;
            $firstName = $_POST["firstName"];
            $lastName = $_POST["lastName"];
            $gender = $_POST["gender"];
            $phoneNumber = $_POST["phoneNumber"];
            $kq = $this->usermodel->update($_SESSION["id"],$lastName, $firstName, $gender, $phoneNumber);
            $this->view("layout", [
                "page" => "home/user",
                "thongtin" => $this->usermodel->get($_SESSION["id"]),
                
            ]);
        }
    }
?>