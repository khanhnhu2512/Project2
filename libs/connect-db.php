<?php
    class connect_db{
        private $serverName = "localhost:3306";
        private $userName = "root";
        private $password = "";
        private $databseName = "project1";
        protected $con = null;
        function __construct(){
            $this->con = mysqli_connect($this->serverName,$this->userName,$this->password,$this->databseName) or die("Couldn't connect to SQL Server on $this->serverName");
            if ($this->con) {
                mysqli_set_charset($this->con, 'utf8');
            }
            else{
                echo "Can't connect database";
				exit();
            }

        }
    }
?>