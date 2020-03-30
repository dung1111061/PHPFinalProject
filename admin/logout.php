<?php
include "mylib.php";
if (!isset($_SESSION)) session_start();

unset($_SESSION['privilege_user']);
unset($_SESSION['username']);
unset($_SESSION['name']);
// delete cookie
setcookie('privilege_user', "", time() - 3600,"/");
setcookie('username', "", time() - 3600,"/");
setcookie('name', "", time() - 3600,"/");

redirect("trang-chu.html");