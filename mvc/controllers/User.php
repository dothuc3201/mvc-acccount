<?php
    class User extends Controller{
        public $loginmodel;
        public $registermodel;
        function __construct(){
            $this->loginmodel = $this->model("LoginModel");
            $this->registermodel = $this->model("RegisterModel");
        }
        public function index(){
            $this->view("layout", [
                "page" => "home/user",
            ]);
        }
        public function register(){
            // echo $_SERVER['REQUEST_METHOD'];
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $result_mess = false;
                if (isset($_POST["submit"])){
                    
                    if(empty($_POST["username"])||empty($_POST["password"])||empty($_POST["repassword"])||($_POST["password"]!=$_POST["repassword"])){
                        $this->view("register",[
                            "result" =>$result_mess
                        ]);
                    }
                    else{
                        $username = $_POST["username"];
                        $password = $_POST["password"];
                        $password = password_hash($password, PASSWORD_DEFAULT);
                        $kq = $this->registermodel->register($username, $password);
                        // $result = $this->loginmodel->login($username);
                        // $row = mysqli_fetch_array($result);
                        // $id = $row["id"];
                        // $_SESSION["id"] = $id;

                        header("Location:http://localhost/account/User/login");
                    }
                }
            }else{
                $this->view("register",[]);
            }
        }
        public function login(){
            // echo $_SERVER['REQUEST_METHOD'];
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $result_mess = false;
                if (isset($_POST["submit"])){
                    $username = $_POST["username"];
                    $password_input = $_POST["password"];
                    if(empty($_POST["username"])||empty($_POST["password"])){
                        $this->view("login",[
                            "result" => $result_mess
                        ]);
                    }
                    $result = $this->loginmodel->login($username);
                    if(mysqli_num_rows($result)){
                        while ($row = mysqli_fetch_array($result)){
                            $id = $row["id"];
                            $username = $row["username"];
                            $password = $row["password"];
                        }
                        if(password_verify($password_input, $password)){
                            $_SESSION["username"] = $username;
                            $_SESSION["id"] = $id;
                            // echo $_SESSION["username"];
                            header("Location:http://localhost/account/Home");
                        }
                        else{
                            $this ->view("login",[
                                "result" => $result_mess
                            ]);
                        }
                    }
                    else{
                        $this ->view("login",[
                            "result" => $result_mess
                        ]);
                    }
                }
            }
            else{
                $this->view("login", [
                    
                ]);
            }
        }
    
        public function logout(){
            unset($_SESSION['username']);
            session_destroy();
            $this->view("login", [
                
            ]);
        }
    }
?>