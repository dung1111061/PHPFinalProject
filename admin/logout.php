<?php
include_once "models/admin.php";

unset($_SESSION['privilege_user']);
unset($_SESSION['username']);
unset($_SESSION['name']);
setcookie('privilege_user', "", time() - 3600,"/");
header('Location: index.php');