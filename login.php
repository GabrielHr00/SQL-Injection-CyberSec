<?php 
session_start(); 
include "connection.php";


//check if both username and password fields are set
if (isset($_POST['uname']) && isset($_POST['pass'])) {
	
	
	//IMPORTANT: validates the input
	function validate($userData){
	   //cut the spaces in the String: "   Im here    " ---> "Im here"
       $userData = trim($userData);
	   //cut all the slashes in the data
	   $userData = stripslashes($userData);
	   //cut if there is special characters
	   $userData = htmlspecialchars($userData);
	   return $userData;
	}

	//validate and save the given input for username and password
	$uname = validate($_POST['uname']);
	$pass = validate($_POST['pass']);
	

	
	if (empty($uname) || empty($pass)) {
		header("Location: index.php?error=Please, make sure you filled both fields!");
	 	exit();
	} 
	else if((preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $uname)) || (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $pass))){
		header("Location: index.php?error= We are sorry, but the entered username/password contains a non-valid symbol!");
		exit();
	}
	else if(strlen($pass) < 8){
		header("Location: index.php?error= We are sorry, but the entered username/password should contain at least 8 characters!");
		exit();
	}
	else if(strlen($uname) > 20 || strlen($pass) > 30){
		header("Location: index.php?error= We are sorry, but the entered username/password is not valid!");
		exit();
	}
	else { 
		$stmt = $conn->prepare("SELECT * FROM User WHERE username = ? AND password = ?");
		$stmt->bind_param("ss", $uname, $pass);
		$stmt->execute();
		$result = $stmt->get_result();
	}
	
	
	// //save the given input for username and password
	// $uname = $_POST['uname'];
	// $pass = $_POST['pass'];

	// //Make a sql statement and perform a query against the database with the established connection
	// $statement = "SELECT * FROM User WHERE username='$uname' AND password='$pass'";
	// $result = mysqli_query($conn, $statement);
	

	if($result){
		//checks if data is present in result
		if (mysqli_num_rows($result)) {
			// returns an array with the object
			$row = $result->fetch_assoc();			

            if ($row['username'] === $uname && $row['password'] === $pass) {
            	$_SESSION['username'] = $row['username'];
            	$_SESSION['name'] = $row['name'];
            	// $_SESSION['id'] = $row['id'];
				// $_SESSION['password'] = $row['password'];
            	// $_SESSION['address'] = $row['address'];
				// $_SESSION['creditCardType'] = $row['creditCardType'];
    			// $_SESSION['creditCardNumber'] = $row['creditCardNumber'];
            	header("Location: home.php");
		        exit();
            
			}else{
				header("Location: index.php?error=Incorect username or password!");
		        exit();
			}
		}else{
			header("Location: index.php?error=Incorect username or password!");
	        exit();
		}
	}else{
		header("Location: index.php?error=No User with the given username/password found!");
		exit();
	}
}
else{
	header("Location: index.php");
	exit();
}




/*

---------------------------------------------------------------------- HOW DOES IT WORK -----------------------------------------------------------------------

Elias
' OR '1'='1
1. SELECT * FROM User WHERE username='$uname' AND password='$pass'" ----> uname = Elias      pass = ' OR '1'='1
	SELECT * FROM User WHERE username='Elias' AND (password='' OR '1'='1')   


Elias' OR ''='
---
2. SELECT * FROM User WHERE username='$uname' AND password='$pass'" ----> uname = Elias' OR ''='       pass = ''
	SELECT * FROM User WHERE username='Elias'  OR (''='' AND password='')


Elias' OR '1'='1' OR ''='
---
3. SELECT * FROM User WHERE username='$uname' AND password='$pass'" ----> uname = Elias' OR '1'='1' OR ''='      pass = ''
	SELECT * FROM User WHERE username='Elias' OR   ('1'='1'  OR  (''='' AND password='')) 


Elias 
' OR ''='
4. SELECT * FROM User WHERE username='$uname' AND password='$pass'" ----> uname = Elias      pass = ' OR ''='
	SELECT * FROM User WHERE username='Elias' AND  (password=''  OR  ''='')

/*


/*
		<th>User ID: </th>
		<th>Password: </th>
        <th>Address: </th>
        <th>Credit card: </th>
        <th>Number of credit card:</th>


		<td><?php echo $_SESSION['id'];  ?>  </td>
		<td><?php echo $_SESSION['password'];  ?>  </td>
        <td><?php echo $_SESSION['address'];  ?>  </td>
        <td><?php echo $_SESSION['creditCardType'];  ?>  </td>
        <td><?php echo $_SESSION['creditCardNumber'];  ?>  </td>

*/