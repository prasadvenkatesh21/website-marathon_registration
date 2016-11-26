
<!DOCTYPE html>
<html>
<head>
  <title>Report</title>
  <meta charset="UTF-8">
  <link rel="icon" href="favicon.ico" type="image/ico" sizes="16x16">
  <link   rel="stylesheet" type="text/css" href="proj2.css">
  <script type="text/javascript" src="http://jadran.sdsu.edu/jquery/jquery.js"></script>
  <script type="text/javascript" src="form.js"></script>
  <script type="text/javascript" src="proj3.js"></script>
</head>
<body>
  <div class="report1">
<h1 class="bannertext">Deatiled Report</h1>
</div>
<div class="report2">
<?php 
    $UPLOAD_DIR = "up_imgs";
    $COMPUTER_DIR = '/home/jadrn001/public_html/proj3/up_imgs/';
    $fname = $_FILES['file']['name'];
    $d = dir($COMPUTER_DIR.'/');
    $server ='opatija.sdsu.edu:3306';
    $user = 'jadrn001';
    $password = 'orange';
    $database = 'jadrn001';
    if(!($db = mysqli_connect($server,$user,$password,$database)))
       echo "ERROR in connection".mysqli_error($db);
    else {
    $sql = "select concat_ws(',',lname,fname) as '/Full name/',image,floor((DATEDIFF(CURDATE(),date_of_birth)/365)) AS age,experience from runners group by category ,lname order by date_of_birth desc;";
  $result = mysqli_query($db,$sql);
  if(!$result)
      echo "ERROR in query".mysqli_error($db);
  echo "<table>\n";
  echo "<tr>";
  echo "<td>Full Name</td><td>Image</td><td>Age</td><td>Experience Level</td>";
  echo "</tr>";
  while(($row=mysqli_fetch_row($result)) ) {
      echo "<tr>";
      echo "<td>$row[0]</td>";
      while($fname = $d->read()) {
        $data[$fname] = $fname;
        } 
  echo "<td>";
  foreach($data as $fname => $fvalue) 
  {
        if($fname == "." || $fname == "..") 
        {
            ;
        }
        elseif($fname == $row[1])
        {
            
            echo "<img src=\"$UPLOAD_DIR/$fname\""." width='100px'/>\n";
          }
        }
        echo "</td>";
        echo "<td>$row[2]</td>";
        echo "<td>$row[3]</td>";
        echo "</tr>";
        }
echo "</table>";
mysqli_close($db);
}
?>
</div>

</body>
</html>



