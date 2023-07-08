<?php include'../common/login_checker.php';?>
<?php include'../common/db_conn.php' ?>
<!DOCTYPE html>
<html>
<head>
	<title>safety_locker|Approve</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <?php include'../common/style.php' ?>
</head>

<?php
$uid=$_SESSION["uid"];
$sql="SELECT * FROM users WHERE uid='$uid'";
$result=$conn->query($sql);
while($row=$result->fetch_assoc())
{
  $user_name=$row["user_name"];
}
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light nav-bg">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
      <img src="../images/logo.png">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
      <h1 class="h4">Welcome! <?php echo $user_name;?></h1> &nbsp&nbsp
       <div class="text-end">
  <a class="btn btn-outline-dark btn-sm" href="../common/logout.php">Sign Out</a> 
  </div>
    </div>
</nav>
<body>



	<div class="container pb-5 pt-1 text-center bg-white my-5 ">
	
	<h1 class="h4">Pending Customer Details!</h1>

	<div class="btn-group" role="group" aria-label="Basic example">
	  <a href="index.php" class="btn btn-dark">Pending</a>
	  
	</div>

	<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">NIC</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Address</th>
      <!-- <th scope="col">Account Number</th> -->
      <th scope="col">Mobile</th>
      <th scope="col">Email</th>
      <!-- <th scope="col">Locker Number</th>
      <th scope="col">Locker Type</th> -->
    </tr>
  </thead>
  <tbody>
  	<?php
    $i=1;
    $sql="SELECT * FROM new_customer WHERE status=0";
    $result=$conn->query($sql);
    while($row=$result->fetch_assoc())
   
    {
    ?>
    <tr>
      <th scope="row"><?php echo $i ?></th>
      <td><p href="../add_new_customer.php?cid=<?php echo $row["cid"]; ?>"><?php echo $row["nic"]; ?></p>
      </td>
      <td><p href="../add_new_customer.php?cid=<?php echo $row["cid"]; ?>"><?php echo $row["name"]; ?></p>
      </td>
      <td><p href="../add_new_customer.php?cid=<?php echo $row["cid"]; ?>"><?php echo $row["address"]; ?></p>
      </td>
      <!-- <td><p href="../add_new_customer.php?cid=<?php echo $row["cid"]; ?>"><?php echo $row["account_number"]; ?> </a> -->
      </td>
      <td><p href="../add_new_customer.php?cid=<?php echo $row["cid"]; ?>"><?php echo $row["mobile"]; ?></p>
      </td>
      <td><p href="../add_new_customer.php?cid=<?php echo $row["cid"]; ?>"><?php echo $row["email"]; ?></p>
      </td>
      <!-- <td><p href="../add_new_customer.php?cid=<?php echo $row["cid"]; ?>"><?php echo $row["locker_no"]; ?></p>
        <td><p href="../add_new_customer.php?cid=<?php echo $row["cid"]; ?>"><?php echo $row["locker_type"]; ?></p> -->
          <input type="hidden" name="lid" value="<?php echo $lid;?>">
        <a href="?type=status&cid=<?php echo $row["cid"]; ?>" class="btn btn-sm btn-info px-5">Approve</a> 
        <a href="../sql/delete.php" class="btn btn-sm btn-danger" onclick="return confirm('Are You Sure?');">X</a>
      </td>
      	
      </td>
    </tr>
    <?php $i++; }?>
  </tbody>
</table>
	
</div>



</body>
</html>

<?php
if(isset($_REQUEST["type"]))
{
  $cid=$_REQUEST["cid"];
  
  if($_REQUEST["type"]=="status")
  {
    $sql="UPDATE new_customer SET status=1 WHERE cid='$cid'";
   
    if($conn->query($sql)==TRUE)
    {
      echo"<script>alert('Approved!'); window.location.href='index.php';</script>";
    }else{
      echo"Error: " .$sql . "<br>" . $conn->error;
    }
  }
}

?>
