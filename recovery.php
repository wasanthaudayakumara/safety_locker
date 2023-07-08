<?php include'common/login_checker.php';?>
<?php $page_title="safety_locker|Recovery List"; ?>
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
  <a class="btn btn-outline-dark btn-sm" href="sql/logout.php">Sign Out</a> 
  </div>
    </div>
</nav>

<table class="table">
  <h1 class="h4 text-center">Recovery List</h1>
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Customer ID</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Locker ID</th>
      <th scope="col">Rental</th>
      <th scope="col">Paid Amount</th>
      <th scope="col">Total Arrears</th>
      <th scope="col">Date</th>
      
      
    </tr>
  </thead>
  <tbody>
    <!-- <?php
    $i=1;
    if(isset($_GET['cid']))
    {
      $cid = $_GET['cid'];
    }
    
    $sql="SELECT * FROM locker_trans WHERE cid='$cid'";
    $result=$conn->query($sql);
    while($row=$result->fetch_assoc())
    {
  
    ?>
    <tr>
      <th scope="row"><?php echo $i ?></th>
      
      <td><p href="../add_locker2.php?cid=<?php echo $row["cid"]; ?>"><?php echo $row["name"]; ?></p>
      </td>
      <td><p href="../add_locker2.php?cid=<?php echo $row["cid"]; ?>"><?php echo $row["locker_id"]; ?></p>
      </td>
      <td><p href="../add_locker2.php?cid=<?php echo $row["cid"]; ?>"><?php echo $row["dr"]; ?></p>
      </td>
      <td><p href="../add_locker2.php?cid=<?php echo $row["cid"]; ?>"><?php echo $row["cr"]; ?> </a>
      </td>
      <td><p href="../add_locker2.php?cid=<?php echo $row["cid"]; ?>"><?php echo $row["tr_date"]; ?></p>
      </td>
    </tr>
    
    <?php $i++; }?> -->
    <?php
          if(isset($_GET['locker_id']))
        {
          $locker_id=$_GET['locker_id'];
          $query="SELECT
                t.`cid`,
                c.`name`,
                t.`cr`,
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
                <tr>
                  <td><?php echo $row['cid']; ?></td>
                  <td><?php echo $row['name'];?></td>
                 <td><?php echo $row['locker_id'];?></td>
                 <td><?php echo $row['locker_rental'];?></td>
                 <td><?php echo $row['cr'];?></td>
                 <td><?php echo $row['balance'];?></td>
                 <td><?php echo $row['tr_date'];?></td>
                 <!-- <td><p href="../add_locker2.php?locker_id=<?php echo $row["locker_id"]; ?>"><?php echo $row["cid"]; ?></p>
                </td>
                  <td><p href="../add_locker2.php?cid=<?php echo $row["cid"]; ?>"><?php echo $row["name"]; ?></p>
                </td>
                <td><p href="../add_locker2.php?cid=<?php echo $row["cid"]; ?>"><?php echo $row["locker_id"]; ?></p>
                </td>
                <td><p href="../add_locker2.php?cid=<?php echo $row["cid"]; ?>"><?php echo $row["locker_rental"]; ?></p>
                </td>
                <td><p href="../add_locker2.php?cid=<?php echo $row["cid"]; ?>"><?php echo $row["balance"]; ?> </a>
                </td>
                </td>
                <td><p href="../add_locker2.php?cid=<?php echo $row["cid"]; ?>"><?php echo $row["tr_date"]; ?></p>
                </td> -->
              
                 
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
<div class="text-center">
  <a href="recovery_print.php" class="btn btn-primary">Print</a>
  
</div>
  
</div>

