
<?php

##Ashwathnarayana, Venkateshprasad  Account :  jadrn001 CS545, Fall 2016 Project 3

function validate_data($params) {
    $msg = "";
    $stateList = array("AK","AL","AR","AZ","CA","CO","CT","DC",
        "DE","FL","GA","GU","HI","IA","ID","IL","IN","KS","KY","LA","MA",
        "MD","ME","MH","MI","MN","MO","MS","MT","NC","ND","NE","NH","NJ",
        "NM","NV","NY","OH","OK","OR","PA","PR","RI","SC","SD","TN","TX",
        "UT","VA","VT","WA","WI","WV","WY");
    $upper = strtoupper($params[5]);
    $state = $upper;
    $found = false;
    foreach($stateList as $sta)
    { 
        if(($sta == $state)){ 
        $found = true;
        }
    }
    $email_verify = preg_match('/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i',$params[14]);
    if(strlen($params[0]) == 0)
        $msg .= "Please Enter the First Name<br />";
    if(strlen($params[2]) == 0)
        $msg .= "Please Enter the Last Name<br />";
    if(strlen($params[3]) == 0)
        $msg .= "Please Enter the Address<br />";
    if(strlen($upper) == 0)
    $msg .= "Please Enter the State<br />";
    elseif($found == false)
        $msg .= "Please Enter A Valid State<br />";
    if(strlen($params[6]) == 0)
        $msg .= "Please Enter the City<br />";
    $zipcode = $params[7];  
    if(strlen($params[7]) == 0)
        $msg .= "Please Enter the Zip Code<br />";
    elseif(!is_numeric($params[7])) 
        $msg .= "Zip Code may contain only numeric digits<br />";
    elseif(!(preg_match('/^[0-9]{5}([- ]?[0-9]{4})?$/', $zipcode)))
        $msg .= "Please Enter a Valid USA Zip Code <br />";
    if(strlen($params[8]) == 0)
        $msg .= "Please Enter Area Code<br />";
       elseif(!is_numeric($params[8]))
      $msg .= "Phone Number may contain only Numeric Digits<br />";
     if(strlen($params[9]) == 0)
       $msg .= "Please Enter Prefix Number<br />";
      elseif(!is_numeric($params[9]))
     $msg .= "Phone Number may contain only Numeric Digits<br />";
        if(strlen($params[14]) == 0)
        $msg .= "Please Enter Email Address<br />";
    elseif(!$email_verify)
        $msg .= "Email Address is Invalid<br/>";
  
    if(strlen($params[15]) == 0){
                 $msg .= "Please Enter Month<br />";
             }
    elseif ($params[15] <= 0 and $params[15] >= 12) {
            $msg .= "Please Enter a Valid Month<br />";
    }
    if(strlen($params[16]) == 0){
                $msg .= "Please Enter Date<br />";
            }
    elseif ($params[16] <= 0 and $params[16] >= 31) {
            $msg .= "Please Enter a Valid Date<br />";
    }
    if(strlen($params[17]) == 0){
                $msg .= "Please Enter year<br />";
            }
    elseif ($params[17] <= 1941 and $params[17] >= 2011) {
            $msg .= "Please Enter a Valid Year or You are not elegible for the marathon<br />";
    }
    if(!isset($_POST['gender']))
        $msg .= "Please select Gender<br />";
        

    if(!isset($_POST['level']))
        $msg .= "Please select Experience Level<br />";
    if(!isset($_POST['category']))
        $msg .= "Please select Category<br />";  

    $UPLOAD_DIR = 'up_imgs/';
    $COMPUTER_DIR = '/home/jadrn001/public_html/proj3/up_imgs/';
    $fname = $_FILES['file']['name'];
    
    if($fname == ''){
        $msg .= 'Upload a image';
    }

    elseif(file_exists("$UPLOAD_DIR".$fname))  {
        echo "<b>Error, The file $fname already Exists</b><br />\n";
        }
    elseif($_FILES['file']['error'] > 0) {
        $err = $_FILES['file']['error'];    
        echo "Error Code: $err ";
    if($err == 1)
        echo "The File was too big to upload, the limit is 2MB<br />";
        } 
    elseif(exif_imagetype($_FILES['file']['tmp_name']) != IMAGETYPE_JPEG) {
        echo "ERROR, not a jpg file<br />";   
        }
        
    
    if($msg) {
        write_form_error_page($msg);
        exit;
        }
        else { 
        move_uploaded_file($_FILES['file']['tmp_name'], "$UPLOAD_DIR".$fname);
    }
    }
    
    
function write_form_error_page($msg) {
    write_header();
    echo "<h3>Error Occurred<br />",
    $msg,"</h3>";
    write_form();
    write_footer();
    } 
    
