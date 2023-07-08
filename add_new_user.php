<?php include'common/login_checker.php';?>
<?php $page_title="safety_locker|Add User"; ?>
<?php include'common/head.php'; ?>  

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
  <a class="btn btn-outline-dark btn-sm" href="common/logout.php">Sign Out</a> 
  </div>
    </div>
</nav>
<div class="container pb-5 pt-1  bg-white my-5 ">
	
	<h1 class="h4 text-center">Add New User</h1>
  <form action="sql/new_user_sql.php" method="POST" enctype="multipart/form-data">
    
    
<div class="form-floating mb-3">
    <input type="text" class="form-control"  placeholder="a" name="user_name" required="">
    <label for="floatingInput">Enter Name</label>
</div>
<div class="form-floating mb-3">
    <input type="text" class="form-control"  placeholder="a" name="password" required="">
    <label for="floatingInput">Enter Password</label>
</div>
<div class="form-floating mb-3">
    <input type="text" class="form-control"  placeholder="a" name="Service_No" required="">
    <label for="floatingInput">Enter Service Number</label>
</div>
<div class="form-floating mb-3 form-group">
    <select class="form-control"  placeholder="a" name="role" required="">
      <option value="">--Select--</option>
      <option value="0">Banking Assisant</option>
      <option value="1">Officer</option>
      <option value="2">Admin</option>
    </select> 
    <label for="floatingInput">Select User Type</label>
</div>
<input type="submit" class="btn btn-lg btn-primary w-100">

  </form>

	
</div>




<?php include'common/footer.php' ?>