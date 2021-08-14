
<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>SQL Injection Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
     
<style>
table, th, td {
  border: 1px solid red;
  border-collapse: collapse;
}
th, td {
color: white;
  padding: 5px;
  text-align: left;    
}
</style>

</head>
<body>
     <h1>Hello, <?php echo $_SESSION['name']; ?>! You are successfully logged in!</h1>
     <h1></h1>
    <h3>Your personal information:</h3>


<table style="width:60%">
    <tr>
        <th>Name: </th>
        <th>Username: </th>

    </tr>
        <tr>
            <td><?php echo $_SESSION['name'];  ?>  </td>
            <td><?php echo $_SESSION['username'];  ?>  </td>
        </tr>
</table>

</body>
</html>


<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>