function write_form() {
    print <<<ENDBLOCK
     <fieldset>
                <legend>Registration Information</legend>       
<form name="personal_info" method="post" action="process_request.php" id = "signup_form">
    <ul>
    <li><label for="fname">First Name:</label>
        <input type="text" autofocus  name="fname" value="$_POST[fname]" id="fname" size="30" /> </li>
        
    <li><label for="middle_name">Middle Name:</label>
        <input type="text" name="middle_name" value="$_POST[middle_name]" id="middle_name" size="5" /></li>
        
    <li><label for="lname">Last Name:</label>
        <input type="text"  name="lname" value="$_POST[lname]" id="lname" size="25" /></li>
        
    <li><label for="address">Address (line 1):</label>
        <input type="text"  placeholder="Street Name"  name="address" value="$_POST[address]" id="address" size="30" /></li>
        
    <li><label for="address1">Address (line 2):</label>
        <input type="text" placeholder="Apt/Suite" name="address1" value="$_POST[address1]"  id="address1" size="15" /></li>
        
    <li><label>City</label>
        <input type="text" name="city" value="$_POST[city]" size="25" />
        <label>State</label>
        <input type="text" name="state" value="$_POST[state]" placeholder="XX" size="2" maxlength="2"  />
        <label>Zip</label>
        <input type="text" name="zip" value="$_POST[zip]" size="5" placeholder="XXXXX" pattern="[0-9]{5}" maxlength="5" /></li>
    
   <li><label for="phone">Primary Phone:</label>
        (<input type="text" placeholder="XXX" name="area_phone" value="$_POST[area_phone]" id="phone" size="3" maxlength="3" />)  &nbsp;-&nbsp;
        <input type="text" placeholder="XXX"  name="prefix_phone" value="$_POST[prefix_phone]" size="3" maxlength="3" /> &nbsp;-&nbsp;
        <input type="text" placeholder="XXXX"  name="phone" value="$_POST[phone]" size="4" maxlength="4" /></li>
    
    <li><label for="phone1">Home Phone:</label>
        (<input type="text" placeholder="XXX" name="area_phone1" value="$_POST[area_phone1]" id="phone" size="3" maxlength="3" />)  &nbsp;-&nbsp;
    <input type="text"  placeholder="XXX" name="prefix_phone1" value="$_POST[prefix_phone1]" size="3" maxlength="3" /> &nbsp;-&nbsp;
    <input type="text"  placeholder="XXXX" name="phone1" value="$_POST[phone1]" size="4" maxlength="4" /></li> 
    
    <li><label for="email">E-Mail:</label>
        <input type="text" placeholder="someone@example.com" value="$_POST[email]"  name="email"  size="25" /></li>
        
    <li><label for="dob">Date of Birth</label>
        <input type="text" name="month" value="$_POST[month]"  placeholder="MM" id="month" size="2" maxlength="2"/> 
        <input type="text" name="date" value="$_POST[date]"  placeholder="DD" id="date" size="2" maxlength="2"/>
        <input type="text" name="year" value="$_POST[year]"  placeholder="YYYY" id="year" size="4" maxlength="4"></li>

    <li><label for="level">Gender:</label>
ENDBLOCK;
        $gender_choice = array("Male","Female","Other");
            foreach($gender_choice as $item) {
                echo "<input type='radio' name='gender'  value='$item'";
                if($item == $_POST[gender])
                    echo " checked='checked'";
                echo " />$item";
                }            
            echo "<br />";
print <<<ENDBLOCK
        </li>

    <li><label for="medical">Medical Condition:</label>
            <textarea name = "medical" value="$_POST[medical]" placeholder="Please mention any previous medical condition." rows="4" cols="40"></textarea></li>
    <li><label for="level">Experience Level:</label>

ENDBLOCK;
        $level_choice = array("Expert","Experienced","Novice");
            foreach($level_choice as $item) {
                echo "<input type='radio' name='level'  value='$item'";
                if($item == $_POST[level])
                    echo " checked='checked'";
                echo " />$item";
                }            
            echo "<br />";
print <<<ENDBLOCK
            </li>
        
    <li><label for="category">Category:</label>
ENDBLOCK;
        $cat_choice = array("Teen","Adult","Senior");
            foreach($cat_choice as $item) {
                echo "<input type='radio' name='category'  value='$item'";
                if($item == $_POST[category])
                    echo " checked='checked'";
                echo " />$item";
                }            
            echo "<br />";
print <<<ENDBLOCK
        </li>

    <li><label for="image"> Runner's Image: </label>
            <input type="file" id="picture" name="file"/></li>
        
    <div id="button_panel">
    <input type="reset" value="Clear Data" class="button" />
    <input type="submit" value="Submit Data"  class="button" />
    </div>


</form>
</fieldset>
<div id= home>
            
        </div>
        <div id=bottom>
            <a href="index.html">Go Back Home</a></br></br>
            This is part of course curriculum for CS-545 at San Diego State University<br/> &copy; Venkateshprasad Ashwathnarayana
        </div>  
        
ENDBLOCK;
}


