<?php include'common/login_checker.php';?>
<?php $page_title="safety_locker|Customer List"; ?>
<?php include'common/head.php'; ?>  

<nav class="navbar navbar-expand-lg navbar-light bg-light nav-bg">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
      <img src="images/logo.png">
    </a>
    
</nav>

<table class="table">
  <h1 class="h4 text-center">Customer List</h1>
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">NIC</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Address</th>
      <th scope="col">Mobile</th>
      <th scope="col">Email</th>
      <th scope="col">Date</th>
      
    </tr>
  </thead>
  <tbody>
    <?php
    $i=1;
    $sql="SELECT * FROM new_customer WHERE status=1";
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
      
      <td><p href="../add_new_customer.php?cid=<?php echo $row["cid"]; ?>"><?php echo $row["mobile"]; ?></p>
      </td>
      <td><p href="../add_new_customer.php?cid=<?php echo $row["cid"]; ?>"><?php echo $row["email"]; ?></p>
      </td>
      
      <td><p href="../add_new_customer.php?cid=<?php echo $row["cid"]; ?>"><?php echo $row["date"]; ?></p>
      </td>
    </tr>
    <?php $i++; }?>
  </tbody>
</table>
<div class="text-center">
  <button onclick="window.print();" class="btn btn-primary">Print</button>
</div>
  
</div>

