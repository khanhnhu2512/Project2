<?php
    // require_once 'libs/connect-db.php';
    class M_admin
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
        public function addOrder($username,$table){
            $this->connect();
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
            $this->connect();
            $sql = "INSERT INTO $table (id_order,id_product,price_total,address,payment_method) VALUES ($id_order,$id_order,$price_total,'$address',$payment_method);";
            $query = mysqli_query($this->con,$sql);
            // $result = array();
            // if (mysqli_num_rows($query) > 0) {
            //     $row = mysqli_fetch_assoc($query);
            //     $result = $row;
            // }
            // return $result; 
        }

        public function addProduct($table,$name,$image,$price,$amount,$content){
            $this->connect();
            $sql = "INSERT INTO $table (name,image,price,amount,content) VALUES ('$name','$image',$price,$amount,'$content');";
            $query = mysqli_query($this->con,$sql);
            return $query;
        }

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
        public function delete($table,$object,$id)
        {
            $this->connect();
            $sql = "DELETE FROM $table WHERE $object = $id";
			return mysqli_query($this->con, $sql);
        }
        public function editUser($table,$id,$username,$password,$fullname,$email,$lv)
        {
            $this->connect();
            $sql = "UPDATE $table SET username = '$username', fullname = '$fullname', password = '$password', email = '$email', lv = $lv WHERE id = $id";
            $query = mysqli_query($this->con, $sql);
            return $query;
        }
        // public function logout(){
        //     session_destroy();
        //     header('location:../index.php'); 
        // }
        
    }    
?> 