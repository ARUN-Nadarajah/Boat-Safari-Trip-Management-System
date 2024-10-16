<?php 

    $server = "localhost";
    $user = "root";
    $password = "";
    $dbname = "BoatSafari";

// error_reporting(E_ALL);
// ini_set('display_errors', 1);

    try{
        // Create a new connection to the database
        $con = mysqli_connect($server, $user, $password, $dbname);
        // echo "Connection established";
    }catch(mysqli_sql_exception){
        // If there is an error connecting, display the error message and stop the script
        echo "Connection failed: ".mysqli_connect_error();
        die();
    }

?>