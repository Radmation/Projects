<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script src="http://cloud.github.com/downloads/digitalBush/jquery.maskedinput/jquery.maskedinput-1.3.min.js"></script>
<script type="text/javascript" src="js/form_validation.js"></script>
<script type="text/javascript" src="js/curriculum.js"></script>
</head>


<form method="post" action="http://kellybrady.digital/public_html/submit_eca.php" onsubmit="return form_validation();">

    <select id="CampusId" name="CampusId"> <!-- CampusId -->
        <option value="0" label="Select Campus"> </option>
        <option value="2040CA01-9110-4191-9D86-3F51BAB59A26">OH - Dayton</option>
        <option value="8A9A6E8E-35A2-4CAB-8F99-F4B92AC71F87">PA - Pittsburgh</option>
    </select><br /><br />

    <select id="CurriculumId" style="width: 180px;" name="CurriculumId"> <!-- CurriculumId -->
        <option selected="selected" value="0" label="Select Program"></option>
    </select><br /><br />

    <label for FirstName>First Name</label>
    <input id="FirstName" name="FirstName" size="6" type="text" value="KBTest"><br /><br /> <!-- FirstName -->

    <label for LastName>Last Name</label>
    <input id="LastName" name="LastName" size="6" type="text" value="KBTest"><br /><br /> <!-- LastName -->

    <label for Email>Email</label>
    <input id="Email" name="Email" size="6" type="text" value="test@test.com"><br /><br /> <!-- Email -->

    <label for Phone1>Phone</label>
    <input id="Phone1" name="Phone1" size="6" type="text" value="5555555555"><br /><br /> <!-- Phone1 -->

    <label for CampaignName> this will be a hidden field for Campaign Name</label>

    <?php
    $c = trim($_GET['src'],"\/");
    if($c == "")
        $c = "KB_SEM_G";
    echo "<input type=\"text\" id=\"CampaignName\" name=\"CampaignName\" value=\"$c\" />\n"; 
    ?><br /><br /> <!-- CampaignName -->
    

    <input type="submit" value="Send It!" />



</form>
