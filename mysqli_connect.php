<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'access';

    $dbc = mysqli_connect($servername,$username,$password,$dbname);
    
    if(!$dbc)
    {
        die("Connection Failed: ".mysqli_connect_error());
    }
?>