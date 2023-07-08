<?php include'common/login_checker.php';?>
<?php $page_title="safety_locker|Charges List"; ?>
<?php include'common/head.php'; ?>  



<nav class="navbar navbar-expand-lg navbar-light bg-light nav-bg">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
      <img src="images/logo.png">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
      
</nav>

<table class="table">
  <h1 class="h4 text-center">Charges List</h1>
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Locker Type</th>
      <th scope="col">Amount</th>
      
      
    </tr>
  </thead>
  <tbody>
    <?php
    $i=1;
    $sql="SELECT * FROM charges";
    $result=$conn->query($sql);
    while($row=$result->fetch_assoc())
    {
  
    ?>
    <tr>
      <th scope="row"><?php echo $i ?></th>
      <td><p href="../charges.php?cgid=<?php echo $row["cgid"]; ?>"><?php echo $row["locker_type"]; ?></p>
      </td>
      <td><p href="../charges.php?cgid=<?php echo $row["cgid"]; ?>"><?php echo $row["amount"]; ?></p>
      </td>
      
      
    </tr>
    <?php $i++; }?>
  </tbody>
</table>
<div class="text-center">
 <button onclick="window.print();" class="btn btn-primary">Print</button>
  
</div>
  
</div>

