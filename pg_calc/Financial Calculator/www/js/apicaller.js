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




