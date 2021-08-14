<?php
session_start();
	include("connection.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>SQL Injection Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <form action="login.php" method="post">
     	<h2>LOGIN</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<input type="text" name="uname" placeholder="Username or Name"><br>

     	<input type="password" name="pass" placeholder="Password"><br>

     	<button type="submit">Login</button>
     </form>
</body>
</html>
