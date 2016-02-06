/**
 * Created by Radley on 12/14/2015.
 */

// A $( document ).ready() block.
$( document ).ready(function() {


    $.ajax({
        url: "http://radmation.com/budget",
        dataType: "html",
        type: 'POST', //I want a type as POST
        data: "name=",
        success: function(data, textStatus, request){
            console.log('Data:' + data);
            console.log('Status: ' + textStatus);
            console.log('Response Headers: ' + request.getAllResponseHeaders());
        }
    });

});