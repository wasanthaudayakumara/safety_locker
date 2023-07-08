<?php include'common/login_checker.php';?>
<?php $page_title="safety_locker|User Account"; ?>
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
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Customer
          </a>
          <ul class="dropdown-menu nav-bg" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="add_new_customer2.php">Add New Customer</a></li>
            <li><a class="dropdown-item" href="edit1.php">Edit Customer</a></li>
            <li><a class="dropdown-item" href="delete.php">Delete Customer</a></li>
            <li><a class="dropdown-item" href="search_customer.php">Search Customer</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Locker
          </a>
          <ul class="dropdown-menu nav-bg" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="add_locker2.php">Locker Details Add</a></li>
            
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Recovery
          </a>
          <ul class="dropdown-menu nav-bg" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="recovery2.php">Recovery</a></li>
            
          </ul>
        </li>
         <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Key Management
          </a>
          <ul class="dropdown-menu nav-bg" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="key.php">Key Transfer</a>
            </li><li><a class="dropdown-item" href="key_approve.php">Key Approve</a></li>
            
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Report
          </a>
          <ul class="dropdown-menu nav-bg" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="customer_list.php">Customer List</a></li>
            <li><a class="dropdown-item" href="available_locker.php">Available Lockers</a></li>
            <li><a class="dropdown-item" href="current_key_holder.php">Key Holders List</a></li>
            </ul>
        </li>
        
      </ul>

      <h1 class="h4">Welcome! <?php echo $user_name;?></h1> &nbsp&nbsp
       <div class="text-end">
  <a class="btn btn-outline-dark btn-sm" href="common/logout.php">Sign Out</a> 
  </div>
    </div>
  </div>
</nav>
<div class="container pb-1 pt-1 text-center  my-2 ">
<h1 style="font-weight: 700">People's Bank </h1><br>
  <h2 style="font-weight: 700">Safety Deposit Locker System</h2>

   <img src="images/main_locker.jpg">
  
</div>


<?php include'common/footer.php';?>