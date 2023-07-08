<?php include '../common/db_conn.php'; ?>
<?php 

$nic=$_REQUEST["nic"];
$sql="DELETE FROM new_customer WHERE nic='$nic'";
// die(var_dump($sql));
if ($conn->query($sql)==TRUE)
{
	echo"<script>alert('Record Deleted');window.location.href='../acc.php';</script>";
}
else
{
	echo "Error:".$sql."<br>".$conn->error;
}


?>