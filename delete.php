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

<div class="card-mt-5">
  <div class="card-header text-center">
  <h1 class="h4 text-center">Edit Customer</h1>
  
    </div>
      <div class="card-body">
      <form action="" method="GET">
        <div class="row">
          <div class="col-md-6">
            <input type="text" name="nic" value="<?php if(isset($_GET['nic'])){echo $_GET['nic'];}?>" class="form-control">
          </div>
          <div class="col-md-4">
            <button class="btn btn-primary" type="submit">Search</button>
          </div>
        </div>
      </form>
      <form action="sql/delete.php" method="POST" enctype="multipart/form-data">
    <div class="row text-start">
    <div class="form-floating mb-3">
      <?php
      if(isset($_GET['nic']))
      {
        $nic = $_GET['nic'];
        $query="SELECT * FROM new_customer WHERE nic='$nic'";
        $query_run = mysqli_query($conn,$query);

        if(mysqli_num_rows($query_run) >0)
        {
          foreach ($query_run as $row)
           {
            ?>
              <input type="text" class="form-control"  placeholder="a" name="nic" required="" value="<?= $row['nic'];?>">
    <label for="floatingInput">Enter NIC</label>
</div>
<div class="form-floating mb-3">
    <input type="text" class="form-control"  placeholder="a" name="name" required="" value="<?= $row["name"];?>">
    <label for="floatingInput">Enter Customer Name</label>
</div>
<div class="form-floating mb-3">
    <input type="text" class="form-control"  placeholder="a" name="address" required="" value="<?=$row["address"];?>">
    <label for="floatingInput">Enter Address</label>
</div>
<!-- <div class="form-floating mb-3">
    <input type="text" class="form-control"  placeholder="a" name="account_number" required="" value="<?= $row["account_number"];?>">
    <label for="floatingInput">Enter Acoount number</label>
</div> -->
<div class="form-floating mb-3">
    <input type="text" class="form-control"  placeholder="a" name="mobile" required="" value="<?= $row["mobile"];?>">
    <label for="floatingInput">Enter Mobile</label>
</div>

<div class="form-floating mb-3">
    <input type="text" class="form-control"  placeholder="a" name="email" required="" value="<?= $row["email"];?>">
    <label for="floatingInput">Enter Email</label>
</div>
<!-- <div class="form-floating mb-3">
    <input type="text" class="form-control"  placeholder="a" name="locker_type" required="" value="<?= $row["locker_type"];?>">
    <label for="floatingInput">Enter Locker Type</label>
</div>
<div class="form-floating mb-3">
    <input type="text" class="form-control"  placeholder="a" name="locker_no" required="" value="<?= $row["locker_no"];?>">
    <label for="floatingInput">Enter Locker number</label>
</div>
<div class="form-floating mb-3">
    <input type="text" class="form-control"  placeholder="a" name="amount" required="" value="<?= $row["amount"];?>">
    <label for="floatingInput">Enter Charges</label>
</div>
<div class="form-floating mb-3">
    <input type="date" class="form-control"  placeholder="a" name="date" required="" value="<?= $row["date"];?>">
    
</div> -->

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