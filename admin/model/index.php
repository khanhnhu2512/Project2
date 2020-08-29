<?php
    // require_once 'libs/connect-db.php';
    include_once '../libs/connect-db.php';
    class M_admin extends connect_db
    {
        // public $conn;
        // public $db;
        function conn()
		{
            parent::__construct(); 
            // $this->db = new connect_db();
            // $conn = $this->db->con;
            // echo isset($this->con) ? "ok" : "none";
            
        }   
        
        public function getObject_id($id,$table)
        {
            $this->conn();
            $sql = "SELECT * from $table WHERE id = $id";
            $query = mysqli_query($this->con,$sql);
            $result = array();
            if (mysqli_num_rows($query) > 0) {
                $row = mysqli_fetch_assoc($query);
                $result = $row;
            }
            return $result;
        }

        public function getObject($table){
            $this->conn();
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
            $this->conn();
            $sql = "SELECT * FROM $table";
            $query = mysqli_query($this->con,$sql);
            $total_record = mysqli_num_rows($query);//tính tổng số bản ghi có trong bảng        
            $total_page=ceil($total_record/$limit);//tính tổng số trang sẽ chia
            return $total_page;
        }
        public function pagination($table,$start,$limit){
            $this->conn();
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
        public function addOrder($username,$table){
            $this->conn();
            $sql = "INSERT INTO $table (username,status) VALUES ('$username',0);";
            $query = mysqli_query($this->con,$sql);
            // $result = array();
            // if (mysqli_num_rows($query) > 0) {
            //     $row = mysqli_fetch_assoc($query);
            //     $result = $row;
            // }
            // return $result;
        }
        
        public function addOrderDetail($table,$id_order,$price_total,$address,$payment_method){
            $this->conn();
            $sql = "INSERT INTO $table (id_order,id_product,price_total,address,payment_method) VALUES ($id_order,$id_order,$price_total,'$address',$payment_method);";
            $query = mysqli_query($this->con,$sql);
            // $result = array();
            // if (mysqli_num_rows($query) > 0) {
            //     $row = mysqli_fetch_assoc($query);
            //     $result = $row;
            // }
            // return $result; 
        }

        public function addProduct($table,$name,$type,$image,$price,$qty,$description){
            $this->conn();
            $sql = "INSERT INTO $table (name,image,type,price,qty,description) VALUES ('$name','$image',$type,$price,$qty,'$description');";
            $query = mysqli_query($this->con,$sql);
            return $query;
        }

        public function getEverything_id($table,$object,$id)
        {
            $this->conn();
            $sql = "SELECT * from $table WHERE $object = $id";
            $query = mysqli_query($this->con, $sql);
            $result = array();
            if ($query){ 
                while($row = mysqli_fetch_assoc($query)){
                $result[] = $row;
                }
            }
            return $result;
        }
        public function delete($table,$object,$id)
        {
            $this->conn();
            $sql = "DELETE FROM $table WHERE $object = $id";
			return mysqli_query($this->con, $sql);
        }
        public function editUser($table,$id,$username,$fullname,$email,$lv)
        {
            $this->conn();
            $sql = "UPDATE $table SET username = '$username', fullname = '$fullname', email = '$email', lv = $lv WHERE id = $id";
            $query = mysqli_query($this->con, $sql);
            return $query;
        }
        public function editProduct($table,$id,$name,$image,$price,$qty,$description)
        {
            $this->conn();
            $sql = "UPDATE $table SET name = '$name', image = '$image', price = $price, qty = $qty, description = '$description' WHERE id = $id";
            $query = mysqli_query($this->con, $sql);
            return $query;
        }
        public function acceptOrder($id)
        {
            $this->conn();
            $sql = "UPDATE order_list SET status = 1 WHERE id_order = $id";
            $query = mysqli_query($this->con, $sql);
            return $query;
        }
        // public function logout(){
        //     session_destroy();
        //     header('location:../index.php'); 
        // }
        
    }    
?> 