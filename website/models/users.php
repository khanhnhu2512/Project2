<?php
    // require_once 'libs/connect-db.php';
    include_once './libs/connect-db.php' ;
    class M_users extends connect_db
    {
        function __construct()
		{
            parent::__construct(); 
        }
        public function signup($username,$fullname,$email,$password){
            
            $sql = "INSERT INTO user (username,fullname,email,password,lv) VALUES ('$username','$fullname','$email','$password',2);";
            $query = mysqli_query($this->con,$sql);
            return $query;
        }
        

        public function login($username,$password) {
            
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
              
            $sql = "SELECT * FROM $table";
            $query = mysqli_query($this->con,$sql);
            $total_record = mysqli_num_rows($query);//tính tổng số bản ghi có trong bảng        
            $total_page=ceil($total_record/$limit);//tính tổng số trang sẽ chia
            return $total_page;
            
        }
        public function pagination($table,$start,$limit){
            
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