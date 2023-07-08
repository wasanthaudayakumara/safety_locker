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
	<h1 class="h4 text-center">Locker Transactions</h1>
  
    </div>
      <div class="card-body">
      <form action="" method="GET">
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>From date</label>
              <input type="date" name="from_date" value="<?php if(isset($_GET['from_date'])){echo $_GET['from_date'];} ?>" class="form-control">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>To date</label>
              <input type="date" name="to_date" value="<?php if(isset($_GET['to_date'])){echo $_GET['to_date'];} ?>" class="form-control">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <!-- <label>Filter</label> -->
              <button type="submit" class="btn btn-primary">Search</button>
            </div>
          </div>
        </div>
      </form>
      <div class="card-mt-4">
      <div class="card-body">
        <table class="table table-boarderd">
         <thead>
           <tr>
            <th>Date</th>
             <th>Locker ID</th>
             <th>Rental</th>
             <th>Payment</th>
           </tr>
         </thead>
         
        
         <tbody>
        <?php
          if(isset($_GET['from_date'])&& isset($_GET['to_date']))
        {
          $from_date=$_GET['from_date'];
          $to_date=$_GET['to_date'];
          $query="SELECT * FROM locker_trans WHERE tr_date BETWEEN '$from_date' AND '$to_date'";
          $query_run=mysqli_query($conn,$query);
          if(mysqli_num_rows($query_run) > 0)
             
          {
              foreach ($query_run as $row) 
              {
                ?>
                <tr>
                  <td><?=$row['tr_date']; ?></td>
                 <td><?=$row['locker_id']; ?></td>
                 <td><?=$row['dr']; ?></td>
                 <td><?=$row['cr']; ?></td>
                 
              </tr>
                <?php
              }
          }
          else
          {
            echo "No Records Found";
          }
        }
        ?>

           
         </tbody> 
       </table>
      </div>
      </div>
   
    </div>
  </div>
 </div>
 
</form>



      <?php include'common/footer.php' ?>