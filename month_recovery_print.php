<?php include'common/login_checker.php';?>
<?php $page_title="safety_locker|Month Recovery List"; ?>
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
  <h1 class="h4 text-center">Month Recovery List</h1>
  <thead>
    <tr>
      <th scope="col">Customer ID</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Locker ID</th>
      <th scope="col">Month</th>
      <th scope="col">Total Arrears</th>
      <th scope="col">Total paid</th>   
      <th scope="col">Balance</th> 
      
    </tr>
  </thead>
  <tbody>
    <?php
        
          $query="SELECT
                  t.`cid`,c.`name`,lc.`locker_id`,MONTHNAME(tr_date) AS mname,
                  SUM(dr) AS t_dr,
                  SUM(cr) AS t_cr,
                  (SUM(dr)-SUM(cr)) AS balance
                  FROM `locker_trans` t
                  JOIN `new_customer` c ON t.`cid`= c.`cid`
                  JOIN `locker_customer` lc ON t.`locker_id`=lc.`locker_id`
                  GROUP BY MONTH(tr_date),cid,NAME";
        $query_run = mysqli_query($conn,$query);

        if(mysqli_num_rows($query_run) >0)
        {
          foreach ($query_run as $row)
           {
            ?>
                <tr>
                  <td><?=$row['cid']; ?></td>
                  <td><?=$row['name'];?></td>
                 <td><?=$row['locker_id'];?></td>
                 <td><?=$row['mname'];?></td>
                 <td><?=$row['t_dr'];?></td>
                 <td><?=$row['t_cr'];?></td>
                 <td><?=$row['balance'];?></td>
                <?php
              }
          }
          else
          {
            echo "No Records Found";
          }
        
        ?>

  </tbody>
</table>
<div class="text-center">
 <button onclick="window.print();" class="btn btn-primary">Print</button>
  
</div>
  
</div>

