<!DOCTYPE html>
<html lang="en">
<head>
    <title>REGISTERED USERS</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="includes/style.css" type = "text/css" media= "screen"/>
    <style>
        .nav-links ul li {
			list-style: none;
			display: inline-block;
			padding: 8px 12px;
			position: relative;
		}
        nav img {
    width: 100px;
    border-radius: 50%;
    
}
    </style>

</head>
<body>
    <?php
        // include('includes/header.html');
    ?>
   
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

    <center>


               <br>
               <br>
        <thead>
            <table>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    
                </tr>
          
        </thead>

        <tbody>
            <?php
                require_once('mysqli_connect.php');
                $query = "SELECT * FROM users";
                $result = mysqli_query($dbc, $query);

               if(mysqli_num_rows($result) > 0 )
                {
                    while ($row = mysqli_fetch_assoc($result))
                    {?>
                        <tr>
                            <td><?php echo $row ['id'];?></td>
                            <td><?php echo $row ['first_name'];?></td>
                            <td><?php echo $row ['last_name'];?></td>
                            <td><?php echo $row ['email'];?></td>
                        </tr>
                        <?php
                    }
                }
                mysqli_close($dbc);
            ?>
        </tbody>
      </table>
    </center>
  
</body>
<?php 
    // include('includes/footer.html');
?>


</html>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataaTables.min.js"></script>
<script type = "text/javascript">
    $(document).ready(function(){
        $('#records').datatables();
    }
    );

</script>