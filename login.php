
<?php
$conn = mysqli_connect("localhost", "root", "", "access");

if(!$conn){
    echo "not connected to database";
}

if (isset($_POST['Login'])){
  
    $uname = $_POST["email"];
    $pass = $_POST["password"];

    $sql = mysqli_query($conn, "SELECT count(*) as total from users where email = '".$uname."' and password = '".$pass."'") or
    die(mysqli_error($conn));

    $rw = mysqli_fetch_array($sql);

    if($rw['total'] > 0){
        
     
        header("Location:http://localhost/adasyst_space/index.html", TRUE, 301);
        exit();
        // echo "<script> console.log(window.location.assign(http://localhost/adasys_space/home_page.html))</script>";
      

    }else{
        echo "<script>alert('username and password are incorrect')</script>";
        
    }


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="includes/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
    <style>
        body{
            font-family:serif;
        }
        .logo{
            color:white;
        }
        .Login{
          width:180px;
          margin: 140px auto;
          padding:15px;
          font-family:serif;
		  font-size:20px;
          
        }

        label{
            width:100px;
            display:;
            font-family:serif;
		  font-size:20px;
        }

        form{
            background:#CE7BB0;
            box-shadow: 0 20px 20px black;
            width:200%;
            padding:10px;
            
        }
        input{
            margin:10px;
            border-radius:100px;
            text-align:center;
        }
        .header {
    min-height: 100vh;
    width: 100%;
    background-image: url(21.jpg);
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
      /*  .btn-primary{
            width:100px;
            border-radius:100px;
         
        }*/
        

        p{
            text-align:center;
        }
        h3{
            font-family:"serif";
            font-weight:bold;
      
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
<body onLoad = "doSomething()">

<section class="header">
			<nav>
				<div class="nav-links">
					<ul>
						<li> <a href="registration.php"class="nav-btn"> REGISTER </a> </li>
					
					</ul>
				</div>
			</nav>


 


    <div class="Login">
        <form action="" method ="POST">
            <h3>LOGIN</h3>
        <label >Email: </label><input type="email" name = "email"/ required><br>
        <label >Password: </label><input type="password" name = "password"/ required>

        <p><input class = "" type="submit" name = "Login"/></p>

    </form>
    </div>  
</body>
</html>