<?php include'common/login_checker.php';?>
<?php $page_title="safety_locker|Add_Locker"; ?>
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

<div class="card-mt-5">
  <div class="card-header text-center">
	<h1 class="h4 text-center">Locker Details Add</h1>
  
    </div>
      <div class="card-body">
      <form action="" method="GET">
        <div class="row">
          <div class="col-md-6">
            <input type="text" name="cid" value="<?php if(isset($_GET['cid'])){echo $_GET['cid'];}?>" class="form-control">
            <label for="floatingInput">Enter Cusomer ID</label>
          </div>
          <div class="col-md-4">
            <button class="btn btn-primary" type="submit" >Search</button>
            
          </div>
        </div>
      </form>
      <form action="sql/add_locker.php" method="POST" enctype="multipart/form-data">
    <div class="row text-start">
    <div class="form-floating mb-3">
      <?php
      if(isset($_GET['cid']))
      {
        $cid = $_GET['cid'];
        $query="SELECT * FROM new_customer WHERE cid='$cid' AND status=1";
        $query_run = mysqli_query($conn,$query);

        if(mysqli_num_rows($query_run) >0)
        {
          foreach ($query_run as $row)
           {
            ?>
            <input type="text" class="form-control"  placeholder="a" name="cid" required="" value="<?= $row['cid'];?>">
              <label for="floatingInput">Cusomer ID</label>
            </div>
              <div class="form-floating mb-3">
              <input type="text" class="form-control"  placeholder="a" name="name" required="" value="<?= $row['name'];?>">
    <label for="floatingInput">Enter Name</label>
</div>
<div class="form-floating mb-3 form-group">
 <?php
    $i=1;
    $query="SELECT * FROM locker WHERE status=0";
    $sql=mysqli_query($conn,$query);
    ?>
    <select class="form-control"  placeholder="a" name="lid" required="">

      <option value="">--Select--</option>
      <?php while ($row=mysqli_fetch_array($sql)) 
      {?>
       <option><?php echo $row['lid'];?></option>
      <?php} ?>
      <?php $i++; }?>
      
    </select> 
    <label for="floatingInput">Select Locker ID</label>
    
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
<div class="form-floating mb-3">
    <input type="text" class="form-control"  placeholder="a" name="recovery_account" required="">
    <label for="floatingInput">Enter Recovery Account Number </label>
</div>
<div class="form-floating mb-3">
    <input type="text" class="form-control"  placeholder="a" name="locker_rental" required="">
    <label for="floatingInput">Locker Rental </label>
</div>

            <?php
          }

        }
        else
        {
          echo "No Record Found";
        }
      }

      ?>
      
   
    </div>
  </div>
 </div>
 <input type="hidden" name="cid" value="<?php echo $cid;?>">
 <input type="submit" class="btn btn-lg btn-primary w-100">
</form>



      <?php include'common/footer.php' ?>