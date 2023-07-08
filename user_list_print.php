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
    
</nav>

<table class="table">
  <h1 class="h4 text-center">User List</h1>
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Service Number</th>
      <th scope="col">User Type</th>
      
    </tr>
  </thead>
  <tbody>
    <?php
    $i=1;
    $sql="SELECT * FROM users";
    $result=$conn->query($sql);
    while($row=$result->fetch_assoc())
    {
  
    ?>
    <tr>
      <th scope="row"><?php echo $i ?></th>
      <td><p href="../add_new_user.php?uid=<?php echo $row["uid"]; ?>"><?php echo $row["user_name"]; ?></p>
      </td>
      <td><p href="../add_new_user.php?uid=<?php echo $row["uid"]; ?>"><?php echo $row["Service_No"]; ?></p>
      </td>
      <td><p href="../add_new_user.php?uid=<?php echo $row["uid"]; ?>"><?php echo $row["role"]; ?></p>
      </td>
      
    </tr>
    <?php $i++; }?>
  </tbody>
</table>
<div class="text-center">
 <button onclick="window.print();" class="btn btn-primary">Print</button>
  
</div>
  
</div>

