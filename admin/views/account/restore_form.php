<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Restore Password</title>
</head>
<body>
	<form action="index.php?action=restorePassword" method="post" onsubmit="return validate()">	
		<input type="hidden" name="email" value="<?= $email ?>">
		New Password <input type="password" name="passwd"> <br>
		Confirm Password <input type="password"> <br>
		 <input type="submit"> <br>
	</form>
	<script>
		function validate() {
		var passwd = $('input[type="password"]')[0].value;
		var repeat_passwd = $('input[type="password"]')[1].value;

        var problems = "";

        if (email == "") {
            problems = "Empty email \n";
        }

        var noat = false;
        if (email.indexOf("@") == -1) noat = true; 

        if (noat == true) {
            problems += "Email has no @ \n";
            
        }

        if (passwd !== repeat_passwd) {
        	problems += "Password not duplicate \n";
        }

        if(problems !="") {
			alert(problems);
			return false;
		}
		return true;
	}
	</script>
</body>
</html>