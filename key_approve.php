<?php include'common/login_checker.php';?>
<?php include'common/db_conn.php' ?>
<!DOCTYPE html>
<html>
<head>
	<title>safety_locker|Approve</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <?php include'common/style.php' ?>
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
      <img src="images/logo.png">
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
	
	<h1 class="h4">Key Transfer Details!</h1>

	<div class="btn-group" role="group" aria-label="Basic example">
	  <a href="index.php" class="btn btn-dark">Pending</a>
	  
	</div>

	<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Key Number</th>
      <th scope="col">Key Type</th>
      
    </tr>
  </thead>
  <tbody>
  	
    <?php
      $uid=$_SESSION["uid"];
      $sql="SELECT * FROM users WHERE uid='$uid'";
      $result=$conn->query($sql);
      while($row=$result->fetch_assoc())
      {
        $Service_No=$row["Service_No"];
      }
      ?>
    <?php
    $i=1;
    $sql="SELECT * FROM key_trans WHERE status=0 AND Service_No=$Service_No";
    $result=$conn->query($sql);
    while($row=$result->fetch_assoc())
   
    {
    ?>
    <tr>
      <th scope="row"><?php echo $i ?></th>
      <td><p href="../key.php?cid=<?php echo $row["kid"]; ?>"><?php echo $row["key_no"]; ?></p>
      </td>
      <td><p href="../key.php?cid=<?php echo $row["kid"]; ?>"><?php echo $row["key_type"]; ?></p>
      </td>
      
          <input type="hidden" name="kid" value="<?php echo $kid;?>">
        <a href="?type=status&kid=<?php echo $row["kid"]; ?>" class="btn btn-sm btn-info px-5">Approve</a> 
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
  $kid=$_REQUEST["kid"];
  
  if($_REQUEST["type"]=="status")
  {
    $sql="UPDATE key_trans SET status=1 WHERE kid='$kid'";
   
    if($conn->query($sql)==TRUE)
    {
      echo"<script>alert('Approved!'); window.location.href='../acc.php';</script>";
    }else{
      echo"Error: " .$sql . "<br>" . $conn->error;
    }
  }
}

?>
