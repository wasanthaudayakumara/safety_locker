<?php include '../common/db_conn.php'; ?>
<?php
session_start();
$cid=$_REQUEST["cid"];
$uid=$_SESSION["uid"];
$nic=$_REQUEST["nic"];
$name=$_REQUEST["name"];
$address=$_REQUEST["address"];

$mobile=$_REQUEST["mobile"];
$email=$_REQUEST["email"];




$sql="UPDATE new_customer SET name='$name',address='$address',mobile='$mobile',email='$email' WHERE nic='$nic'";
// die(var_dump($sql));
if($conn->query($sql)==TRUE){
    echo "<script>alert('Customer Updated');window.location.href='../acc.php'</script>";
    
}else{
    echo"Error: " .$sql . "<br>" . $conn->error;
}


?>