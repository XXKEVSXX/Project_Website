<!DOCTYPE html>
<html>
<head>
	<tilte></tilte>
	<link rel="stylesheet" href="includes/style.css" type = "text/css" media = "screen"/>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<style>
	.delete-form{
		  width:350px;
      	  margin: 150px auto;
          padding:10px;
		  

      
	}

	.logo{
		color:black;
	}


	form{
        background:#9ADCFF;
        box-shadow: 0 15px 20px black;
		padding:2%;
		margin:5%;
		width:100%;
		border-radius:5%;
		
      }

	  h1{
		  text-align:center;
		  font-family:serif;
		  font-size:20px;
		  color:black;
	  }
	  input{
		  padding: 0 10px;

	  }

	  p{
		  text-align:center;
	  }

	  .email-input-text{
		  font-family:serif;
		  font-size:20px;
	  }
      .header {
    min-height: 100vh;
    width: 100%;
    background-image: url(19.jpg);
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
    color:wheat;
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
<?php


if(isset($_POST['submitted']))
{
	require_once('mysqli_connect.php');

	$error = array();

	if(empty($_POST['email']))
	{
		$error[] = 'You Forgot to Enter you Email Address.';
	}
	else
	{
		$email = mysqli_real_escape_string($dbc,trim($_POST['email']));
	}

	if(empty($error))
	{
		$query = "SELECT id FROM users WHERE email = '$email'";
		$result = mysqli_query($dbc,$query);
		$num = mysqli_num_rows($result);

		if($num == 1)
		{
			$row = mysqli_fetch_array($result, MYSQLI_NUM);

			$q = "DELETE FROM users WHERE id = '$row[0]'";
			$r = mysqli_query($dbc,$q);

			if(mysqli_affected_rows($dbc)==1)
			{
				echo '<h1> Thank you! </h1>
				<p> Record has been deleted. </p><p><br></p>';
			}
			else
			{
				echo '<h1> System Error </h1>
				<p> The record could not be deleted due to system error. We apologize for any convenience. </p><p><br></p>';
				echo '<p>'.mysqli_error($dbc).'<br> Query'.$q.'</p>';
			}
		}
		else
		{
			echo '<h1> ERROR! </h1>
			<p> The Email Address do not match those on the file </p>';
		}
	}

else
{
	echo '<h1> ERROR! </h1>
	<p> The Following Error(s) occured: <br>';
	foreach($error as $msg)
	{
		echo "-$msg <br> \n";
	}
	echo '<p> Please Try Again, </p><p><br></p>';

	
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


			<div class="delete-form">
				
					<form action="delete.php" method="POST">
						<h1>DELETE RECORD</h1>
						<p class= "email-input-text">Email address: <input  type="text" name="email" value=""/></p>
						<p><input class = "" type="submit" name="submitted" value="Delete"></p>
					</form>
			</div>


</body>
<?php

?>
</html>