<?php include'common/login_checker.php';?>
<?php $page_title="safety_locker|Locker List"; ?>
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
      <td><p href="../add_locker.php?lid=<?php echo $row["lid"]; ?>"><?php echo $row["locker_type"]; ?></p>
      </td>
      
    </tr>
    <?php $i++; }?>
  </tbody>
</table>
<div class="text-center">
 <a href="available_locker_print.php" class="btn btn-primary">Print</a>
  
</div>
  
</div>

