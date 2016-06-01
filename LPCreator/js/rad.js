/**
 * Created by Radley.Anaya on 5/26/2016.
 */

$(document).ready( function () {

    var items1 = "";
    var items2 = "";
    var heading_2_first = "";
    var heading_2_second = "";
    var para_first = "";
    var description = "";
    $.getJSON( "http://charterschoollocator.com/words.php", function( data ) {

        $.each( data, function( key, val ) {
            if(key == "option1"){
                items1 = val + ''; // added the '' to make it a string
            }
            if(key == "option2") {
                items2 = val + '';
            }
            if(key == "heading_2_first") {
                heading_2_first = val + '';
            }
            if(key == "heading_2_second") {
                heading_2_second = val + '';
            }
            if(key == "para_first") {
                para_first = val + '';
            }
            if(key == "description") {
                description = val + '';
            }

        });
        var temp1 = items1.split(',');
        var temp2 = items2.split(',');

        for(var i = 0; i < temp1.length; i++){
            $("#option1").append(temp1[i] + "\n");
        }

        for(var i = 0; i < temp2.length; i++){
            $("#option2").append(temp2[i] + "\n");
        }

        $("#heading_2_first").val(heading_2_first);
        $("#heading_2_second").val(heading_2_second);
        $("#para_first").val(para_first);
        $("#description").val(description);

        
    });



    $("#create").click( function () {
        alert($("#ajax-form").serialize());

        $.ajax(
            {
                url : "http://charterschoollocator.com/includes/create_json.php",
                type: "POST",
                data : $("#ajax-form").serialize(),
                success:function(data)
                {
                    //data: return data from server
                    alert(data);
                },
                error: function(jqXHR, textStatus, errorThrown)
                {
                    //if fails
                }
            });
    });

    // iframe Options Focus
    $( "#option1, #option2" ).focus(function() {
        // find the corresponding h2 in the iframe
        var iframe = $('iframe'); // or some other selector to get the iframe
        $("h1", iframe.contents()).addClass("focused");
    });

    $( "#option1, #option2" ).focusout(function() {
        // find the corresponding h2 in the iframe
        var iframe = $('iframe'); // or some other selector to get the iframe
        $("h1", iframe.contents()).removeClass("focused");
    });

    // iframe focus heading 2 first
    $( "#heading_2_first" ).focus(function() {
        // find the corresponding h2 in the iframe
        var iframe = $('iframe'); // or some other selector to get the iframe
        $("h2:first", iframe.contents()).addClass("focused").first();
    });

    $( "#heading_2_first" ).focusout(function() {
        // find the corresponding h2 in the iframe
        var iframe = $('iframe'); // or some other selector to get the iframe
        $("h2:first", iframe.contents()).removeClass("focused").first();
    });

    // iframe focus heading 2 first
    $( "#heading_2_second" ).focus(function() {
        // find the corresponding h2 in the iframe
        var iframe = $('iframe'); // or some other selector to get the iframe
        $("h2:last", iframe.contents()).addClass("focused").first();
    });

    $( "#heading_2_second" ).focusout(function() {
        // find the corresponding h2 in the iframe
        var iframe = $('iframe'); // or some other selector to get the iframe
        $("h2:last", iframe.contents()).removeClass("focused").first();
    });

    // iframe focus heading 2 first
    $( "#para_first" ).focus(function() {
        // find the corresponding h2 in the iframe
        var iframe = $('iframe'); // or some other selector to get the iframe
        $(".descriptor", iframe.contents()).addClass("focused").first();
    });

    $( "#para_first" ).focusout(function() {
        // find the corresponding h2 in the iframe
        var iframe = $('iframe'); // or some other selector to get the iframe
        $(".descriptor", iframe.contents()).removeClass("focused").first();
    });



});