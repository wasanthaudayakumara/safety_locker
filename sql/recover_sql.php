<?php include '../common/db_conn.php'; ?>
<?php
session_start();
 $cid=$_REQUEST["cid"];
 $locker_id=$_REQUEST["locker_id"];
$type=$_POST["type"];
$cr=$_POST["cr"];






$sql="INSERT INTO locker_trans(cid,locker_id,type,tr_date,dr,cr) VALUES('$cid','$locker_id','$type',NOW(),0,'$cr')";
 // die(var_dump($sql));
$query=mysqli_query($conn,$sql);

if($query==1)


	{
		echo "<script>alert('Rental Recovered');window.location.href='../acc.php'</script>";
	}
	else{
	echo"Error: " .$sql . "<br>" . $conn->error;
}


?>