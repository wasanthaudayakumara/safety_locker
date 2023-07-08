<?php include'common/login_checker.php';?>
<?php $page_title="safety_locker|Recovery"; ?>
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
	<h1 class="h4 text-center">Recovery</h1>
  
    </div>
      <div class="card-body">
      <form action="" method="GET">
        <div class="row">
          <div class="col-md-6">
            <input type="text" name="locker_id" value="<?php if(isset($_GET['locker_id'])){echo $_GET['locker_id'];}?>" class="form-control">
            <label for="floatingInput">Enter Locker ID</label>
          </div>
          <div class="col-md-4">
            <button class="btn btn-primary " type="submit">Search</button>
          </div>
        </div>
      </form>
      <form action="sql/recover_sql.php" method="POST" enctype="multipart/form-data">
    <div class="row text-start">


    <div class="form-floating mb-3">
      <?php
      if(isset($_GET['locker_id']))
      {
        $locker_id = $_GET['locker_id'];
        $query="SELECT
                t.`cid`,
                c.`name`,
                
                t.`locker_id`,
                lc.`locker_rental`,
                (SUM(t.dr)-SUM(t.cr)) AS balance
                FROM
                `locker_trans` t
                JOIN `new_customer` c ON t.`cid`= c.`cid`
                JOIN `locker_customer` lc ON t.`locker_id`=lc.`locker_id`
                where t.`locker_id`='$locker_id'
                group by t.`cid`,t.`locker_id`
                order by t.`cid`";
        $query_run = mysqli_query($conn,$query);

        if(mysqli_num_rows($query_run) >0)
        {
          foreach ($query_run as $row)
           {
            ?>
            <input type="text" class="form-control"  placeholder="a" name="cid" required="" value="<?= $row['cid'];?>">
    <label for="floatingInput">Customer ID</label>
  </div>
  <div>
      <input type="text" class="form-control"  placeholder="a" name="name" required="" value="<?= $row['name'];?>">
    <label for="floatingInput">Name</label>
</div>

<div class="form-floating mb-3">
    <input type="text" class="form-control"  placeholder="a" name="rental_arrears" required=""value="<?= $row['locker_rental'];?>">
    <label for="floatingInput"><span style="color: red;">Rental Arrears </span> </label>
</div>
<div class="form-floating mb-3">
    <input type="text" class="form-control"  placeholder="a" name="total_arrears" required="" value="<?= $row['balance'];?>">
    <label for="floatingInput"><span style="color: red;">Total Arrears </span> </label>
</div>
<div class="form-floating mb-3 form-group">
    <select class="form-control"  placeholder="a" name="type" required="">

      <option value="">--Select--</option>
      <option value="">Auto</option>
      <option value="2">Manual</option>
       
    </select>
    <label for="floatingInput">Select Payment Type</label>
    
</div>
<div class="form-floating mb-3">
    <input type="text" class="form-control"  placeholder="a" name="cr" required="">
    <label for="floatingInput">Recovery Amount </label>
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
 <input type="hidden" name="locker_id" value="<?php echo $locker_id;?>">
 <input type="submit" class="btn btn-lg btn-primary w-100">
</form>



      <?php include'common/footer.php' ?>