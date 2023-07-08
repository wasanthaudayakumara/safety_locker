<?php include '../common/db_conn.php'; ?>
<?php
session_start();
$nic=$_REQUEST["nic"];
$name=$_REQUEST["name"];
$address=$_REQUEST["address"];
$mobile=$_REQUEST["mobile"];
$email=$_REQUEST["email"];





$sql="INSERT INTO new_customer(nic,name,address,mobile,email,date) VALUES('$nic','$name','$address','$mobile','$email',NOW())";
if($conn->query($sql)==TRUE){
	echo "<script>alert('New Customer Added');window.location.href='../acc.php'</script>";
	
}else{
	// 
	echo "<script>alert('Duplicate Customer');window.location.href='../acc.php'</script>";
}


?>