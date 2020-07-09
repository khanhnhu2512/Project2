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
        public function getOrderId($table,$username){
            $this->connect();
            $sql = "SELECT * FROM $table ORDER BY id_order DESC";
            $query = mysqli_query($this->con,$sql);
            $result = array();
            if (mysqli_num_rows($query) > 0) {
                $row = mysqli_fetch_assoc($query);
                $result = $row;
            }
            return $result;
            
        }
        public function addOrderList($table,$username,$total_price,$address,$payment_method){
            $this->connect();
            $sql = "INSERT INTO $table (username,status,total_price,address,payment_method) VALUES ('$username',0,$total_price,'$address',$payment_method);";
            $query = mysqli_query($this->con,$sql);
            return $query;
        }
        
        public function addOrderDetail($table,$id_order,$id_product,$price,$amount){
            $this->connect();
            $sql = "INSERT INTO $table (id_order,id_product,price,amount) VALUES ($id_order,$id_product,$price,$amount)";
            $query = mysqli_query($this->con,$sql);
            return $query;
        }

        // public function addOrderProduct($table,$id_product,$amount){
        //     $this->connect();
        //     $sql = "INSERT INTO $table (id_product,amount) VALUES ($id_product,$amount);";
        //     $query = mysqli_query($this->con,$sql);
        //     $result = array();
        //     if (mysqli_num_rows($query) > 0) {
        //         $row = mysqli_fetch_assoc($query);
        //         $result = $row;
        //     }
        //     return $result;
        // }
        public function getEverything_id($table,$object,$id)
        {
            $this->connect();
            $sql = "SELECT * from $table WHERE $object = '$id'";
            $query = mysqli_query($this->con, $sql);
            $result = array();
            if (mysqli_num_rows($query) > 0) {
                $row = mysqli_fetch_assoc($query);
                $result = $row;
            }
            return $result;
        }
        // public function logout(){
        //     session_destroy();
        //     header('location:../index.php'); 
        // }
        
    }    
?>