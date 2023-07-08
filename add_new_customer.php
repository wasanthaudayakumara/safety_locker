<?php include'common/login_checker.php';?>
<?php $page_title="safety_locker|Add Customer"; ?>
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
	
	<h1 class="h4 text-center">Add New Customer</h1>
  <form action="sql/new_customer_sql.php" method="POST" enctype="multipart/form-data">
    
    
<div class="form-floating mb-3">
    <input type="text" class="form-control"  placeholder="a" name="nic" required="">
    <label for="floatingInput">Enter NIC</label>
</div>
<div class="form-floating mb-3">
    <input type="text" class="form-control"  placeholder="a" name="name" required="">
    <label for="floatingInput">Enter Name</label>
</div>
<div class="form-floating mb-3">
    <input type="text" class="form-control"  placeholder="a" name="address" required="">
    <label for="floatingInput">Enter Address</label>
</div>
<div class="form-floating mb-3">
    <input type="text" class="form-control"  placeholder="a" name="account_number" required="">
    <label for="floatingInput">Enter Account Number </label>
</div>
<div class="form-floating mb-3">
    <input type="text" class="form-control"  placeholder="a" name="mobile" required="">
    <label for="floatingInput">Enter Mobile</label>
</div>
<div class="form-floating mb-3">
    <input type="email" class="form-control"  placeholder="a" name="email" required="">
    <label for="floatingInput">Enter Email</label>
</div>
<div class="form-floating mb-3 form-group">
  <?php
    $i=1;
    $query="SELECT * FROM locker WHERE status=0";
    $sql=mysqli_query($conn,$query);
    ?>
    <select class="form-control"  placeholder="a" name="locker_no" required="">
      <option value="">--Select--</option>
      <?php while ($row=mysqli_fetch_array($sql)) 
      {?>
       <option><?php echo $row['locker_no'];?></option>
      <?php} ?>
      <?php $i++; }?>
    </select>
    <label for="floatingInput">Select Locker Number</label>
</div>
<div class="form-floating mb-3 form-group">
 <?php
    $i=1;
    $query="SELECT * FROM locker WHERE status=0";
    $sql=mysqli_query($conn,$query);
    ?>
    <select class="form-control"  placeholder="a" name="locker_type" required="">

      <option value="">--Select--</option>
      <?php while ($row=mysqli_fetch_array($sql)) 
      {?>
       <option><?php echo $row['locker_type'];?></option>
      <?php} ?>
      <?php $i++; }?>
      
    </select> 
    <label for="floatingInput">Select Locker Type</label>
    
</div>
<div class="form-floating mb-3 form-group">
 <?php
    $i=1;
    $query="SELECT * FROM charges";
    $sql=mysqli_query($conn,$query);
    ?>
    <select class="form-control"  placeholder="a" name="amount" required="">

      <option value="">--Select--</option>
      <?php while ($row=mysqli_fetch_array($sql)) 
      {?>
       <option><?php echo $row['amount'];?></option>
      <?php} ?>
      <?php $i++; }?>
      
    </select> 
    <label for="floatingInput">Select Charges</label>
    
</div>
 
    

<input type="submit" class="btn btn-lg btn-primary w-100">

  </form>

	
</div>




<?php include'common/footer.php' ?>