<?php include '../common/db_conn.php'; ?>
<?php
session_start();

$locker_type=$_POST["locker_type"];
$locker_no=$_POST["locker_no"];




$sql="INSERT INTO locker(locker_no,locker_type) VALUES('$locker_no','$locker_type')";
if($conn->query($sql)==TRUE){
	echo "<script>alert('New Locker Added');window.location.href='../admin/index.php'</script>";
	
}else{
	echo"Error: " .$sql . "<br>" . $conn->error;
}


?>