<?php
/**
 * Created by PhpStorm.
 * User: Radley.Anaya
 * Development * Time: 11:25 AM
 *
 *
 * ******************************** DESCRIPTION ************************
 *
 *      GETS THE URL PARAMETERS AND SETS VARIABLES BASED ON VALUES
 *      SET VARIABLES THAT WILL BE ECHO'D OUT IN THE INDEX.PHP
 *
 * ******************************** DESCRIPTION ************************
 */


// ================================================================================================================ //
//                                VARIABLES THAT DO NOT CHANGE (not dynamic)                                        //
// ================================================================================================================ //
$facebook = "https://www.facebook.com/mediainstituteedu";
$twitter = "https://twitter.com/mmiedu";
$youtube = "https://www.youtube.com/user/MediaInstitute1";

// ================================================================================================================ //
//                           CHANGE THE ORDER OF THE CAMPUS IN THE SELECT BOX                                       //
//                        ***** echo'd out in index.html under select box *****                                     //
// ================================================================================================================ //
switch(@$_GET['id']) {
    case "Minneapolis":
        $Campus =   "<option name='CampusId' value='3BA21D5C-42A6-4EE9-BD35-024BA3D5C952'>Minneapolis, MN</option>".
                    "<option name='CampusId' value='CED13DA3-8C7E-471E-972F-D7684C8286E3'>Madison, WI</option>";
        break;
    case "Madison":
        $Campus =   "<option name='CampusId' value='CED13DA3-8C7E-471E-972F-D7684C8286E3'>Madison, WI</option>".
                    "<option name='CampusId' value='3BA21D5C-42A6-4EE9-BD35-024BA3D5C952'>Minneapolis, MN</option>";
        break;
    default:
        $Campus =   "<option name='CampusId' value=''>Select a Campus</option>".
                    "<option name='CampusId' value='CED13DA3-8C7E-471E-972F-D7684C8286E3'>Madison, WI</option>".
                    "<option name='CampusId' value='3BA21D5C-42A6-4EE9-BD35-024BA3D5C952'>Minneapolis, MN</option>";
} # end switch
// ================================================================================================================ //
//           ECHO OUT A SCRIPT THAT WILL SET THE VALUE OF THE SELECTED COURSE BASED ON URL STRING                   //
//        ***** MUST echo after the js script that gets all the available courses for the campus *****              //
//                                 grabbed from the url using $_GET[]                                               //
//                               URL IS PREDETERMINED AND MADE IN HOUSE                                             //
//                            the <script> selects an item from the options                                         //
// ================================================================================================================ //
switch(@$_GET['program']) {

    // ================================================================================================================ //
    //                                      Minneapolis Programs BELOW                                                  //
    // ================================================================================================================ //
    //Animation and Game Design
    case "AG":
        $Script_Program = "<script>$('#CurriculumId').val('24A728CB-9A99-450F-ADAC-3AFB32390055');</script>";
        break;
    //Audio and Recording Arts
    case "AU":
        $Script_Program = "<script>$('#CurriculumId').val('12ABB152-1780-43CC-866B-CCBFC73D7DEA');</script>";
        break;
    case "GD":
        $Script_Program = "<script>$('#CurriculumId').val('33D8C586-A298-4827-84FF-303EFC0E3A59');</script>";
        break;
    # not being used
    //Business in Media
#    case "BM":
#        $Script_Program = "<script>$('#CurriculumId').val('878A0898-00F4-4605-B6CF-236076688665');</script>";
#        break;
    //Mobile App Development Cert
//    case "MA":
//        $Script_Program = "<script>$('#CurriculumId').val('97AF9E29-2E7C-4874-912F-4F2366BE1954');</script>";
//        break;
    // ================================================================================================================ //
    //                                        Madison Programs BELOW                                                    //
    // ================================================================================================================ //
    # not being used
    //Associate Entertainment and Media Business
#    case "AE":
#        $Script_Program = "<script>$('#CurriculumId').val('3AEE0EC5-E984-42F2-88AD-C4BBD5C484FA');</script>";
#        break;
    //Digital Art and Design
    case "DAD":
        $Script_Program = "<script>$('#CurriculumId').val('3DF55BD8-1828-4FFE-A5B6-DD76FC56F12B');</script>";
        break;
    //Electronic and A/V Systems
//    case "ES":
//        $Script_Program = "<script>$('#CurriculumId').val('6FE0C552-5EC1-421D-B5D8-C57C572E11F0');</script>";
//        break;
    //Entertainment and Media Bus.
//    case "EM":
//        $Script_Program = "<script>$('#CurriculumId').val('58A5CE0B-9FB3-4EFD-AAE1-56404206461F');</script>";
//        break;
    //Game Art and Animation
    case "GA":
        $Script_Program = "<script>$('#CurriculumId').val('714DE80C-F0FC-4123-B6FC-77C692004DAA');</script>";
        break;
    //Independent Digital Film
//    case "IF":
//        $Script_Program = "<script>$('#CurriculumId').val('0088CC10-E9AA-4961-BF5E-2EECDE480B2B);</script>";
//        break;
    //Video and Motion Graphics
    case "VM":
        $Script_Program = "<script>$('#CurriculumId').val('D391CA4D-6C73-4414-8B84-EC6E5685DCAF');</script>";
        break;
    //Recording and Music Tech.
    case "RM":
        $Script_Program = "<script>$('#CurriculumId').val('A3D6CE5E-5AEF-47B8-B501-9680DAD5A0C2');</script>";
        break;
} # end switch

// ================================================================================================================ //
//             GET THE CAMPAIGN NAME FROM THE URL AND ECHO THAT OUT IN A HIDDEN FORM FIELD TO PASS TO POST          //
// ================================================================================================================ //
$C_Name = @$_GET['src'];

// example url   ?src=MI_SEM_G&id=Madison&program=DAD