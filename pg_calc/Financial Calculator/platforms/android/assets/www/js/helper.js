/**
 * Created by Radley on 12/20/2015.
 */



$("#red_btn").click( function() {
    // change the source to if it is inactive or if it is active to the opposite.
    // get the source
    var red_src  = $(this).attr("src");
    var green_btn = $("#green_btn");
    var green_src = green_btn.attr("src");

    if(red_src == "images/red_active_btn.png"){
        //$(this).attr("src", "images/red_inactive_btn.png");
        // change green to active
        //green_btn.attr("src", "images/green_active_btn.png");
    }else {
        $(this).attr("src", "images/red_active_btn.png");
        green_btn.attr("src", "images/green_inactive_btn.png");
    }

});

$("#green_btn").click( function() {
    // change the source to if it is inactive or if it is active to the opposite.
    // get the source
    var green_src  = $(this).attr("src");
    var red_btn = $("#red_btn");

    if(green_src == "images/green_active_btn.png"){
        //$(this).attr("src", "images/red_inactive_btn.png");
        // change green to active
        //green_btn.attr("src", "images/green_active_btn.png");
    }else {
        $(this).attr("src", "images/green_active_btn.png");
        red_btn.attr("src", "images/red_inactive_btn.png");
    }

});