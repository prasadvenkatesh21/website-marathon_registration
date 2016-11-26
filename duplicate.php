
<?php
##Ashwathnarayana, Venkateshprasad  Account :  jadrn001 CS545, Fall 2016 Project 3
$server = 'opatija.sdsu.edu:3306';
$user = 'jadrn001';
$password = 'orange';
$database = 'jadrn001';
if(!($db = mysqli_connect($server, $user, $password, $database)))
            write_error_page("Unable to connect");
$email =$_GET['email'];
$sql = "select * from runners where email='$email';";
mysqli_query($db, $sql);
$how_many = mysqli_affected_rows($db);
mysqli_close($db);
if($how_many > 0)
    echo "dup";
else if($how_many == 0)
    echo "OK";
else
    echo "ERROR, failure ".$how_many;
?>
