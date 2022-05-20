<!DOCTYPE html>
<html>
<head>
	<title>UPDATE</title>
	<link rel="stylesheet" href="includes/style.css" type = "text/css" media = "screen"/>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<style>
	.logo{
			color:black;
		}

		.change-password{
		  width:30%;
      	  margin: 150px auto;
          padding:10px;
		}


		form{
        background: #FFF89A;
        box-shadow: 0 15px 20px black;
	    padding:15px;
		width:110%;
      }


	  label{
		  width:150px;
          display:inline-block;
          padding: 10;
		  font-family:serif;
		  font-size:13px;
		  padding-left:10px;
		
	  }

	  input{
		  margin:10px;
		  border-radius:10px;
		  border-color:black;

		  margin-left: 10px;
		  text-align:center;
	  }

	  h1{
		  font-family:consolas;
		  font-family:serif;
		  font-weight:bold;
		  font-size:20px;
		  text-align:center;
	  }
	 
	  .btn-primary{
		  padding:5px;
		  border-radius:2px;
	  }
	  p{
		 text-align:center;
		
		 
	  }
	  .header {
    min-height: 100vh;
    width: 100%;
    background-image: url(20.jpg);
    background-position: center;
    background-size: cover;
    position: relative;
   
}
nav {
    display: flex;
    padding: 2%;
    justify-content: space-between;
    align-items: center;
}
.nav-btn {
    display: inline-block;
    text-decoration: none;
    color: #ffffff;
    
    padding: 12px 15px;
    font-size: 13px;
    background: transparent;
    position: relative;
    cursor: pointer;
}
.nav-btn:hover {
    border: 1px solid #52575D;
    background: #52575D;
    transition: 1s;
    color:black;
}
      
      .nav-links ul li {
			list-style: none;
			display: inline-block;
			padding: 10px 12px;
			position: relative;
		}
      .nav-links ul li a {
           color: black;
           text-decoration: none;
           font-size: 14px;
}

	  
	</style>
</head>
<?php


if(isset($_POST['submitted']))
{
	require_once('mysqli_connect.php');

	$error = array();

	if(empty($_POST['email']))
	{
		$error[] = 'You Forgot to enter your Email Address.';
	}
	else
	{
		$email = mysqli_real_escape_string($dbc, trim($_POST['email']));
	}
if(empty($_POST['pass']))
	{
		$error[] = 'You Forgot to Enter your Password.';
	}
	else
	{
		$pass = mysqli_real_escape_string($dbc, trim($_POST['pass']));
	}
	if(!empty($_POST['pass1']))
	{
		if($_POST['pass1'] != $_POST['pass2'])
		{
			$error[] = 'Your New Password did not match the confirmed password';
		}
		else
		{
			$pass1 = mysqli_real_escape_string($dbc,trim($_POST['pass1']));
		}
	}
	else
	{
		$error[] = 'You Forgot to Enter your New Password.';
	}

	if(empty($error))
	{
		$query = "SELECT id FROM users WHERE email = '$email' and password = '$pass'";
		$result = mysqli_query($dbc, $query);
		$num = mysqli_num_rows($result);

		if($num == 1)
		{
			$row = mysqli_fetch_array($result, MYSQLI_NUM);

			$q = "UPDATE users SET password='$pass1' WHERE id='$row[0]'";
			$r = mysqli_query($dbc,$q);

			if(mysqli_affected_rows($dbc) == 1)
			{
				echo '<h1> Thank You! </h1> 
				<p> Your Password has been updated. </p><p><br></p>';

			}
			else
			{
				echo '<h1> System Error </h1>
				<p> Your Password could not be changes due to system error. We apologize for any convenience. </p><p><br></p>';
				echo '<p>'.mysqli_error($dbc).'<br> Query'.$q.'</p>';
			}
		}
		else
		{
			echo '<h1> ERROR! </h1>
			<p> The Email address and password do not match those on the file</p>';
		}
	}
else
{
	echo '<h1> ERROR! </h1>
	<p> The Following Error(s) occured: <br>';
	foreach($error as $msg)
	{
		echo "-$msg <br. \n ";
	}
	echo '<p> Please try again, </p><p><br></p>';

}
mysqli_close($dbc);
}
?>


<body>

<section class="header">
			<nav>
				<div class="nav-links">
					<ul>
						<li> <a href="index.html"class="nav-btn"> HOME </a> </li>
						<li> <a href="about.html"class="nav-btn"> ABOUT </a> </li>
						<li> <a href="contact.html"class="nav-btn"> CONTACT US </a> </li>
						<li> <a href="records.php"class="nav-btn"> RECORD </a> </li>
                        <li> <a href="update.php"class="nav-btn"> UPDATED </a> </li>
                        <li> <a href="delete.php"class="nav-btn"> DELETE </a> </li>
						<li> <a href="login.php"class="nav-btn"> LOG IN </a> </li>
					</ul>
				</div>
			</nav>

		<div class="change-password">					
			<form action="update.php" method="POST">
				<h1>CHANGE PASSWORD</h1>
				<label>Email Address: </label> <input type="text" name="email" value=""/><br>
				<label> Current Password:</label> <input type="password" name="pass" value=""/><br>
				<label> New Password:</label> <input type="password" name="pass1" value=""/><br>
				<label> Confirm New Password:</label> <input type="password" name="pass2" value=""/><br>
				<p><input class = "" type="submit" name="submitted" value="Change Password"></p>
			</form>
		</div>

</body>
<?php 
// include('includes/footer.html');
?>
</html>