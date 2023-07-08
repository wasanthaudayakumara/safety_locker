<?php include'common/login_checker.php';?>
<?php $page_title="safety_locker|Edit"; ?>
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
    
      <h1 class="h4">Welcome!<?php echo $user_name;?></h1> &nbsp&nbsp
       <div class="text-end">
  <a class="btn btn-outline-dark btn-sm" href="common/logout.php">Sign Out</a> 
  </div>
    </div>
</nav>

	<h1 class="h4 text-center">Edit Customer</h1>
  
    </div>
      <hr>
      <?php
      // var_dump($_REQUEST["hcid"]); exit();
    $cid=$_REQUEST["cid"];
    $sql="SELECT * FROM customer WHERE cid='$cid'";
    $result=$conn->query($sql);
    while($row=$result->fetch_assoc())

    ?>
<form action="sql/edit_sql.php" method="POST" enctype="multipart/form-data">
    <div class="row text-start">
    <div class="form-floating mb-3">
      
    <input type="text" class="form-control"  placeholder="a" name="nic" required="" value="<?php echo $row["nic"];?>">
    <label for="floatingInput">Enter NIC</label>
</div>
<div class="form-floating mb-3">
    <input type="text" class="form-control"  placeholder="a" name="name" required="" value="<?php echo $row["name"];?>">
    <label for="floatingInput">Enter Customer Name</label>
</div>
<div class="form-floating mb-3">
    <input type="text" class="form-control"  placeholder="a" name="address" required="" value="<?php echo $row["address"];?>">
    <label for="floatingInput">Enter Address</label>
</div>
<div class="form-floating mb-3">
    <input type="text" class="form-control"  placeholder="a" name="account_number" required="" value="<?php echo $row["account_number"];?>">
    <label for="floatingInput">Enter Acoount number</label>
</div>
<div class="form-floating mb-3">
    <input type="text" class="form-control"  placeholder="a" name="mobile" required="" value="<?php echo $row["mobile"];?>">
    <label for="floatingInput">Enter Mobile</label>
</div>

<div class="form-floating mb-3">
    <input type="text" class="form-control"  placeholder="a" name="email" required="" value="<?php echo $row["email"];?>">
    <label for="floatingInput">Enter Email</label>
</div>
<div class="form-floating mb-3">
    <input type="text" class="form-control"  placeholder="a" name="locker_type" required="" value="<?php echo $row["locker_type"];?>">
    <label for="floatingInput">Enter Locker Type</label>
</div>
<div class="form-floating mb-3">
    <input type="text" class="form-control"  placeholder="a" name="locker" required="" value="<?php echo $row["locker"];?>">
    <label for="floatingInput">Enter Locker number</label>
</div>
<div class="form-floating mb-3">
    <input type="date" class="form-control"  placeholder="a" name="date" required="" value="<?php echo $row["date"];?>">
    
</div> 


<input type="hidden" name="cid" value="<?php echo $cid;?>">
<input type="submit" class="btn btn-lg btn-primary w-100">
 
  </form>

	
</div>




<?php include'common/footer.php' ?>