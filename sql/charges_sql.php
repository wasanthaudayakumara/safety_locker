<?php include '../common/db_conn.php'; ?>
<?php
session_start();
$locker_type=$_POST["locker_type"];
$amount=$_REQUEST["amount"];




$sql="INSERT INTO charges(locker_type,amount) VALUES('$locker_type','$amount')";
if($conn->query($sql)==TRUE){
	echo "<script>alert('New Charges Added');window.location.href='../admin/index.php'</script>";
	
}else{
	echo"Error: " .$sql . "<br>" . $conn->error;
}


?>