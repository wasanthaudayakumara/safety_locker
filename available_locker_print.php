<?php include'common/login_checker.php';?>
<?php $page_title="safety_locker|User List"; ?>
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
    
  </div>
    </div>
</nav>

<table class="table">
  <h1 class="h4 text-center">Available Lockers</h1>
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Locker Number</th>
      <th scope="col">Locker Type</th>
      
      
    </tr>
  </thead>
  <tbody>
    <?php
    $i=1;
    $sql="SELECT * FROM locker WHERE status=0";
    $result=$conn->query($sql);
    while($row=$result->fetch_assoc())
    {
  
    ?>
    <tr>
      <th scope="row"><?php echo $i ?></th>
      <td><p href="../add_locker.php?lid=<?php echo $row["lid"]; ?>"><?php echo $row["locker_no"]; ?></p>
      </td>
      <td><p href="../add_locer.php?lid=<?php echo $row["lid"]; ?>"><?php echo $row["locker_type"]; ?></p>
      </td>
      
    </tr>
    <?php $i++; }?>
  </tbody>
</table>
<div class="text-center">
 <button onclick="window.print();" class="btn btn-primary">Print</button>
  
</div>
  
</div>

