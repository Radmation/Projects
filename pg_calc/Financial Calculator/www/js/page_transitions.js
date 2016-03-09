/**
 * Created by Radley on 2/27/2016.
 */


/*******************
    Enter Click Function
        Takes User Into the App
********************/
$("#enter").click(function () {

    alert();

    // create a new instance of the api caller class
    var apicaller = new Apicaller('APP001', '28e336ac6c9423d946ba02d19c6a2632', 'http://radmation.com/budget/');

    // get the email and password values from the text boxes
    var email = $("#email").val();
    var password = $("#password").val();

    // TODO LOCAL STORAGE HERE WORKING!!
    localStorage.setItem("email", email);
    //var expire = $.now() + (2 * 60 * 60 * 1000); // 2 hours in the future
    localStorage.setItem("password", btoa(password)); // encoded password stored in local storage

    // set the request params to send to the api server
    var request_params = {
        "controller": "user",
        "action": "read",
        "email": email, // cache these
        "password": password
    };

    // send the request and get the json back
    var items = apicaller.sendRequest(request_params); // returns object

    // parse the json here
    // {'data' : {MY STUFF HERE}, 'success': 'true'}
    items.success(function (data) {
        //if can log in go to logged in page
        if (data.success == true) {
            // each nested object needs a loop to get into it
            //the first nested object - {'user_id':'1'}

            if( data.data.user_id !== 0 || data.data.user_id !== '0'){

                //alert(JSON.stringify(data));

                var first_name = data.data.first_name;
                var last_name = data.data.last_name;
                var email = data.data.email;
                var password = data.data.password;

                $('#output_fn').html(first_name);
                $('#output_ln').html(last_name);


                /***********
                * Get all other bill data here
                ************/
                // set the request params to send to the api server

                $("#welcome_page").changePage();

                setTimeout(function () {
                    $("#overview_page").changePage();
                }, 2000);
            }

        } else {
            alert("false");
        }

        alert(JSON.stringify(data));

    });

    request_params = {
        "controller": "bill",
        "action": "read",
        "email": email, // cache these
        "password": password
    };

    // send the request and get the json back
    // TODO WORKING HERE!!!!!!!!!!
    var bills = apicaller.sendRequest(request_params); // returns object
    bills.success(function (data) {
        if (data.success == true) {
            $bills = data.data.bills; // array of bill objects
            $.each($bills, function ( index , element) {
                alert(element.bill_id);
                $('#overview_page').append('<div data-bill_id="' + element.bill_id + '"><span id="bill_name">'+element.bill_name+'</span></div>');
            });


        }
        alert(JSON.stringify(data));
    });



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












