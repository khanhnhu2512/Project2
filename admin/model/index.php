<?php
    // require_once 'libs/connect-db.php';
    include_once '../public/connect-db.php';
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
        
        // public function getObject_id($table,$id)
        // {
        //     $this->conn();
        //     $sql = "SELECT * from $table WHERE id = $id";
        //     $query = mysqli_query($this->con,$sql);
        //     $result = array();
        //     if (mysqli_num_rows($query) > 0) {
        //         $row = mysqli_fetch_assoc($query);
        //         $result = $row;
        //     }
        //     return $result;
        // }

        public function sort($table,$object,$value)
        {
            $this->conn();
            $sql = "SELECT * from $table ORDER BY $object $value";
            $query = mysqli_query($this->con, $sql);
            $result = array();
            if ($query){ 
                while($row = mysqli_fetch_assoc($query)){
                $result[] = $row;
                }
            }
            return $result;
        }
        public function sortWhere($table,$where,$whereVal,$object,$value)
        {
            $this->conn();
            $sql = "SELECT * from $table WHERE $where = $whereVal ORDER BY $object $value LIMIT 8";
            $query = mysqli_query($this->con, $sql);
            $result = array();
            if ($query){ 
                while($row = mysqli_fetch_assoc($query)){
                $result[] = $row;
                }
            }
            return $result;
        }

        public function OrderByLimit($table,$object,$value,$limit)
        {
            $this->conn();
            $sql = "SELECT * from $table ORDER BY $object $value LIMIT $limit";
            $query = mysqli_query($this->con, $sql);
            $result = array();
            if ($query){ 
                while($row = mysqli_fetch_assoc($query)){
                $result[] = $row;
                }
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

        public function addProduct($table,$name,$type,$image,$price,$qty,$description){
            $this->conn();
            $sql = "INSERT INTO $table (name,image,type,price,qty,description,create_time) VALUES ('$name','$image',$type,$price,$qty,'$description',NOW());";
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
        public function getObject_id($table,$object,$id)
        {
            $this->conn();
            $sql = "SELECT * from $table WHERE $object = $id";
            $query = mysqli_query($this->con, $sql);
            $result = array();
            if (mysqli_num_rows($query) > 0) {
                        $row = mysqli_fetch_assoc($query);
                        $result = $row;
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
            $sql = "UPDATE $table SET username = '$username', fullname = '$fullname', email = '$email', lv = $lv, last_updated = now()  WHERE id = $id";
            $query = mysqli_query($this->con, $sql);
            return $query;
        }
        public function editProduct($table,$id,$name,$image,$price,$qty,$description)
        {
            $this->conn();
            $sql = "UPDATE $table SET name = '$name', image = '$image', price = $price, qty = $qty, description = '$description' last_updated = now() WHERE id = $id";
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