function process_parameters($params) {
    global $bad_chars;
    $params = array();
    $params[] = trim(str_replace($bad_chars, "",$_POST['fname']));          //1
    $params[] = trim(str_replace($bad_chars, "",$_POST['middle_name']));    //2
    $params[] = trim(str_replace($bad_chars, "",$_POST['lname']));          //3
    $params[] = trim(str_replace($bad_chars, "",$_POST['address']));        //4
    $params[] = trim(str_replace($bad_chars, "",$_POST['address1']));       //5
    $params[] = trim(str_replace($bad_chars, "",$_POST['state']));          //6
    $params[] = trim(str_replace($bad_chars, "",$_POST['city']));           //7
    $params[] = trim(str_replace($bad_chars, "",$_POST['zip']));            //8
    $params[] = trim(str_replace($bad_chars, "",$_POST['area_phone']));     //9
    $params[] = trim(str_replace($bad_chars, "",$_POST['prefix_phone']));   //10
    $params[] = trim(str_replace($bad_chars, "",$_POST['phone']));          //11
    $params[] = trim(str_replace($bad_chars, "",$_POST['area_phone1']));    //12
    $params[] = trim(str_replace($bad_chars, "",$_POST['prefix_phone1']));  //13
    $params[] = trim(str_replace($bad_chars, "",$_POST['phone1']));         //14
    $params[] = trim(str_replace($bad_chars, "",$_POST['email']));          //15
    $params[] = trim(str_replace($bad_chars, "",$_POST['month']));          //16
    $params[] = trim(str_replace($bad_chars, "",$_POST['date']));           //17
    $params[] = trim(str_replace($bad_chars, "",$_POST['year']));           //18
    $params[] = trim(str_replace($bad_chars, "",$_POST['gender']));         //19
    $params[] = trim(str_replace($bad_chars, "",$_POST['medical']));        //20
    $params[] = trim(str_replace($bad_chars, "",$_POST['level']));          //21
    $params[] = trim(str_replace($bad_chars, "",$_POST['category']));
    return $params;
    }
    

    
function store_data_in_db($params) {
    
    $filename = $_FILES['file']['name'];
    
    $phone_number_primary = "$params[8]"."$params[9]"."$params[10]";
    $phone_number_home = "$params[11]"."$params[12]"."$params[13]";
    $date_of_birth = "$params[17]"."$params[15]"."$params[16]";
    $db = get_db_handle();
    $sql = "SELECT * FROM runners WHERE ".
    "fname='$params[0]' AND ".
    "middle_name='$params[1]' AND ".
    "lname='$params[2]' AND ".
    "address = '$params[3]' AND ".
    "address1 = '$params[4]' AND ".
    "state = '$params[5]' AND ".
    "city = '$params[6]' AND ".
    "zip = '$params[7]' AND ".
    "phone_number_primary = '$phone_number_primary' AND ".
    "phone_number_home = '$phone_number_home' AND ".
    "email = '$params[14]' AND ".
    "date_of_birth = '$date_of_birth' AND ".
    "gender = '$params[18]' AND ".
    "medical = '$params[19]' AND ".
    "experience = '$params[20]' AND ".
    "category = '$params[21]' AND ".
    "image = '$filename';";

    
    $result = mysqli_query($db, $sql);
    if(mysqli_num_rows($result) > 0) {
        write_form_error_page('This Record Appears to be Duplicate');
        exit;
        }
    

    $sql = "INSERT INTO runners(fname,middle_name,lname,address,address1,state,city,zip,phone_number_primary,phone_number_home,email,date_of_birth,gender,medical,experience,category,image) ".
    "VALUES('$params[0]','$params[1]','$params[2]','$params[3]','$params[4]','$params[5]','$params[6]','$params[7]','$phone_number_primary','$phone_number_home','$params[14]','$date_of_birth','$params[18]','$params[19]','$params[20]','$params[21]','$filename');";
      
    mysqli_query($db,$sql);
    
    $how_many = mysqli_affected_rows($db);
    write_confirmation();
    echo "<h3>$params[0], Thank you registering.</h3>";
    write_footer();
    close_connector($db);
    

    }
?>   