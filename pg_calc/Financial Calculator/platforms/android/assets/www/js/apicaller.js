/**
 * Created by Radley on 12/20/2015.
 */


var Apicaller = function(app_id, app_key, api_url) {
    this.app_id = app_id;
    this.app_key = app_key;
    this.api_url = api_url;
}

$.extend(Apicaller.prototype, {

    sendRequest: function(request_params) { // pass in array of associative parameters key = value
        // TODO add encryption
        //alert(request_params);
        var enc_app_key = this.app_key; // encrypt the app_key base64
        var enc_request = request_params;

        var params = {
            "app_id" : this.app_id,
            "app_key" : this.app_key,
            "enc_request" : request_params
        };


        //params = JSON.stringify(params);

        return $.ajax({
            url: this.api_url,
            dataType: 'json',
            type: 'POST',
            data: params,
            success: function(data) {

                ////called when successful
                //$.each(data, function() {
                //    $.each(this, function(k, v) {
                //        $(".message").append('<li class="item">'+ v.bill_id + ' ' + v.bill_name + data.success +'</li>');
                //    });
                //});
                //$(".message").append('</ul>');
                //alert(JSON.stringify(data)); // JSON OBJECT
            },

            error: function(e) {
                //called when there is an error
                //console.log(e.message);
                alert('not working');
            }

        });

        // make ajax call to uri and return json
    },

    diameter: function() {
        return 2 * this.r;
    }
});


//login click function
$("#enter").click( function () {

    var change = false; // change page flag
    var apicaller = new Apicaller('APP001', '28e336ac6c9423d946ba02d19c6a2632', 'http://radmation.com/budget/');
    var username = $("#username").val();
    var password = $("#password").val();

    // TODO LOCAL STORAGE HERE WORKING!!
    localStorage.setItem("username", username);
    var expire = $.now() + (2*60*60*1000); // 2 hours in the future
    localStorage.setItem("password", btoa(password)); // encoded password stored in local storage


    var request_params = {
        "controller": "bill",
        "action" : "read",
        "username" : username, // cache these
        "userpass" : password
    };

    // getting bills here
    var items = apicaller.sendRequest(request_params); // returns object

    items.success(function (data){ // get object data like this
        var d = data;
        var message = $(".message");
        if(data.success == true){

            if(d.data.success === true){
                message.empty();
                message.append('<span class="title">Login Successful</span>');
                message.append(d.data.message);
                //show message
                message.removeClass('hidden');
                message.addClass('success');
                change = true;

                // add bills to bills page
                var sbloss = "";
                var sbgain = "";
                sbloss += '<ul class="income_loss">';
                sbgain += '<ul class="income_gain">';
                $("#bills").append();
                $.each(d.data, function() {
                    $.each(this, function(k, v) {
                        //$("#bills").append('<li><a href="#"  data-is_gain="'+v.is_gain+'" data-bill_id="'+v.bill_id+'">'+ v.bill_name + v.is_gain +'</a></li>');

                        if(v.is_gain == 1){
                            sbgain += '<li class="gain"><a href="#"  data-is_gain="'+v.is_gain+'" data-bill_id="'+v.bill_id+'">'+ v.bill_name + v.is_gain +'</a></li>';
                        }else {
                            sbloss += '<li class="loss"><a href="#"  data-is_gain="'+v.is_gain+'" data-bill_id="'+v.bill_id+'">'+ v.bill_name + v.is_gain +'</a></li>';
                        }


                    });
                });
                // bill_id user_id is_gain bill_name frequency due_period
                sbloss += '</ul>';
                sbgain += '</ul>';
                $("#bills").append(sbloss);
                $("#bills").append(sbgain);
                // check to see if page can be changed
                if(change === true) {
                    $.mobile.pageContainer.pagecontainer("change", "#bills", { transition: "fade"});
                } else {
                    alert(change);
                }


            } else {
                message.empty();
                message.append('<span class="title">Login Unsuccessful</span>');
                message.append(d.data.message);
                //show message
                message.removeClass('hidden');
                message.addClass('error');
            }
            //$.each(data, function() {
            //    $.each(this, function(k, v) {
            //        message.append('<p class="item">'+ d.data.success + ' ' + v.bill_name + data.success +'</p>'); // get the message here
            //    });
            //});
            alert(JSON.stringify(data));
        } else {
            //message.empty();

        }
    });



}); // end login


// before page loads event
$(document).on("pagebeforeshow","#login",function(){ // When entering pagetwo
    // check to see if the local storage is set and if it is then put those values in the text boxes
    try{
        var username = localStorage.getItem("username");
        $("#username").val(username);
    }catch(e){

    }

    try{
        var password = localStorage.getItem("password");
        $("#password").val(atob(password));
    }catch(e){

    }

});




