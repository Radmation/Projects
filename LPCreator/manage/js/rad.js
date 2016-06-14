/**
 * Created by Radley.Anaya on 5/26/2016.
 */

$(document).ready(function () {

    var items1 = "";
    var items2 = "";

    var main_cta = "";
    var slider_p = "";
    var edit_button_1 = "";
    var first_h2 = "";
    var second_h2 = "";
    var first_p = "";
    var submit = "";
    var section2_heading = "";
    var sec2_paragraph = "";
    var one_description = "";
    var second_description = "";
    var third_description = "";
    var fourth_description = "";
    var fifth_description = "";
    var sixth_description = "";

    var description = "";

    $.getJSON("words.php", function (data) {

        $.each(data, function (key, val) {
            if (key == "option1") {
                items1 = val + ''; // added the '' to make it a string
            }
            if (key == "option2") {
                items2 = val + '';
            }
            if (key == "main_cta") {
                main_cta = val + '';
            }
            if (key == "slider_p") {
                slider_p = val + '';
            }
            if (key == "edit_button_1") {
                edit_button_1 = val + '';
            }
            if (key == "first_h2") {
                first_h2 = val + '';
            }
            if (key == "second_h2") {
                second_h2 = val + '';
            }

            if (key == "first_p") {
                first_p = val + '';
            }
            if (key == "submit") {
                submit = val + '';
            }
            if (key == "section2_heading") {
                section2_heading = val + '';
            }
            if (key == "sec2_paragraph") {
                sec2_paragraph = val + '';
            }
            if (key == "one_description") {
                one_description = val + '';
            }
            if (key == "second_description") {
                second_description = val + '';
            }
            if (key == "third_description") {
                third_description = val + '';
            }
            if (key == "fourth_description") {
                fourth_description = val + '';
            }
            if (key == "fifth_description") {
                fifth_description = val + '';
            }
            if (key == "sixth_description") {
                sixth_description = val + '';
            }
            if (key == "description") {
                description = val + '';
            }
        });
        var temp1 = items1.split(',');
        var temp2 = items2.split(',');

        for (var i = 0; i < temp1.length; i++) {
            $("#option1").append(temp1[i] + "\n");
        }

        for (var i = 0; i < temp2.length; i++) {
            $("#option2").append(temp2[i] + "\n");
        }

        $("#main_cta").val( main_cta );
        $("#slider_p").val(slider_p);
        $("#edit_button_1").val(edit_button_1);
        $("#first_h2").val(first_h2);
        $("#second_h2").val(second_h2);
        $("#first_p").val(first_p);
        $("#submit").val(submit);
        $("#section2_heading").val(section2_heading);
        $("#sec2_paragraph").val(sec2_paragraph);
        $("#1_description").val(one_description);
        $("#2_description").val(second_description);
        $("#3_description").val(third_description);
        $("#4_description").val(fourth_description);
        $("#5_description").val(fifth_description);
        $("#6_description").val(sixth_description);

        $("#description").val(description);


    });


    // $("#create").click(function () {
    //     //alert($("#ajax-form").serialize());
    //     $.ajax(
    //         {
    //             url: "includes/create_json.php",
    //             type: "POST",
    //             data: $("#ajax-form").serialize(),
    //             success: function (data) {
    //                 //data: return data from server
    //                 alert(data);
    //             },
    //             error: function (jqXHR, textStatus, errorThrown) {
    //                 //if fails
    //             }
    //         });
    // });

    // iframe Options Focus
    $("#option1, #option2").focus(function () {
        // find the corresponding h2 in the iframe
        var iframe = $('iframe'); // or some other selector to get the iframe
        $("h1", iframe.contents()).addClass("focused");
    });

    $("#option1, #option2").focusout(function () {
        // find the corresponding h2 in the iframe
        var iframe = $('iframe'); // or some other selector to get the iframe
        $("h1", iframe.contents()).removeClass("focused");
    });


    /****************
     *  STARTING HERE
     ****************/
    // MAIN CTA
    $("#main_cta").focus(function () {
        // find the corresponding h2 in the iframe
        var iframe = $('iframe'); // or some other selector to get the iframe
        $(".sub-slider-text", iframe.contents()).addClass("focused").first();
    });
    $("#main_cta").focusout(function () {
        // find the corresponding h2 in the iframe
        var iframe = $('iframe'); // or some other selector to get the iframe
        $(".sub-slider-text", iframe.contents()).removeClass("focused").first();
    });
    // END MAIN CTA

    // SLIDER-P
    $("#slider_p").focus(function () {
        // find the corresponding h2 in the iframe
        var iframe = $('iframe'); // or some other selector to get the iframe
        $(".slider_p", iframe.contents()).addClass("focused").first();
    });
    $("#slider_p").focusout(function () {
        // find the corresponding h2 in the iframe
        var iframe = $('iframe'); // or some other selector to get the iframe
        $(".slider_p", iframe.contents()).removeClass("focused").first();
    });
    // END SLIDER-P

    // MAIN BUTTON CTA
    $("#edit_button_1").focus(function () {
        // find the corresponding h2 in the iframe
        var iframe = $('iframe'); // or some other selector to get the iframe
        $(".edit_button_1", iframe.contents()).addClass("focused").first();
    });
    $("#edit_button_1").focusout(function () {
        // find the corresponding h2 in the iframe
        var iframe = $('iframe'); // or some other selector to get the iframe
        $(".edit_button_1", iframe.contents()).removeClass("focused").first();
    });
    // END MAIN BUTTON CTA

    // FIRST  H2
    $("#first_h2").focus(function () {
        // find the corresponding h2 in the iframe
        var iframe = $('iframe'); // or some other selector to get the iframe
        $("#first_h2", iframe.contents()).addClass("focused").first();
    });
    $("#first_h2").focusout(function () {
        // find the corresponding h2 in the iframe
        var iframe = $('iframe'); // or some other selector to get the iframe
        $("#first_h2", iframe.contents()).removeClass("focused").first();
    });
    // END FIRST  H2

    // SECOND H2
    $("#second_h2").focus(function () {
        // find the corresponding h2 in the iframe
        var iframe = $('iframe'); // or some other selector to get the iframe
        $("#second_h2", iframe.contents()).addClass("focused").first();
    });
    $("#second_h2").focusout(function () {
        // find the corresponding h2 in the iframe
        var iframe = $('iframe'); // or some other selector to get the iframe
        $("#second_h2", iframe.contents()).removeClass("focused").first();
    });
    // END SECOND H2

    // FIRST P
    $("#first_p").focus(function () {
        // find the corresponding h2 in the iframe
        var iframe = $('iframe'); // or some other selector to get the iframe
        $("#first_p", iframe.contents()).addClass("focused").first();
    });
    $("#first_p").focusout(function () {
        // find the corresponding h2 in the iframe
        var iframe = $('iframe'); // or some other selector to get the iframe
        $("#first_p", iframe.contents()).removeClass("focused").first();
    });
    // END FIRST P

    // FIRST P
    $("#submit").focus(function () {
        // find the corresponding h2 in the iframe
        var iframe = $('iframe'); // or some other selector to get the iframe
        $("#submit", iframe.contents()).addClass("focused").first();
    });
    $("#submit").focusout(function () {
        // find the corresponding h2 in the iframe
        var iframe = $('iframe'); // or some other selector to get the iframe
        $("#submit", iframe.contents()).removeClass("focused").first();
    });
    // END FIRST P

    /****************************
     *        SECTION 2
     **************************/

    // SECTION 2 HEADING
    $("#section2_heading").focus(function () {
        // find the corresponding h2 in the iframe
        var iframe = $('iframe'); // or some other selector to get the iframe
        $("#section2_heading", iframe.contents()).addClass("focused").first();
    });
    $("#section2_heading").focusout(function () {
        // find the corresponding h2 in the iframe
        var iframe = $('iframe'); // or some other selector to get the iframe
        $("#section2_heading", iframe.contents()).removeClass("focused").first();
    });
    // END SECTION 2 HEADING

    // SECTION 2 DESCRIPTOR
    $("#sec2_paragraph").focus(function () {
        // find the corresponding h2 in the iframe
        var iframe = $('iframe'); // or some other selector to get the iframe
        $("#sec2_paragraph", iframe.contents()).addClass("focused").first();
    });
    $("#sec2_paragraph").focusout(function () {
        // find the corresponding h2 in the iframe
        var iframe = $('iframe'); // or some other selector to get the iframe
        $("#sec2_paragraph", iframe.contents()).removeClass("focused").first();
    });
    // END SECTION 2 HEADING

    // Descriptions!! THIS IS THE DESCRIPTIONS IN ORDER
    $("#1_description").focus(function () {
        // find the corresponding h2 in the iframe
        var iframe = $('iframe'); // or some other selector to get the iframe
        $("#1_description", iframe.contents()).addClass("focused").first();
    });
    $("#1_description").focusout(function () {
        // find the corresponding h2 in the iframe
        var iframe = $('iframe'); // or some other selector to get the iframe
        $("#1_description", iframe.contents()).removeClass("focused").first();
    });
    // END SECTION 2 HEADING
    // Descriptions!! THIS IS THE DESCRIPTIONS IN ORDER
    $("#2_description").focus(function () {
        // find the corresponding h2 in the iframe
        var iframe = $('iframe'); // or some other selector to get the iframe
        $("#2_description", iframe.contents()).addClass("focused").first();
    });
    $("#2_description").focusout(function () {
        // find the corresponding h2 in the iframe
        var iframe = $('iframe'); // or some other selector to get the iframe
        $("#2_description", iframe.contents()).removeClass("focused").first();
    });
    // END SECTION 2 HEADING
    // Descriptions!! THIS IS THE DESCRIPTIONS IN ORDER
    $("#3_description").focus(function () {
        // find the corresponding h2 in the iframe
        var iframe = $('iframe'); // or some other selector to get the iframe
        $("#3_description", iframe.contents()).addClass("focused").first();
    });
    $("#3_description").focusout(function () {
        // find the corresponding h2 in the iframe
        var iframe = $('iframe'); // or some other selector to get the iframe
        $("#3_description", iframe.contents()).removeClass("focused").first();
    });
    // END SECTION 2 HEADING
    // Descriptions!! THIS IS THE DESCRIPTIONS IN ORDER
    $("#4_description").focus(function () {
        // find the corresponding h2 in the iframe
        var iframe = $('iframe'); // or some other selector to get the iframe
        $("#4_description", iframe.contents()).addClass("focused").first();
    });
    $("#4_description").focusout(function () {
        // find the corresponding h2 in the iframe
        var iframe = $('iframe'); // or some other selector to get the iframe
        $("#4_description", iframe.contents()).removeClass("focused").first();
    });
    // END SECTION 2 HEADING
    // Descriptions!! THIS IS THE DESCRIPTIONS IN ORDER
    $("#5_description").focus(function () {
        // find the corresponding h2 in the iframe
        var iframe = $('iframe'); // or some other selector to get the iframe
        $("#5_description", iframe.contents()).addClass("focused").first();
    });
    $("#5_description").focusout(function () {
        // find the corresponding h2 in the iframe
        var iframe = $('iframe'); // or some other selector to get the iframe
        $("#5_description", iframe.contents()).removeClass("focused").first();
    });
    // END SECTION 2 HEADING
    // Descriptions!! THIS IS THE DESCRIPTIONS IN ORDER
    $("#6_description").focus(function () {
        // find the corresponding h2 in the iframe
        var iframe = $('iframe'); // or some other selector to get the iframe
        $("#6_description", iframe.contents()).addClass("focused").first();
    });
    $("#6_description").focusout(function () {
        // find the corresponding h2 in the iframe
        var iframe = $('iframe'); // or some other selector to get the iframe
        $("#6_description", iframe.contents()).removeClass("focused").first();
    });
    // END SECTION 2 HEADING

    /****************************
     *        SECTION 3 NOT USING ATM !!!!!!!!!!!!!!!!!!!!!
     **************************/

    // SECTION 3 HEADING
    $("#sec_3_heading").focus(function () {
        // find the corresponding h2 in the iframe
        var iframe = $('iframe'); // or some other selector to get the iframe
        $("#sec_3_heading", iframe.contents()).addClass("focused").first();
    });
    $("#sec_3_heading").focusout(function () {
        // find the corresponding h2 in the iframe
        var iframe = $('iframe'); // or some other selector to get the iframe
        $("#sec_3_heading", iframe.contents()).removeClass("focused").first();
    });
    // END SECTION 3 HEADING

    // SECTION 3 SUB HEADING
    $("#sec2_sub_head").focus(function () {
        // find the corresponding h2 in the iframe
        var iframe = $('iframe'); // or some other selector to get the iframe
        $("#sec2_sub_head", iframe.contents()).addClass("focused").first();
    });
    $("#sec2_sub_head").focusout(function () {
        // find the corresponding h2 in the iframe
        var iframe = $('iframe'); // or some other selector to get the iframe
        $("#sec2_sub_head", iframe.contents()).removeClass("focused").first();
    });
    // END SECTION 3 SUB HEADING


});