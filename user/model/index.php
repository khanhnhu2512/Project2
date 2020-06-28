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
        public function logout(){
            session_destroy();
            header('location:../index.php'); 
        }
        
    }    
?>