//Ashwathnarayana, Venkateshprasad  Account :  jadrn001 CS545, Fall 2016 Project 3

function isEmpty(fieldValue) {
    return $.trim(fieldValue).length == 0;
}

function isValidState(state) {
    var stateList = new Array("AK","AL","AR","AZ","CA","CO","CT","DC",
                              "DE","FL","GA","GU","HI","IA","ID","IL","IN","KS","KY","LA","MA",
                              "MD","ME","MH","MI","MN","MO","MS","MT","NC","ND","NE","NH","NJ",
                              "NM","NV","NY","OH","OK","OR","PA","PR","RI","SC","SD","TN","TX",
                              "UT","VA","VT","WA","WI","WV","WY");
    for(var i=0; i < stateList.length; i++)
        if(stateList[i] == $.trim(state))
            return true;
    return false;
}

function isValidEmail(emailAddress) {
    var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
    return pattern.test(emailAddress);
}

function isValidDate() {
    var day = $("#date").val();
    var month = $("#month").val();
    var year = $("#year").val();
    
    var Date_temp = new Date(year, month-1, day);
    var Day_temp = Date_temp.getDate();
    var Month_temp = Date_temp.getMonth()+1;
    var Year_temp = Date_temp.getFullYear();
    
    if(day == Day_temp && month == Month_temp && year == Year_temp)
        return true;
    else
        return false;
}

