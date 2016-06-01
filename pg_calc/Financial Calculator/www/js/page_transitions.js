/**
 * Created by Radley on 2/27/2016.
 */

// variables to store the details returned from the API
var first_name;
var last_name;
var email;
var password;

// THESE ARE EQUAL TO THE SERVERS RESPONSE
var bills;
var bill_array;

var user_details;


/*******************
 Create Click Function
 Create new account
 ********************/
$("#create_btn").click(function () {

    var apicaller = new Apicaller('APP001', '28e336ac6c9423d946ba02d19c6a2632', 'http://radmation.com/budget/');
    // get the values of the text boxes
    var first_name = $('#first_name').val();
    var last_name = $('#last_name').val();
    var email = $('#email_new').val();
    var password = $('#password_new').val();
    var password_confirm = $('#password_confirm').val();

    // validate form
    if (first_name == "" || last_name == "" || email == "" || password == "" || password_confirm == "") {
        alert('form fields cannot be empty');
    } else if (password != password_confirm) {
        alert('passwords dont match');
    } else {
        // todo: encrypt these
        var request_params = {
            "controller": "user",
            "action": "create",
            "first_name": first_name,
            "last_name": last_name,
            "email": email, // cache these
            "password": password
        };

        // getting bills here
        var json_data = apicaller.sendRequest(request_params); // returns object

        json_data.success(function (data) { // get object data like this
            //        var d = data;
            var message = $(".message");

            if (data.success == true) {
                alert("true");
            } else {
                alert("false");
            }

            //alert(JSON.stringify(data));

        }); // end success

        // show login page
        $.mobile.pageContainer.pagecontainer("change", "#login", {transition: "fade"});
    }

    // send data to api server


});

/*******************
    Enter Click Function
        Takes User Into the App
 2 requests here
    1st request get the user details
    2nd request get the users bills
********************/
$("#enter").click(function () {

    // create a new instance of the api caller class
    var apicaller = new Apicaller('APP001', '28e336ac6c9423d946ba02d19c6a2632', 'http://radmation.com/budget/');

    // get the email and password values from the text boxes
    var email = $("#email").val();
    var password = $("#password").val();

    // set local storage
    localStorage.setItem("email", email);
    localStorage.setItem("password", btoa(password)); // encoded password stored in local storage

    /****************
    * The first request Here
    * Get the users details from the API
    *****************/
    // set the request params to send to the api server - pass the username and password
    var request_params = {
        "controller": "user",
        "action": "read",
        "email": email, // cache these
        "password": password
    };
    // send the request and get the json back
    user_details = apicaller.sendRequest(request_params); // returns object
    // parse the json here
    user_details.success(function (data) {
        //if can log in go to logged in page
        user_details = data;
        if (data.success == true) {
            // each nested object needs a loop to get into it
            //the first nested object - {'user_id':'1'}

            if( data.data.user_id !== 0 || data.data.user_id !== '0'){

                //alert(JSON.stringify(data));

                // variables to store the details returned from the API
                first_name = data.data.first_name;
                last_name = data.data.last_name;
                email = data.data.email;
                password = data.data.password;


                $('#output_fn').html(first_name);
                $('#output_ln').html(last_name);



                $("#welcome_page").changePage();

                setTimeout(function () {
                    $("#overview_page").changePage();
                }, 2000);
            }

        } else {
            alert("false");
        }

        alert(JSON.stringify(user_details));

    });


    /****************
     * The second request Here
     * Get the users BILL details from the API
     *****************/

    request_params = {
        "controller": "bill",
        "action": "read",
        "email": email, // cache these
        "password": password
    };


    var bills = apicaller.sendRequest(request_params); // returns object
    bills.success(function (data) {
        bills = data;
        if (data.success == true) {
            $bills = data.data.bills; // array of bill objects
            $.each($bills, function ( index , element) {
                // variables to store the json data
                var bill_id = element.bill_id;
                var bill_name = element.bill_name;
                var frequency = element.frequency;
                var due_period = element.due_period;
                var every_x_days = element.every_x_days;
                var amount = element.amount;



                $('#overview_page').append('' +
                    '<div class="bill_item" data-number="' + index + '">' +
                    '<span id="bill_id">' + bill_id + '</span>' +
                    '<span id="bill_name">'+ bill_name +'</span>' +
                    '<span id="frequency">'+ frequency +'</span>' +
                    '<span id="due_period">'+ due_period +'</span>' +
                    '<span id="every_x_days">'+ every_x_days +'</span>' +
                    '<span id="amount">'+ amount +'</span>' +
                    '</div>' +
                    '');
            });


        }
        alert(JSON.stringify(bills));
    });

    // show the bill item that is first in the box

//bill_array.each( function (bill) {
//    alert();
//    alert(bill);
//});

}); // end login


/*********************
 * @param pageToChangeTo - id of page
 * @param delayTime - time in milliseconds
 * @constructor
 *********************/

function goNextPage1(pageToChangeTo, delayTime){
    setTimeout(nextPage(), delayTime);
    function nextPage(){
        $.mobile.changePage(pageToChangeTo, { transition: "fade", changeHash: false });
    }
}
// $("#welcome_page").changePageTo(0);
$.fn.changePage = function() {
    var pageToChangeTo = $(this);
    $.mobile.changePage(pageToChangeTo, { transition: "fade", changeHash: false });

};












