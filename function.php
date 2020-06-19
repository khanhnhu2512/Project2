<?php  
global $conn;
	function connect(){
		global $conn;
		$serverName = "localhost:3306	";
		$userName = "root";
		$password = "";
		$databseName = "project1";
		if (!$conn) {
			$conn = mysqli_connect($serverName,$userName,$password,$databseName) or die ("Connect False");
		}
	}
	function disconnect(){
		global $conn;
		if ($conn) {
			mysqli_close($conn);
		}
	}
	function show(){
		global $conn;
		connect();
		$sql = "select * from nv_inf";
		$query = mysqli_query($conn,$sql);
		$result = array();
		if ($query){ 
			while($row = mysqli_fetch_assoc($query)){
			$result[] = $row;
			}
		}
		return $result;
	}
	function add($nv_id, $nv_name, $nv_sex, $nv_date){
		global $conn;
		connect();
		$sql = "INSERT INTO 	nv_inf(nv_id,nv_name,nv_sex,nv_date) values('$nv_id','$nv_name','$nv_sex','$nv_date')";
		$query = mysqli_query($conn,$sql);
		return $query;
	}
	function fix($nv_id){
		global $conn;
		connect();
		$sql = "UPDATE nv_inf SET nv_name = '$nv_name', nv_sex = '$nv_sex', nv_date = '$nv_date' WHERE nv_id = '$nv_id'";
		$query = mysqli_query($conn, $sql);
		return $query;
	}
	function show_id($nv_id){
		global $conn;
		connect();
		$sql = "select * from nv_inf WHERE nv_id = {$nv_id}";
		$query = mysqli_query($conn, $sql);
		$result = array();
		if (mysqli_num_rows($sql)>0) {
			$row = mysqli_fetch_assoc($query);
			$result = $row;
		}
	}
?>