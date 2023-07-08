<?php include '../common/db_conn.php'; ?>
<?php
session_start();
$cgid=$_REQUEST["cgid"];
$locker_type=$_POST["locker_type"];
$amount=$_REQUEST["amount"];


$sql="UPDATE charges SET locker_type='$locker_type',amount='$amount'";

if($conn->query($sql)==TRUE){
    echo "<script>alert('Charges Updated');window.location.href='../admin/index.php'</script>";
    
}else{
    echo"Error: " .$sql . "<br>" . $conn->error;
}


?>