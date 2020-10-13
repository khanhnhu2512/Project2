<?php
    // require_once 'libs/connect-db.php';
    include_once ('public/connect-db.php');
    class M_users extends connect_db
    {
        function conn()
		{
            parent::__construct(); 
        }
        public function checkUser($object,$value)
        {
            $this->conn();
            $sql = "SELECT count(*) as count from user WHERE $object = '$value'";
            $query = mysqli_query($this->con, $sql);
            $error = 0;
            if ($query){
                $row = mysqli_fetch_array($query, MYSQLI_ASSOC);
                if ((int)$row['count'] > 0){
                    $error = 1;
                }
            }
            
            return $error;
        }

        public function login($username,$password) {
            $this->conn();
            $sql = "SELECT * FROM user WHERE username='$username' AND password='$password' LIMIT 0,1";
            $query = mysqli_query($this->con,$sql);
            if (mysqli_num_rows($query)>0) {
                $_SESSION["user"] = mysqli_fetch_assoc($query);
                return true;
            }
            return false;
        }
        public function signup($username,$fullname,$email,$password){
            $this->conn();
            $sql = "INSERT INTO user (username,fullname,email,password,lv,create_time) VALUES ('$username','$fullname','$email','$password',100,now());";
            $query = mysqli_query($this->con,$sql);
            return $query;
        }
        public function getObject_id($id,$table)
        {
            $this->conn();
            $sql = "SELECT * from $table WHERE id = $id";
            $query = mysqli_query($this->con, $sql);
            $result = array();
            if (mysqli_num_rows($query) > 0) {
                $row = mysqli_fetch_assoc($query);
                $result = $row;
            }
            return $result;
        }
        public function getSth($col,$id){
            $this->conn();
            $sql = "SELECT $col from product WHERE id = $id";
            $query = mysqli_query($this->con, $sql);
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
        public function addNotifications($lv,$content){
            $this->conn();
            $sql = "INSERT INTO notifications (content,lv,create_time) VALUES ('$content',$lv,now());";
            $query = mysqli_query($this->con,$sql);
            return $query;
        }
        public function updateSth($col,$value,$id)
        {
            $this->conn();
            $sql = "UPDATE product SET $col = '$value' WHERE id = $id";
            $query = mysqli_query($this->con, $sql);
            return $query;
        }
        public function search($table,$object,$value)
        {
            $this->conn();
            $sql = "SELECT * FROM $table WHERE $object LIKE '%$value%'"; 
            $query = mysqli_query($this->con, $sql);
            $result = array();
            if ($query){ 
                while($row = mysqli_fetch_assoc($query)){
                $result[] = $row;
                }
            }
            return $result;
        }
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
        public function resetPass($email,$newpass)
        {
            $this->conn();
            $sql = "UPDATE user SET password = '$newpass', last_updated = now()  WHERE email = '$email'";
            $query = mysqli_query($this->con, $sql);
            return $query;
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
        public function OrderBy($table,$object,$value)
        {
            $this->conn();
            $sql = "SELECT * from $table ORDER BY $object $value LIMIT 8";
            $query = mysqli_query($this->con, $sql);
            $result = array();
            if ($query){ 
                while($row = mysqli_fetch_assoc($query)){
                $result[] = $row;
                }
            }
            return $result;
        }

        public function Random($table,$object,$id,$limit)
        {
            $this->conn();
            $sql = "SELECT * from $table WHERE $object = $id ORDER BY RAND () limit $limit";
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
        public function getOrderId($table){
            $this->conn();
            $sql = "SELECT * FROM $table ORDER BY id_order DESC";
            $query = mysqli_query($this->con,$sql);
            $result = array();
            if (mysqli_num_rows($query) > 0) {
                $row = mysqli_fetch_assoc($query);
                $result = $row;
            }
            return $result;
        }
        
        public function addOrderList($table,$username,$fullname,$email,$number,$total_price,$address,$payment_method){
            $this->conn();
            $sql = "INSERT INTO $table (username,fullname,email,phone_number,status,total_price,address,payment_method,create_time) VALUES ('$username','$fullname','$email','$number',0,$total_price,'$address',$payment_method,NOW());";
            $query = mysqli_query($this->con,$sql);
            return $query;
        }
        
        public function addOrderDetail($table,$id_order,$id_product,$price,$qty){
            $this->conn();
            $sql = "INSERT INTO $table (id_order,id_product,price,qty) VALUES ($id_order,$id_product,$price,$qty)";
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
            $this->conn();
            $sql = "SELECT * from $table WHERE $object = '$id'";
            $query = mysqli_query($this->con, $sql);
            $result = array();
            if ($query){ 
                while($row = mysqli_fetch_assoc($query)){
                $result[] = $row;
                }
            }
            return $result;
        }
        // public function signout(){
        //     session_destroy();
        //     header('location:index.php?method=home'); 
        // }
        
    }
