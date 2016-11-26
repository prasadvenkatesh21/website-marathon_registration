<?php

include('helpers.php');
include('p2.php');
##Ashwathnarayana, Venkateshprasad  Account :  jadrn001 CS545, Fall 2016 Project 3
check_post_only();
$params = process_parameters();
validate_data($params);
store_data_in_db($params);
 include('confirm.php')



?>    
