<?php
    // require_once 'libs/connect-db.php';

    class M_users
    {
        public function connect(){        
            $this->serverName = "localhost:3306";
            $this->userName = "root";
            $this->password = "";
            $this->databseName = "project1";
            $this->con = mysqli_connect($this->serverName,$this->userName,$this->password,$this->databseName) or die("Couldn't connect to SQL Server on $this->serverName");
        }

        public function signup($username,$fullname,$email,$password){
            $this->connect();
            $sql = "INSERT INTO user (username,fullname,email,password,lv) VALUES ('$username','$fullname','$email','$password',2);";
            $query = mysqli_query($this->con,$sql);
            return $query;
        }
        

        public function login($username,$password) {
            $this->connect();
            $sql = "SELECT * FROM user WHERE username='$username' AND password='$password' LIMIT 0,1";
            $query = mysqli_query($this->con,$sql);
            if (mysqli_num_rows($query)>0) {
                $_SESSION["user"] = mysqli_fetch_assoc($query);
                return true;
            }
            return false;
        }
        public function getProduct(){
            $this->connect();
            $sql = "SELECT * FROM product";
            $query = mysqli_query($this->con,$sql);
            $result = array();
            if ($query){ 
                while($row = mysqli_fetch_assoc($query)){
                $result[] = $row;
                }
            }
            return $result;
        }
    }    
?>