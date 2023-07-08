<?php include '../common/db_conn.php'; ?>
<?php
session_start();
 $cid=$_REQUEST["cid"];
 $lid=$_POST["lid"];
$name=$_REQUEST["name"];
$locker_type=$_POST["locker_type"];
$locker_no=$_POST["locker_no"];
$recovery_account=$_POST["recovery_account"];
$locker_rental=$_POST["locker_rental"];





$sql="INSERT INTO locker_customer(cid,lid,name,locker_type,locker_no,recovery_account,locker_rental) VALUES('$cid','$lid','$name','$locker_type','$locker_no','$recovery_account','$locker_rental')";
$query=mysqli_query($conn,$sql);
$id = mysqli_insert_id($conn);
// $id = $mysqli -> insert_id;
 // die(var_dump($id));
if($query==1){
$sql1="INSERT INTO locker_trans(cid,locker_id,type,tr_date,dr,cr) VALUES('$cid','$id',1,NOW(),'$locker_rental',0)";
 // die(var_dump($sql1));
$result=mysqli_query($conn,$sql1);

if($result==1)
{
	$sql2="UPDATE locker SET status=1 WHERE lid='$lid'";
	 // die(var_dump($sql2));
	if($conn->query($sql2)==TRUE)

	{
		echo "<script>alert('New Locker Assigned');window.location.href='../acc.php'</script>";
	}
	

// if($conn->query($sql,$sql1)==TRUE){
	
	// if($conn->query($sql1)==TRUE){
	// echo "<script>alert('New Locker Assigned');window.location.href='../acc.php'</script>";
	}
}else{
	echo"Error: " .$sql . "<br>" . $conn->error;
}


?>