<?php include'common/login_checker.php';?>
<?php $page_title="safety_locker|Key Holders"; ?>
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
  <h1 class="h4 text-center">Key Holders List</h1>
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Service Number</th>
      <th scope="col">Key Number</th>
      <th scope="col">Key Type</th>
      
      
    </tr>
  </thead>
  <tbody>
    <?php
    $i=1;
    $sql="SELECT * FROM `users` WHERE key_no IS NOT NULL AND key_no >0";
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
      <td><p href="../add_new_user.php?uid=<?php echo $row["uid"]; ?>"><?php echo $row["key_no"]; ?></p>
      </td>
      <td><p href="../add_new_user.php?uid=<?php echo $row["uid"]; ?>"><?php echo $row["key_type"]; ?></p>
      </td>
      
    </tr>
    <?php $i++; }?>
  </tbody>
</table>
<div class="text-center">
 <a href="key_holder_list.php" class="btn btn-primary">Print</a>
  
</div>
  
</div>

