$(document).ready(function() {
    $('input[name="first_name"]').focus();
    
    $(':submit').on('click', function(e) {
        e.preventDefault();
        var params = "email="+$('#email').val();
        var url = "duplicate.php?"+params;
        $.get(url, dup_handler);
        });
    
    });
//Ashwathnarayana, Venkateshprasad  Account :  jadrn001 CS545, Fall 2016 Project 3
function dup_handler(response) {
    if(response == "dup"){
        $('#status').text("ERROR, Email Address already exists");
    }
    else{
        $('form').serialize();
        $('form').submit();
    }
    }