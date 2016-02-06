/**
 * Created by Radley.Anaya on 7/24/2015.
 */
// ===================================================================== //
//                   Using the validator plugin                          //
//            Documentation - http://jqueryvalidation.org/               //
//      Github Repo - https://github.com/jzaefferer/jquery-validation    //
// ===================================================================== //
$(document).ready(function () {



    $('#lead_form').validate({ // initialize the plugin
        rules: {
            CampusId: {
                required: true
            },
            CurriculumId:{
                required: true
            },
            FirstName: {
                required: true,
                minlength: 2
            },
            LastName: {
                required: true,
                minlength: 2
            },
            Email: {
                required: true,
                email: true
            },
            Phone1: {
                required: true,
                phoneUS: true
            },
            PostalCode: {
                zipcodeUS: true,
                required: true
            }
        }
    });

    //call custom optimizley event on successful form completion
    $("#lead_form").bind('ajax:complete', function() {
        window.optimizely = window.optimizely || [];
        window.optimizely.push(['trackEvent','pageLoad']);
    });

});

