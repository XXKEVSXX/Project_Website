<!DOCTYPE html>
<html lang="en">
<head>
   
    <title>Registration</title>
    <link rel="stylesheet" href="includes/style.css" type = "text/css" media = "screen"/>
    <style>
    	form{
        background: #E5E3C9;
        box-shadow: 0 15px 20px black;
	    padding:15px; 
		width:310px;
        margin: 150px auto;
      }

     
  
     input{
       margin:10px;
	     border-radius:auto; 
		  border-color:black;

		  margin-left: 10px; 
		  text-align:center;
      }

      .reg-form{
         
        /*background: black;*/
     /*   box-shadow: 0 15px 20px black; */
	  /*  padding:15px; */
        width:310px;
        margin: 150px auto;
        text-align:center;
        
      }

      h1{
		  font-family:serif;
		  font-family:serif;
		  font-weight:bold;
		  font-size:20px;
		  text-align:center;
	  }
      label{
          width:100px; 
          display:inline-block;
		  font-family:serif;
		  font-size:13px; 

     
      }
      .btn-submit{
       /* padding:5px; */
		 /* border-radius:2px;*/
          text-align:center;
      }
      .header {
    min-height: 100vh;
    width: 100%;
    height: 700px;
    background-image: url(17.jpg);
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
    border: 1px solid #865639;
    background: black;
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
  
</head>
<body>



<section class="header">
			<nav>
				<div class="nav-links">
					<ul>
						<li> <a href="registration.php"class="nav-btn"> REGISTER </a> </li>
                        <li> <a href="login.php"class="nav-btn"> LOG IN </a> </li>

					</ul>
				</div>
			</nav>
    <?php
        // include('includes/header.html');
        require('mysqli_connect.php');
        
        if(isset($_POST['btnsubmit']))
        {
            if(!empty($_POST['first_name']))
            {
                $fname = mysqli_real_escape_string($dbc,trim($_POST['first_name']));
            }
            else
            {
                $fname = null;
                echo "<b> You forgot your firstname.</b><br>";
            }
            if(!empty($_POST['last_name']))
            {
                $lname = mysqli_real_escape_string($dbc,trim($_POST['last_name']));

            }
            else
            {
                $lname = null;
                echo "<b> You forgot your lastname.</b><br>";
            }

            if(!empty($_POST['email']))
            {
                $email = $_POST['email'];
            }
            else
            {
                $email = null;
                echo "<b> You forgot your email.</b><br>";
            }

            if(!empty($_POST['password1']))
            {
                if($_POST['password1'] != $_POST['password2'])
                {
                    $password = null;
                    echo "<b>Password did not match!</b><br>";

                }
                else
                {
                  $password1 = mysqli_real_escape_string($dbc,trim($_POST['password1']));
                }
            }
            else
            {
                $password1 = null;
                echo "<b> You forgot your password. </b><br>";
            }
            if($fname&&$lname&&$email&&$password1)
            {
                $sql = "INSERT INTO users (first_name, last_name, email, password)
                VALUES ('$fname', '$lname', '$email', '$password1')";

                if(mysqli_query($dbc, $sql))
                {
                    echo "New Record created successfully!";
                }
                else 
                {
                    echo "Error:".sql."<br>".mysqli_error($dbc);
                }
                mysqli_close($dbc);

            }
        }

        else 
        {
            echo "<br>";
            echo "<br>";
            echo "<b> Please fill out the form again!. Thankyou</b><br>";
        }
    ?>
   
    
   
   <div class="reg-form">
        <form action="registration.php" method ="POST">
            <h1>REGISTRATION</h1>
                <label>First Name:</label>   <input type="text" name = "first_name"/><br>
                <label>Last Name:</label>    <input type="text" name ="last_name"/><br>
                <label> Email: </label>      <input type="email" name = "email"/><br>
                <label> Password:</label>    <input type="password" name = "password1"/><br>
                <label>Re-type Password:</label>   <input type="password" name = "password2"><br>
                  <div class = "btn-submit">  <input type="submit" name = "btnsubmit"></div>
                

        </form>
   </div>
  
 
</body>
</html>
