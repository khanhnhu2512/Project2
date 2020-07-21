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
        
        public function checkUser($object,$value)
        {
            $this->connect();
            $sql = "SELECT * from 'user' WHERE $object = $value";
            $query = mysqli_query($this->con, $sql);
            $result = true;
            if (mysqli_num_rows($query) > 0) {
                $result = false; //check if $query exist $object = $value
            }
            return $result;
        }

        public function getObject_id($id,$table)
        {
            $this->connect();
            $sql = "SELECT * from $table WHERE id = $id";
            $query = mysqli_query($this->con, $sql);
            $result = array();
            if (mysqli_num_rows($query) > 0) {
                $row = mysqli_fetch_assoc($query);
                $result = $row;
            }
            return $result;
        }

        public function getObject($table){
            $this->connect();
            $sql = "SELECT * FROM $table";
            $query = mysqli_query($this->con,$sql);
            $result = array();
            if ($query){ 
                while($row = mysqli_fetch_assoc($query)){
                $result[] = $row;
                }
            }
            return $result;
        }
        public function getPagination($table,$limit){
            $this->connect();    
            $sql = "SELECT * FROM $table";
            $query = mysqli_query($this->con,$sql);
            $total_record = mysqli_num_rows($query);//tính tổng số bản ghi có trong bảng        
            $total_page=ceil($total_record/$limit);//tính tổng số trang sẽ chia
            return $total_page;
            
        }
        public function pagination($table,$start,$limit){
            $this->connect();
            $sql="select * from $table limit $start,$limit";
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