$(document).ready( function() {
                  var errorStatusHandle = $('#message_line');
                  var elementHandle = new Array(13);
                  elementHandle[0] = $('[name="fname"]');
                  elementHandle[1] = $('[name="lname"]');
                  elementHandle[2] = $('[name="address"]');
                  elementHandle[3] = $('[name="city"]');
                  elementHandle[4] = $('[name="state"]');
                  elementHandle[5] = $('[name="zip"]');
                  elementHandle[6] = $('[name="area_phone"]');
                  elementHandle[7] = $('[name="prefix_phone"]');
                  elementHandle[8] = $('[name="phone"]');
                  elementHandle[9] = $('[name="email"]');
                  elementHandle[10] = $('[name="month"]');
                  elementHandle[11] = $('[name="date"]');
                  elementHandle[12] = $('[name="year"]');
                  
                  function isValidData() {
                  if(isEmpty(elementHandle[0].val())) {
                  elementHandle[0].addClass("error");
                  errorStatusHandle.text("Please enter your first name");
                  elementHandle[0].focus();
                  return false;
                  }
                  if(isEmpty(elementHandle[1].val())) {
                  elementHandle[1].addClass("error");
                  errorStatusHandle.text("Please enter your last name");
                  elementHandle[1].focus();
                  return false;
                  }
                  if(isEmpty(elementHandle[2].val())) {
                  elementHandle[2].addClass("error");
                  errorStatusHandle.text("Please enter your address");
                  elementHandle[2].focus();
                  return false;
                  }
                  if(isEmpty(elementHandle[3].val())) {
                  elementHandle[3].addClass("error");
                  errorStatusHandle.text("Please enter your city");
                  elementHandle[3].focus();
                  return false;
                  }
                  if(isEmpty(elementHandle[4].val())) {
                  elementHandle[4].addClass("error");
                  errorStatusHandle.text("Please enter your state");
                  elementHandle[4].focus();
                  return false;
                  }
                  if(!isValidState(elementHandle[4].val())) {
                  elementHandle[4].addClass("error");
                  errorStatusHandle.text("The state appears to be invalid, "+
                                         "please use the two letter state abbreviation");
                  elementHandle[4].focus();
                  return false;
                  }
                  if(isEmpty(elementHandle[5].val())) {
                  elementHandle[5].addClass("error");
                  errorStatusHandle.text("Please enter your zip code");
                  elementHandle[5].focus();
                  return false;
                  }
                  if(!$.isNumeric(elementHandle[5].val())) {
                  elementHandle[5].addClass("error");
                  errorStatusHandle.text("The zip code appears to be invalid, "+
                                         "numbers only please. ");
                  elementHandle[5].focus();
                  return false;
                  }
                  if(elementHandle[5].val().length != 5) {
                  elementHandle[5].addClass("error");
                  errorStatusHandle.text("The zip code must have exactly five digits")
                  elementHandle[5].focus();
                  return false;
                  }
                  if(isEmpty(elementHandle[6].val())) {
                  elementHandle[6].addClass("error");
                  errorStatusHandle.text("Please enter your area code");
                  elementHandle[6].focus();
                  return false;
                  }
                  if(!$.isNumeric(elementHandle[6].val())) {
                  elementHandle[6].addClass("error");
                  errorStatusHandle.text("The area code appears to be invalid, "+
                                         "numbers only please. ");
                  elementHandle[6].focus();
                  return false;
                  }
                  if(elementHandle[6].val().length != 3) {
                  elementHandle[6].addClass("error");
                  errorStatusHandle.text("The area code must have exactly three digits")
                  elementHandle[6].focus();
                  return false;
                  }
                  if(isEmpty(elementHandle[7].val())) {
                  elementHandle[7].addClass("error");
                  errorStatusHandle.text("Please enter your phone number prefix");
                  elementHandle[7].focus();
                  return false;
                  }
                  if(!$.isNumeric(elementHandle[7].val())) {
                  elementHandle[7].addClass("error");
                  errorStatusHandle.text("The phone number prefix appears to be invalid, "+
                                         "numbers only please. ");
                  elementHandle[7].focus();
                  return false;
                  }
                  if(elementHandle[7].val().length != 3) {
                  elementHandle[7].addClass("error");
                  errorStatusHandle.text("The phone number prefix must have exactly three digits")
                  elementHandle[7].focus();
                  return false;
                  }
                  if(isEmpty(elementHandle[8].val())) {
                  elementHandle[8].addClass("error");
                  errorStatusHandle.text("Please enter your phone number");
                  elementHandle[8].focus();
                  return false;
                  }
                  if(!$.isNumeric(elementHandle[8].val())) {
                  elementHandle[8].addClass("error");
                  errorStatusHandle.text("The phone number appears to be invalid, "+
                                         "numbers only please. ");
                  elementHandle[8].focus();
                  return false;
                  }
                  if(elementHandle[8].val().length != 4) {
                  elementHandle[8].addClass("error");
                  errorStatusHandle.text("The phone number must have exactly four digits")
                  elementHandle[8].focus();
                  return false;
                  }
                  if(isEmpty(elementHandle[9].val())) {
                  elementHandle[9].addClass("error");
                  errorStatusHandle.text("Please enter your email address");
                  elementHandle[9].focus();
                  return false;
                  }
                  if(!isValidEmail(elementHandle[9].val())) {
                  elementHandle[9].addClass("error");
                  errorStatusHandle.text("The email address appears to be invalid,");
                  elementHandle[9].focus();
                  return false;
                  }
                  if(isEmpty(elementHandle[10].val())) {
                  elementHandle[10].addClass("error");
                  errorStatusHandle.text("Please Enter Month");
                  elementHandle[10].focus();
                  return false;
                  }
                  if(!$.isNumeric(elementHandle[10].val())) {
                  elementHandle[10].addClass("error");
                  errorStatusHandle.text("Please Enter number for month");
                  elementHandle[10].focus();
                  return false;
                  }
                  if(isEmpty(elementHandle[11].val())) {
                  elementHandle[11].addClass("error");
                  errorStatusHandle.text("Please Enter Day");
                  elementHandle[11].focus();
                  return false;
                  }
                  if(!$.isNumeric(elementHandle[11].val())) {
                  elementHandle[11].addClass("error");
                  errorStatusHandle.text("Please Enter number for Day");
                  elementHandle[11].focus();
                  return false;
                  }
                  if(isEmpty(elementHandle[12].val())) {
                  elementHandle[12].addClass("error");
                  errorStatusHandle.text("Please Enter Year");
                  elementHandle[12].focus();
                  return false;
                  }
                  if(!$.isNumeric(elementHandle[12].val())) {
                  elementHandle[12].addClass("error");
                  errorStatusHandle.text("Please Enter number for year");
                  elementHandle[12].focus();
                  return false;
                  }
                  var isValidDOB = true;
                  if(!isValidDate()){
                  $('[name="month"]').addClass("error");
                  $('[name="date"]').addClass("error");
                  $('[name="year"]').addClass("error");
                  errorStatusHandle.text("Please Enter a valid date");
                  return false;
                  isValidDOB = false;
                  }
                  if(isValidDOB){
                  var date_of_birth = new Date();
                  date_of_birth.setMonth($('[name="month"]').val());
                  date_of_birth.setDate($('[name="date"]').val());
                  date_of_birth.setFullYear($('[name="year"]').val());
                  
                  var reference_date = new Date("December 4, 2016");
                  var years = reference_date.getFullYear() - date_of_birth.getFullYear();
                  var months = reference_date.getMonth() - date_of_birth.getMonth();
                  var days = reference_date.getDate() - date_of_birth.getDate();
                  
                  if(years > 75 || (years == 75 && months > 0) || (years == 75 && months == 0 && days > 0)) {
                  $('[name="month"]').addClass("error");
                  $('[name="date"]').addClass("error");
                  $('[name="year"]').addClass("error");
                  errorStatusHandle.text("Please Enter Valid Date of Birth");
                  return false;
                  }
                  if(years < 5 || (years == 5 && months < 0) || (years==5 && months == 0 && days < 0)) {
                  $('[name="month"]').addClass("error");
                  $('[name="date"]').addClass("error");
                  $('[name="year"]').addClass("error");
                  errorStatusHandle.text("Kid must be atleast 5 years old to take part in Marathon");
                  return false;
                  }
                  } 

                  return true;
                  }
                  
                  elementHandle[0].focus();
                  
                  elementHandle[0].on('blur', function() {
                                      if(isEmpty(elementHandle[0].val()))
                                      return;
                                      $(this).removeClass("error");
                                      errorStatusHandle.text("");
                                      });
                  
                  elementHandle[9].on('blur', function() {
                                      if(isEmpty(elementHandle[9].val()))
                                      return;
                                      if(isValidEmail(elementHandle[9].val())) {
                                      $(this).removeClass("error");
                                      errorStatusHandle.text("");
                                      }
                                      });        

                  
                  elementHandle[4].on('keyup', function() {
                                      elementHandle[4].val(elementHandle[4].val().toUpperCase());
                                      });
                  
                  elementHandle[6].on('keyup', function() {
                                      if(elementHandle[6].val().length == 3)
                                      elementHandle[7].focus();
                                      });
                  
                  elementHandle[7].on('keyup', function() {
                                      if(elementHandle[7].val().length == 3)
                                      elementHandle[8].focus();
                                      });            
                  
                  
                  $(':submit').on('click', function() {
                                  for(var i=0; i < 10; i++)
                                  elementHandle[i].removeClass("error");
                                  errorStatusHandle.text("");
                                  return isValidData();
                                  });
                  
                  $(':reset').on('click', function() {
                                 for(var i=0; i < 10; i++)
                                 elementHandle[i].removeClass("error");
                                 errorStatusHandle.text("");
                                 });                                       
                  });
