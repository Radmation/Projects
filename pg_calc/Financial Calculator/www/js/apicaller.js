/**
 * Created by Radley on 12/20/2015.
 */

var user_id = '';

var Apicaller = function (app_id, app_key, api_url) {
    this.app_id = app_id;
    this.app_key = app_key;
    this.api_url = api_url;
};

$.extend(Apicaller.prototype, {

    sendRequest: function (request_params) { // pass in array of associative parameters key = value
        // TODO add encryption
        //alert(request_params);
        var enc_app_key = this.app_key; // encrypt the app_key base64
        var enc_request = request_params;

        var params = {
            "app_id": this.app_id,
            "app_key": this.app_key,
            "enc_request": request_params
        };


        //params = JSON.stringify(params);

        return $.ajax({
            url: this.api_url,
            dataType: 'json',
            type: 'POST',
            data: params,
            success: function (data) {

                ////called when successful
                //$.each(data, function() {
                //    $.each(this, function(k, v) {
                //        $(".message").append('<li class="item">'+ v.bill_id + ' ' + v.bill_name + data.success +'</li>');
                //    });
                //});
                //$(".message").append('</ul>');
                //alert(JSON.stringify(data)); // JSON OBJECT
            },

            error: function (e) {
                //TODO failing here phone
                //called when there is an error
                //console.log(e.message);
                alert(e.message);
            }

        });

        // make ajax call to uri and return json
    },

    diameter: function () {
        return 2 * this.r;
    }
});


$("#enter").click(function () {

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

            $.each(data.data, function (k , v) {
                if( k = 'user_id'){
                    user_id = v;
                }
                if(user_id != 0){
                    $.mobile.pageContainer.pagecontainer("change", "#welcome_page", { transition: "fade"}).setTimeout( nextPage(), 555000);

                }
                 // get the user id to make other api calls | GLOBAL VAR
            });

            // show the logged in page


        } else {
            alert("false");
        }

        //alert(JSON.stringify(data));

    });


}); // end login

function nextPage(){
    $.mobile.pageContainer.pagecontainer("change", "#support_page", { transition: "fade"}) ;
}

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

        $.mobile.pageContainer.pagecontainer("change", "#login", {transition: "fade"});
    }

    // send data to api server


});


//login click function
//$("#enter").click( function () {
//
//    var change = false; // change page flag
//    var apicaller = new Apicaller('APP001', '28e336ac6c9423d946ba02d19c6a2632', 'http://radmation.com/budget/');
//    var username = $("#username").val();
//    var password = $("#password").val();
//
//    // TODO LOCAL STORAGE HERE WORKING!!
//    localStorage.setItem("username", username);
//    var expire = $.now() + (2*60*60*1000); // 2 hours in the future
//    localStorage.setItem("password", btoa(password)); // encoded password stored in local storage
//
//
//    var request_params = {
//        "controller": "bill",
//        "action" : "read",
//        "username" : username, // cache these
//        "userpass" : password
//    };
//
//    // getting bills here
//    var items = apicaller.sendRequest(request_params); // returns object
//
//    items.success(function (data){ // get object data like this
//        var d = data;
//        var message = $(".message");
//        if(data.success == true){
//
//            if(d.data.success === true){
//                message.empty();
//                message.append('<span class="title">Login Successful</span>');
//                message.append(d.data.message);
//                //show message
//                message.removeClass('hidden');
//                message.addClass('success');
//                change = true;
//
//                // add bills to bills page
//                var sbloss = "";
//                var sbgain = "";
//                sbloss += '<ul class="income_loss">';
//                sbgain += '<ul class="income_gain">';
//                $("#bills").append();
//                $.each(d.data, function() {
//                    $.each(this, function(k, v) {
//                        //$("#bills").append('<li><a href="#"  data-is_gain="'+v.is_gain+'" data-bill_id="'+v.bill_id+'">'+ v.bill_name + v.is_gain +'</a></li>');
//
//                        if(v.is_gain == 1){
//                            sbgain += '<li class="gain"><a href="#"  data-is_gain="'+v.is_gain+'" data-bill_id="'+v.bill_id+'">'+ v.bill_name + v.is_gain +'</a></li>';
//                        }else {
//                            sbloss += '<li class="loss"><a href="#"  data-is_gain="'+v.is_gain+'" data-bill_id="'+v.bill_id+'">'+ v.bill_name + v.is_gain +'</a></li>';
//                        }
//
//
//                    });
//                });
//                // bill_id user_id is_gain bill_name frequency due_period
//                sbloss += '</ul>';
//                sbgain += '</ul>';
//                $("#bills").append(sbloss);
//                $("#bills").append(sbgain);
//                // check to see if page can be changed
//                if(change === true) {
//                    $.mobile.pageContainer.pagecontainer("change", "#bills", { transition: "fade"});
//                } else {
//                    alert(change);
//                }
//
//
//            } else {
//                message.empty();
//                message.append('<span class="title">Login Unsuccessful</span>');
//                message.append(d.data.message);
//                //show message
//                message.removeClass('hidden');
//                message.addClass('error');
//            }
//            //$.each(data, function() {
//            //    $.each(this, function(k, v) {
//            //        message.append('<p class="item">'+ d.data.success + ' ' + v.bill_name + data.success +'</p>'); // get the message here
//            //    });
//            //});
//            alert(JSON.stringify(data));
//        } else {
//            //message.empty();
//
//        }
//    });
//
//
//
//}); // end login


// before page loads event
$(document).on("pagebeforeshow", "#home", function () { // When entering pagetwo
    // check to see if the local storage is set and if it is then put those values in the text boxes
    try {
        var email = localStorage.getItem("email");
        $("#email").val(email);
    } catch (e) {

    }

    try {
        var password = localStorage.getItem("password");
        $("#password").val(atob(password));
    } catch (e) {

    }

});




