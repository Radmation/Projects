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



$("#create_btn").click(function () {

    var apicaller = new Apicaller('APP001', '28e336ac6c9423d946ba02d19c6a2632', 'http://kb-demos.com/app/api/');
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




