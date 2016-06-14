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
            firstName: {
                required: true,
                minlength: 2
            },
            lastName: {
                required: true,
                minlength: 2
            },
            email: {
                required: true,
                email: true
            },
            phone: {
                required: true,
                phoneUS: true
            },
            address: {
                required: true,
                minlength: 2
            },
            zip: {
                zipcodeUS: true,
                required: true
            }
        }
    });

});

