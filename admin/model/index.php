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
        public function getId($table,$id){
            $this->conn();
            $sql = "SELECT $id FROM $table ORDER BY $id DESC";
            $query = mysqli_query($this->con,$sql);
            $result = array();
            if (mysqli_num_rows($query) > 0) {
                $row = mysqli_fetch_assoc($query);
                $result = $row;
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
            $sql = "INSERT INTO $table (name,image,status,type,price,qty,description,create_time) VALUES ('$name','$image',1,$type,$price,$qty,'$description',NOW());";
            $query = mysqli_query($this->con,$sql);
            return $query;
        }
        public function addCategory($name){
            $this->conn();
            $sql = "INSERT INTO product_category (name) VALUES ('$name');";
            $query = mysqli_query($this->con,$sql);
            return $query;
        }
        public function addCategory_information($id){
            $this->conn();
            $sql = "INSERT INTO product_category_information (id_category) VALUES ($id);";
            $query = mysqli_query($this->con,$sql);
            return $query;
        }
        public function editCategory_information($id,$key,$value)
        {
            $this->conn();
            $sql = "UPDATE product_category_information SET $key = $value  WHERE id_category = $id";
            $query = mysqli_query($this->con, $sql);
            return $query;
        }
        public function addProduct_information($id){
            $this->conn();
            $sql = "INSERT INTO product_information (id_product) VALUES ($id);";
            $query = mysqli_query($this->con,$sql);
            return $query;
        }
        public function addPermission_name($name){
            $this->conn();
            $sql = "INSERT INTO user_level (name) VALUES ('$name');";
            $query = mysqli_query($this->con,$sql);
            return $query;
        }
        public function addPermission_id($id){
            $this->conn();
            $sql = "INSERT INTO user_permissions (id_lv) VALUES ('$id');";
            $query = mysqli_query($this->con,$sql);
            return $query;
        }
        public function editPermission($id,$key,$value)
        {
            $this->conn();
            $sql = "UPDATE user_permissions SET $key = '$value'  WHERE id_lv = $id";
            $query = mysqli_query($this->con, $sql);
            return $query;
        }
        public function editProduct_information($id,$key,$value)
        {
            $this->conn();
            $sql = "UPDATE product_information SET $key = '$value'  WHERE id_product = $id";
            $query = mysqli_query($this->con, $sql);
            return $query;
        }
        public function editEmail($key,$value)
        {
            $this->conn();
            $sql = "UPDATE product_information SET $key = '$value'";
            $query = mysqli_query($this->con, $sql);
            return $query;
        }
        public function addProduct_images($id,$image_name){
            $this->conn();
            $sql = "INSERT INTO product_images (id_product,url) VALUES ($id,'$image_name');";
            $query = mysqli_query($this->con,$sql);
            return $query;
        }
        public function addNotifications($lv,$content){
            $this->conn();
            $sql = "INSERT INTO notifications (content,lv,create_time) VALUES ('$content',$lv,now());";
            $query = mysqli_query($this->con,$sql);
            return $query;
        }
        public function addLogs($username,$action,$lv){
            $this->conn();
            $sql = "INSERT INTO logs (username,action,lv,create_time) VALUES ('$username','$action',$lv,now());";
            $query = mysqli_query($this->con,$sql);
            return $query;
        }
        public function dropTable($table){
            $this->conn();
            $sql = "TRUNCATE $table";
            $query = mysqli_query($this->con,$sql);
            return $query;
        }

        public function editEverything($table,$key,$value,$id,$id_value)
        {
            $this->conn();
            $sql = "UPDATE $table SET $key = $value  WHERE $id = $id_value";
            $query = mysqli_query($this->con, $sql);
            return $query;
        }
        public function addBanner_img($url){
            $this->conn();
            $sql = "INSERT INTO management_image_banner (url) VALUES ('$url');";
            $query = mysqli_query($this->con,$sql);
            return $query;
        }
        public function editManagement($key,$value)
        {
            $this->conn();
            $sql = "UPDATE management_site SET $key = '$value'";
            $query = mysqli_query($this->con, $sql);
            return $query;
        }
        public function editCategory($id,$name)
        {
            $this->conn();
            $sql = "UPDATE product_category SET name = $name  WHERE id = $id";
            $query = mysqli_query($this->con, $sql);
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
        public function editUser($id,$lv)
        {
            $this->conn();
            $sql = "UPDATE user SET  lv = $lv, last_updated = now()  WHERE id = $id";
            $query = mysqli_query($this->con, $sql);
            return $query;
        }
        public function editProduct($table,$id,$name,$image,$price,$qty,$description)
        {
            $this->conn();
            $sql = "UPDATE $table SET name = '$name', image = '$image', price = $price, qty = $qty, description = '$description', last_updated = now() WHERE id = $id";
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
