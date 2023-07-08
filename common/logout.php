<?php
session_start();
unset($_SESSION["login_check"]);

header('Location: ../login.php');

?>