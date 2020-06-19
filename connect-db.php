<?php
    class conn{
        private serverName = "localhost:3306";
        private $userName = "root";
        private $password = "";
        private $databseName = "project1";
        private function connect(){
            if (!$this->conn) {
                $this->conn = mysqli_connect($this->serverName,$this->userName,$this->password,$this->databseName) 
                or die ("Connect False");
            }
        }
    }
?>           
 // global $conn;
// $this->serverName = "localhost:3306	";
// $this->$userName = "root";
// $this->$password = "";
// $this->$databseName = "project1";