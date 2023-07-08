<?php include '../common/db_conn.php'; ?>
<?php

$user_name=$_REQUEST["user_name"];
$password=$_REQUEST["password"];

$login_check=0;
$sql="SELECT * FROM users WHERE user_name='$user_name'AND password='$password'";
$result=$conn->query($sql);
while($row=$result->fetch_assoc())
{
	$login_check=1;
	$uid=$row["uid"];
	$role=$row["role"];
}

if($login_check==1 AND $role==0)
{
	session_start();
	$_SESSION["login_check"]=1;
	$_SESSION["uid"]=$uid;
	header('Location: ../acc.php');
}
if($login_check==1 AND $role==1)
{
	session_start();
	$_SESSION["login_check"]=1;
	$_SESSION["uid"]=$uid;
	header('Location: ../officer/');
}
if ($login_check==1 AND $role==2) 
{
	session_start();
	$_SESSION["login_check"]=1;
	$_SESSION["uid"]=$uid;
	header('Location: ../admin/');
}
else
{
	echo "<script>alert('Incorect Email or Password');window.location.href='../login.php'</script>";
	
}

?>