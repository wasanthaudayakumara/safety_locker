<?php include '../common/db_conn.php'; ?>
<?php
session_start();
$uid=$_REQUEST["uid"];
$user_name=$_REQUEST["user_name"];
$Service_No=$_REQUEST["Service_No"];
$key_no=$_POST["key_no"];
$key_type=$_POST["key_type"];






$sql="INSERT INTO key_trans(user_name,Service_No,key_no,key_type) VALUES('$user_name','$Service_No','$key_no','$key_type')";
$query=mysqli_query($conn,$sql);
 // $Service_No = mysqli_insert_Service_No($conn);
//$id = $mysqli -> insert_id;
 // die(var_dump($id));
	if($query==1){
	$uid=$_SESSION["uid"];

	$sql1="UPDATE users SET key_no=0,key_type=0 WHERE uid='$uid'";
		
	 $result=mysqli_query($conn,$sql1);
		// die(var_dump($sql1));
if($result==1)
{
	
	$sql2="UPDATE users SET key_no= '$key_no',key_type= '$key_type' WHERE Service_No='$Service_No'";
	 // die(var_dump($sql2));
	if($conn->query($sql2)==TRUE)

	{
		echo "<script>alert('Key Transferd');window.location.href='../acc.php'</script>";
	}
	

// if($conn->query($sql,$sql1)==TRUE){
	
	// if($conn->query($sql1)==TRUE){
	// echo "<script>alert('New Locker Assigned');window.location.href='../acc.php'</script>";
	}
}else{
	echo"Error: " .$sql . "<br>" . $conn->error;
}


?>