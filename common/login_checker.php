<?php
session_start();
if(!isset($_SESSION["login_check"]))
{
  echo "<script>alert('Please Login');window.location.href='login.php'</script>";
}
?>