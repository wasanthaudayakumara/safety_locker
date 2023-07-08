<?php include'../common/login_checker.php';?>
<?php include'../common/db_conn.php' ?> 
 

<!DOCTYPE html>
<html>
<head>
  <title>safety_locker|Admin</title>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <?php include'../common/style.php' ?>
</head>

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
      <img src="../images/logo.png">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            User
          </a>
          <ul class="dropdown-menu nav-bg" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="../add_new_user.php">Add New User</a></li>
            <li><a class="dropdown-item" href="../edit_user.php">Edit User</a></li>
            <li><a class="dropdown-item" href="../delete_user.php">Delete User</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Locker
          </a>
          <ul class="dropdown-menu nav-bg" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="../add_locker.php">Add Locker</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Charges
          </a>
          <ul class="dropdown-menu nav-bg" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="../charges.php">Add Charges</a></li>
            <li><a class="dropdown-item" href="../edit_charges.php">Edit Charges</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Report
          </a>
          <ul class="dropdown-menu nav-bg" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="../user_list.php">User List</a></li>
            <li><a class="dropdown-item" href="../locker_list.php">Locker List</a></li>
            <li><a class="dropdown-item" href="../charges_list.php">Charges List</a></li>
          </ul>
          
            
         
        </li>
        
      </ul>

      <h1 class="h4">Welcome! <?php echo $user_name;?></h1> &nbsp&nbsp
       <div class="text-end">
  <a class="btn btn-outline-dark btn-sm" href="../common/logout.php">Sign Out</a> 
  </div>
    </div>
  </div>
</nav>
<div class="container pb-1 pt-1 text-center  my-2 ">
<h1 style="font-weight: 700">People's Bank </h1><br>
  <h2 style="font-weight: 700">Safety Deposit Locker System</h2>

   <img src="../images/main_locker.jpg">
  
</div>


<?php include'../common/footer.php';?>