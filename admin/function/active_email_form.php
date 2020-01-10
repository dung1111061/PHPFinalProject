<!-- click this link to active account -->
<?php
	include_once "../config.php";
	include_once "../connection.php";
	include_once("../models/admin.php");
	admin::update(array(db_admin_email => $_GET["email"]),array(db_admin_privilege => privilege::demonstration));
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	Account has been actived.
</body>
</html>