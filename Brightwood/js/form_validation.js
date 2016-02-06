
function isEmail(string) {
    var filter = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i
    if (filter.test(string))
        return true;
    else {
        return false;
    }
}

      

function form_validation() {
    if ($('#CampusId').val() == 0) {
        alert("Please select campus");
        $('#CampusId').focus();
        return false;
    } else if ($('#CurriculumId').val() == 0) {
        alert("Please select program");
        $('#CurriculumId').focus();
        return false;
    } else if (!$('#FirstName').val()) {
        alert("Please enter first name");
        $('#FirstName').focus();
        return false;
    } else if (!$('#LastName').val()) {
        alert("Please enter last name");
        $('#LastName').focus();
        return false;
    } else if (!$('#Phone1').val()) {
        alert("Please enter phone number");
        $('#Phone1').focus();
        return false;
    } else if ($('#Phone1').val().length > 10) {
        alert("Please enter telephone number with numbers only");
        $('#Phone1').focus();
        return false;
    }else if ($('#Phone1').val().length < 10) {
        alert("Please enter entire phone number");
        $('#Phone1').focus();
        return false;
    } else if (!$('#Email').val()) {
        alert("Please enter email address");
        $('#Email').focus();
        return false;
    } else if (!isEmail($('#Email').val())) {
        alert("Please enter correct email format");
        $('#Email').focus();
        return false;
    }
}
