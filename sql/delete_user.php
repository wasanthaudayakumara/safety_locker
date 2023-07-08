<?php include '../common/db_conn.php'; ?>
<?php 

$uid=$_REQUEST["uid"];
$sql="DELETE FROM users WHERE uid='$uid'";
if ($conn->query($sql)==TRUE)
{
	echo"<script>alert('Record Deleted');window.location.href='../admin/index.php';</script>";
}
else
{
	echo "Error:".$sql."<br>".$conn->error;
}


?>