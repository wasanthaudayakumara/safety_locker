<?php $page_title="safety_locker|Sign In"; ?>
<?php include'common/head.php'; ?>  
<?php include'common/nav.php'; ?>

<div class="container py-5 text-center bg-white my-5 col-lg-4 col-md-6">
	<img src="images/logo2.png"><h1 class="h4"> Safety Locker System</h1>
	<form action="sql/login_sql.php" method="POST">
		<input type="text" name="user_name" placeholder="User Name" class="form-control mb-3" required="">
		<input type="password" name="password" placeholder="Password" class="form-control mb-3" required="">
		<input type="submit" value="Sign In" class="btn btn-primary w-100">
		
		
	</form>
</div>




<?php include'common/footer.php' ?>