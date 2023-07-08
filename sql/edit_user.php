<?php include '../common/db_conn.php'; ?>
<?php
session_start();
$uid=$_REQUEST["uid"];
$user_name=$_REQUEST["user_name"];
$password=$_REQUEST["password"];
$Service_No=$_REQUEST["Service_No"];
$role=$_POST["role"];



$sql="UPDATE users SET user_name='$user_name',password='$password',Service_No='$Service_No',role='$role' WHERE uid='$uid'";

if($conn->query($sql)==TRUE){
    echo "<script>alert('User Updated');window.location.href='../admin/index.php'</script>";
    
}else{
    echo"Error: " .$sql . "<br>" . $conn->error;
}


?>