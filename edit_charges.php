<?php include'common/login_checker.php';?>
<?php $page_title="safety_locker|Edit Charges"; ?>
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
  <h1 class="h4 text-center">Edit Charges</h1>
  
    </div>
      <div class="card-body">
      <form action="" method="GET">
        <div class="row">
          <div class="col-md-6">
            <input type="text" name="cgid" value="<?php if(isset($_GET['cgid'])){echo $_GET['cgid'];}?>" class="form-control">
          </div>
          <div class="col-md-4">
            <button class="btn btn-primary" type="submit">Search</button>
          </div>
        </div>
      </form>
      <form action="sql/edit_charges.php" method="POST" enctype="multipart/form-data">
    <div class="row text-start">
    <div class="form-floating mb-3">
      <?php
      if(isset($_GET['cgid']))
      {
        $cgid = $_GET['cgid'];
        $query="SELECT * FROM charges WHERE cgid='$cgid'";
        $query_run = mysqli_query($conn,$query);

        if(mysqli_num_rows($query_run) >0)
        {
          foreach ($query_run as $row)
           {
            ?>
      <div class="form-floating mb-3">
    <input type="text" class="form-control"  placeholder="a" name="locker_type" required="" value="<?= $row["locker_type"];?>">
    <label for="floatingInput">Enter Locker Type</label>
</div>

      <input type="text" class="form-control"  placeholder="a" name="amount" required="" value="<?= $row['amount'];?>">
    <label for="floatingInput">Enter Amount</label>
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