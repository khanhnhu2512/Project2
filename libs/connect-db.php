<?php
    class conn{
        private $serverName = "localhost:3306";
        private $userName = "root";
        private $password = "";
        private $databseName = "project1";
        public function con()
        {
            $this->conn = mysqli_connect($this->serverName,$this->userName,$this->password,$this->databseName) or die("Couldn't connect to SQL Server on $this->serverName");
            if ($this->conn) {
                mysqli_set_charset($this->conn, 'utf8');
            }
        }
    }
?>           