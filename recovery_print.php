<?php include'common/login_checker.php';?>
<?php $page_title="safety_locker|Customer List"; ?>
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
    
      
    </div>
</nav>

<table class="table">
  <h1 class="h4 text-center">Recovery List</h1>
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">NIC</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Address</th>
      <th scope="col">Rcovery Account</th>
      <th scope="col">Locker Type</th>
      <th scope="col">Opened Date</th>
      <th scope="col">Amount</th>
      
    </tr>
  </thead>
  <tbody>
    <?php
    $i=1;
    $sql="SELECT * FROM customer WHERE status=1";
    $result=$conn->query($sql);
    while($row=$result->fetch_assoc())
    {
  
    ?>
    <tr>
      <th scope="row"><?php echo $i ?></th>
      <td><p href="../add_new_customer.php?cid=<?php echo $row["cid"]; ?>"><?php echo $row["nic"]; ?></p>
      </td>
      <td><p href="../add_new_customer.php?cid=<?php echo $row["cid"]; ?>"><?php echo $row["name"]; ?></p>
      </td>
      <td><p href="../add_new_customer.php?cid=<?php echo $row["cid"]; ?>"><?php echo $row["address"]; ?></p>
      </td>
      <td><p href="../add_new_customer.php?cid=<?php echo $row["cid"]; ?>"><?php echo $row["account_number"]; ?> </a>
      </td>
      <td><p href="../add_new_customer.php?cid=<?php echo $row["cid"]; ?>"><?php echo $row["locker_type"]; ?></p>
      </td>
      <td><p href="../add_new_customer.php?cid=<?php echo $row["cid"]; ?>"><?php echo $row["date"]; ?></p>
      </td>
      <td><p href="../add_new_customer.php?cid=<?php echo $row["cid"]; ?>"><?php echo $row["amount"]; ?></p>
      </td>
    </tr>
    
    <?php $i++; }?>

  </tbody>
</table>
<div class="text-center">
  <button onclick="window.print();" class="btn btn-primary">Print</button>
  
</div>
  
</div>

