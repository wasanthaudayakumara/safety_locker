<?php include '../common/db_conn.php'; ?>
<?php
session_start();
$nic=$_REQUEST["nic"];
$name=$_REQUEST["name"];
$address=$_REQUEST["address"];
$account_number=$_REQUEST["account_number"];
$mobile=$_REQUEST["mobile"];
$email=$_REQUEST["email"];
$locker_type=$_POST["locker_type"];
$locker_no=$_POST["locker_no"];
$amount=$_REQUEST["amount"];




$sql="INSERT INTO customer(nic,name,address,account_number,mobile,email,locker_type,locker_no,amount,date) VALUES('$nic','$name','$address','$account_number','$mobile','$email','$locker_type','$locker_no','$amount',NOW())";
if($conn->query($sql)==TRUE){
	echo "<script>alert('New Customer Added');window.location.href='../acc.php'</script>";
	
}else{
	echo"Error: " .$sql . "<br>" . $conn->error;
}


?>