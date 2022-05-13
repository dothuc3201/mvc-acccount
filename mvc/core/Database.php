<?php
    class Database{
        public $con;
        public $host = "localhost";
        public $username = "root";
        public $password = "";
        public $dbName = "backend";

        function __construct()
        {
            $this->con = mysqli_connect($this->host, $this->username, $this->password);
            mysqli_select_db($this->con, $this->dbName);
            mysqli_query($this->con, "SET NAMES 'utf8'");
        }
    }
?>