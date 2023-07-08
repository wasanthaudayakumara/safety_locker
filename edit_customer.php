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
    
      <h1 class="h4">Welcome! <?php echo $user_name;?></h1> &nbsp&nbsp
       <div class="text-end">
  <a class="btn btn-outline-dark btn-sm" href="sql/logout.php">Sign Out</a> 
  </div>
    </div>
</nav>
<form action="edit.php">
  <input type="hidden" name="cid" id="cid" value="">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">ID</th>
      <th scope="col">NIC</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Address</th>
      <th scope="col">Account Number</th>
      <th scope="col">Mobile</th>
      <th scope="col">Email</th>
      <th scope="col">Locker Type</th>
      <th scope="col">Locker Number</th>
      
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
      <td><p href="add_new_customer.php?cid=<?php echo $row["cid"]; ?>"><?php echo $row["cid"]; ?></p>
      </td>
      <td><p href="add_new_customer.php?cid=<?php echo $row["cid"]; ?>"><?php echo $row["nic"]; ?></p>
      </td>
      <td><p href="add_new_customer.php?cid=<?php echo $row["cid"]; ?>"><?php echo $row["name"]; ?></p>
      </td>
      <td><p href="add_new_customer.php?cid=<?php echo $row["cid"]; ?>"><?php echo $row["address"]; ?></p>
      </td>
      <td><p href="add_new_customer.php?cid=<?php echo $row["cid"]; ?>"><?php echo $row["account_number"]; ?> </a>
      </td>
      <td><p href="add_new_customer.php?cid=<?php echo $row["cid"]; ?>"><?php echo $row["mobile"]; ?></p>
      </td>
      <td><p href="add_new_customer.php?cid=<?php echo $row["cid"]; ?>"><?php echo $row["email"]; ?></p>
      </td>
      <td><p href="add_new_customer.php?cid=<?php echo $row["cid"]; ?>"><?php echo $row["locker_type"]; ?></p>
      <td><p href="add_new_customer.php?cid=<?php echo $row["cid"]; ?>"><?php echo $row["locker"]; ?></p>
        <input type ="submit" name = "Edit" id ="<?php echo $row["cid"]; ?>"class="btn btn-primary edit">Edit</a>&nbsp&nbsp<a href="sql/delete.php" class="btn btn-danger" onclick="return confirm('Are You Sure?');">Delete</a>
      </td>

    </tr>
    <?php $i++; }?>
  </tbody>
</table></form>
<script type="text/javascript">
  $(".edit").click(function(){
     var id = $(this).attr('id');
     $("#cid").val(id);  
  });
</script>
  
</div>

