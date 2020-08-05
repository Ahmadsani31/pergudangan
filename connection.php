<?php 
    $server = "localhost";//nama server
	$user = "root"; //username server
	$pass = "";  //password
	$dbase = "dunlop"; // database yang dipakai

$conn = mysqli_connect($server, $user, $pass, $dbase);
 
// Check connection
 /*   if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
         echo 'Connected successfully';
         mysqli_close($conn);
 */
?>
