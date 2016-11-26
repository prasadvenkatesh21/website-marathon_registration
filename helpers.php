
<?php

##Ashwathnarayana, Venkateshprasad  Account :  jadrn001 CS545, Fall 2016 Project 3


$bad_chars = array('$','%','?','<','>','php');

function check_post_only() {
if(!$_POST) {
    write_error_page("This scripts can only be called from a form.");
    exit;
    }
}

function write_error_page($msg) {
    write_header();
    echo "<h3 >Error Occurred<br />",
    $msg,"</h3>";
    write_footer();
}
    
function get_db_handle() {
    $server = 'opatija.sdsu.edu:3306';
    $user = 'jadrn001';
    $password = 'orange';
    $database = 'jadrn001';
    
    if(!($db = mysqli_connect($server, $user, $password, $database))) {
        write_error_page('Unable to Connect' .mysqli_error($db));
        }
    return $db;
    }

    
function write_header() {
print <<<ENDBLOCK
<!DOCTYPE html>
<html>
    <head>
        <meta charset=utf-8 />
        <title>Sign Up</title>
        <link rel="icon" href="favicon.ico" type="image/ico" sizes="16x16">
        <link rel="stylesheet" type="text/css" href="proj2.css">
        <script type="text/javascript" src="http://jadran.sdsu.edu/jquery/jquery.js"></script>
       <!--<script type="text/javascript" src="form.js"></script>-->
       <script type="text/javascript" src="proj3.js"></script>
    </head>
    <body> 
    <div id = bannertext>
            <h1>Welcome to Aztec Marathon 2016</h1>
        </div>
        
        <div id = tagline>
            <h2>May the course be with you!!!</h2>
        </div>
        
        
            <div id=bannertext>
            <h1><u>Sign Up Here</u></h1>
            </div>

ENDBLOCK;
}

function write_confirmation() {
print <<<ENDBLOCK
<!DOCTYPE html>
<html>
    <head>
        <meta charset=utf-8 />
        <title>Success!!</title>
        <link rel="icon" href="favicon.ico" type="image/ico" sizes="16x16">
        <link rel="stylesheet" type="text/css" href="proj2.css">
        <script type="text/javascript" src="http://jadran.sdsu.edu/jquery/jquery.js"></script>
       <!--<script type="text/javascript" src="form.js"></script>-->
       <script type="text/javascript" src="proj3.js"></script>
    </head>
    <body> 
    <div id = bannertext>
            <h1>Welcome to Aztec Marathon 2016</h1>
        </div>
        
        <div id = tagline>
            <h2>May the course be with you!!!</h2>
        </div>
        
        
            <div id=bannertext>
            <h1>Congratulations</h1>
            </br></br>
            </br></br>
            </br></br>
            </br></br>
            </div>


ENDBLOCK;
}

function write_footer() {
    echo "</body></html>";
    }



?>
