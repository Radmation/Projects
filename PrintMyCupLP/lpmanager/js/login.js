/**
 * Created by Radley.Anaya on 5/27/2016.
 */




// $("#login_btn").click( function () {
//
//     // e.preventDefault();
//     // $.getJSON( "http://charterschoollocator.com/includes/connect_db.php", function( data ) {
//     //
//     //     $.each( data, function( key, val ) {
//     //         alert(key);
//     //         alert(val);
//     //         // if(key == "option1"){
//     //         //     items1 = val + ''; // added the '' to make it a string
//     //         // }
//     //         // if(key == "option2") {
//     //         //     items2 = val + '';
//     //         // }
//     //
//     //     });
//     //     // var temp1 = items1.split(',');
//     //     // var temp2 = items2.split(',');
//     //
//     //     // for(var i = 0; i < temp1.length; i++){
//     //     //     $("#option1").append(temp1[i] + "\n");
//     //     // }
//     //     //
//     //     // for(var i = 0; i < temp2.length; i++){
//     //     //     $("#option2").append(temp2[i] + "\n");
//     //     // }
//     //
//     //
//     // });
//
//     $.ajax(
//         {
//             url : "http://charterschoollocator.com/includes/connect_db.php",
//             type: "POST",
//             data : $("#login-form").serialize(),
//             success:function(data)
//             {
//                 data = $.parseJSON( data );
//                 alert(data.logged_in); // false
//                 // if(data.status == 'success'){
//                 //     alert('login success success part');
//                 // } else {
//                 //     alert('login failed success part');
//                 // }
//
//                 // if success redirect to creator.php
//                 //data: return data from server
//                 // alert(data);
//                 //if fails show failed message
//                 //$("#login_form").append('<div class="alert alert-success" role="alert">Login Success..Redirecting</div>');
//
//             },
//             error: function(data)
//             {
//                 data = $.parseJSON( data );
//                 alert(data.logged_in);
//                 // alert(JSON.stringify(data));
//                 // alert('login fail error part');
//                 // alert(data);
//                 //if fails show failed message
//                 //$("#login_form").append('<div class="alert alert-warning" role="alert">Login Failed.</div>');
//
//             }
//         });
// });