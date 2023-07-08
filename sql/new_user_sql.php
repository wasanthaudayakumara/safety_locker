<?php include '../common/db_conn.php'; ?>
<?php
session_start();

$user_name=$_REQUEST["user_name"];
$password=$_REQUEST["password"];
$Service_No=$_REQUEST["Service_No"];
$role=$_POST["role"];




$sql="INSERT INTO users(user_name,password,Service_No,role) VALUES('$user_name','$password','$Service_No','$role')";
if($conn->query($sql)==TRUE){
	echo "<script>alert('New User Added');window.location.href='../admin/index.php'</script>";
	
}else{
	echo"Error: " .$sql . "<br>" . $conn->error;
}


?>