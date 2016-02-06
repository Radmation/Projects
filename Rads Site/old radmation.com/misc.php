<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	
	<?
switch(@$_GET['id'])
{
	case "BauderCollege":
		$School = "Bauder College";
		$DisclosureLink = "www.bauder.edu/consumer-info";
		$AccreditationLink = "www.bauder.edu/accreditation";
		$PrivacyPolicyLink = "www.bauder.edu/privacy-policy/";
		$Logo = "bauder_college.png";
		$fbLink = "www.kaplancareerinstitute.com/privacy-policy/";
		$ytLink = "www.kaplancareerinstitute.com/privacy-policy/";
		$twLink = "www.kaplancareerinstitute.com/privacy-policy/";
		$websiteLink = "www.BauderCollege.com";
		break;			
	case "KaplanCareerInstitute":
		$School = "Kaplan Career Institute";
		$DisclosureLink = "www.kaplancareerinstitute.com/consumer-info";
		$AccreditationLink = "www.kaplancareerinstitute.com/accreditation";
		$PrivacyPolicyLink = "www.kaplancareerinstitute.com/privacy-policy/";
		$Logo = "kaplan_career_institute.png";
		$fbLink = "https://www.facebook.com/kaplancareerinstitute?fref=ts";
		$ytLink = "https://www.youtube.com/user/kaplancareerinst";
		$twLink = "https://www.twitter.com/Kaplan_KCI";
		$websiteLink = "www.kaplancareerinstitute.com";

		break;	
	case "TESSTCollege":
		$School = "TESST College of Technology";
		$DisclosureLink = "www.tesst.com/consumer-info";
		$AccreditationLink = "www.tesst.com/accreditation";
		$PrivacyPolicyLink = "www.tesst.com/privacy-policy/";
		$Logo = "tesst_college.png";
		$fbLink = "https://www.facebook.com/tesstcollege?fref=ts";
		$ytLink = "https://www.youtube.com/user/tesstcollege";
		$twLink = "https://twitter.com/TESSTCollege";
		$websiteLink = "www.tesst.com";
		break;
	case "TXSchoolBusn":
		$School = "Texas School of Business";
		$DisclosureLink = "www.tsb.edu/consumer-info";
		$AccreditationLink = "www.tsb.edu/accreditation";
		$PrivacyPolicyLink = "www.tsb.edu/privacy-policy/";
		$Logo = "texas_school_business.png";
		$fbLink = "https://www.facebook.com/txschoolbusiness?fref=ts";
		$ytLink = "https://www.youtube.com/user/txschoolofbusiness";
		$twLink = "https://twitter.com/txschoolbusn";
		$websiteLink = "www.tsb.edu";
		break;
	default:
		$School = "Kaplan College";
		$DisclosureLink = "www.kaplancollege.com/consumer-info";
		$AccreditationLink = "www.kaplancollege.com/accreditation";
		$PrivacyPolicyLink = "www.kaplancollege.com/privacy-policy/";
		$Logo = "kaplan_college.png";
		$fbLink = "https://www.facebook.com/kaplancollege";
		$ytLink = "https://www.youtube.com/user/kaplancollege";
		$twLink = "https://www.twitter.com/KaplanCollege";
		$websiteLink = "www.kaplancollege.com";
		break;									
}
?>
	
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/custom-style.css" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/blockui.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
<script src="js/validate.js"></script> 
<title>Thanks for Clicking!</title>
</head>

<body>
<section id="header">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="col-md-3 clearfix">
      <logo class="">
          <a href="#" class="btn"><img src="images/<? echo $Logo ?>" alt="logo" /></a> </logo></div>
        <div class="call col-md-5 col-sm-7 col-xs-12 txt_blue clearfix">
          <p>For more information or to enroll call
            <label><a href="tel:800.760.8641">800-760-8641</a></label>
          </p>
        </div>
        <div class="col-md-4  col-sm-5 col-xs-12 txt_blue clearfix">
        <div class="visit">
          <ul class=" pull-right">
            <li><? echo '<a href="http://'.$fbLink.'"><i class="fa fa-facebook"></i></a>' ?></li>
            <li><? echo '<a href="http://'.$ytLink.'"><i class="fa fa-youtube-play"></i></a>' ?></li>
            <li><? echo '<a href="http://'.$twLink.'"><i class="fa fa-twitter"></i></a>' ?></li>
          </ul>
          <p class="pull-left"><a href="<? echo $websiteLink ?>"> <span><b><? echo $websiteLink ?></b></span> </a></p></div>
        </div>
      </div>
    </div>
    <!--/.nav-collapse --> 
  </div>
</section>

<!--slider section-->

<section id="slideimg" class="clearfix">
<img src="images/slideimg.jpg" alt="slider" />
</section>
<!--slider section ends--> 
<!-------------------------------> 
<!---------------content section----------->
<section id="content">
  <div class="container">
    <div class="row"> 
      
      <!--left_con -->
      <div class=" col-md-12">
      <div class="col-md-7 left_con">
        <div class="headings">
          <h3 class=" txt_blue">Earn A Better Living… Enjoy A Better Life </h3>
          <h4 class=" txt_blue">6 Professional Jobs With A Great Future</h4>
        </div>
        <div class="col-md-12 paras">
          <p>There are many rewarding careers that don’t need years of college. Here are six, just for starters. All will have faster than average growth, according to the Federal Department of Labor. You could train for any of these in just 9-18 months!</p>


            <!--table edit -->

        <table class="table table-bordered">
      <thead>
        <tr>
          <th>Your New Career</th>
          <th>Projected “faster than average” job growth from 2012 through 2022 by U.S. Department of Labor</th>
          <th>Average Salary Per Year & Per Hour</th>
          <th>Your Training Time</th>
        </tr>
      </thead>
      <tbody>
        <tr class="active">
          <td>Like helping people?</td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <!-- Helping People Career Details -->
        <!-- Medical Assistant -->
        <tr>
          <td>Medical Assistant</td>
          <td>29%</td>
          <td>$29,370 per year $14.12 per hour</td>
          <td>Entry jobs: 9-10 month diploma program</td>
        </tr>
        <!-- Dental Assistant -->
        <tr>
            <td>Dental Assistant</td>
            <td>20%</td>
            <td>$29,320 per year $14.10 per hour</td>
            <td>9-10 month diploma program</td>
        </tr>
        <!-- Pharmacy Technician -->
        <tr>
            <td>Pharmacy Technician</td>
            <td>20%</td>
            <td>$34,500 per year $16.59 per hour</td>
            <td>9-10 month diploma program</td>
        </tr>
        <!-- Registered Nurse -->
        <tr>
            <td>Registered Nurse</td>
            <td>19%</td>
            <td>$65,470 per year $31.48 per hour</td>
            <td>Nursing Program Associate’s Degree: 18 months. Prepares you to seek to seek entry-level employment as a registered nurse (after passing NCLEX-RN licensing exam†)</td>
        </tr>
        <!-- End Medical Career Details -->
        <!-- Machine/Tech Career Details -->
        <tr class="active">
            <td>Like helping people?</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <!-- Registered Nurse -->
        <tr>
            <td>Heating, Air Conditioning, and Refrigeration Mechanics and Installers</td>
            <td>21%</td>
            <td>$43,640 per year $20.98 per hour</td>
            <td>9-10 month diploma program</td>
        </tr>
        <!-- End Machine/Tech Career Details -->
        <!-- Law Career Details -->
        <tr class="active">
            <td>Interested in law?</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <!-- Registered Nurse -->
        <tr>
            <td>Paralegal</td>
            <td>17%</td>
            <td>$46,990 per year $22.59 per hour</td>
            <td>Paralegal Studies Associate’s Degree: 18 months</td>
        </tr>


        <tr>
          <th>#</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Username</th>
        </tr>
      
      </tbody>
    </table>
    
             <div class="headings">
          <h4 class=" txt_blue">Tips to Choose the Right Career </h4>
          <p>There are many more exciting options than just the six we’ve shown here – and <? echo $School ?> has accredited programs for them all.  Just keep one tip in mind. Your odds of succeeding are so much better if you choose a career that best fits your natural personality and strengths.  Answering questions like these help put you on the right path:</p>
           <p><i>Do you love to help people − or do you feel more comfortable tinkering with machines or working on computers? 
Do you like a more routine, stable workplace where you keep the same schedule and perform the same types of tasks daily or a fast-moving whirlwind environment where no two days are ever alike?
Could you see yourself working from a desk or computer most of the day − or do you need to be more active?
</i></p>
        
        </div> 
        <div class="headings">
          <h4 class=" txt_blue">Get experienced guidance: Request Your Career Planning Session </h4>
          <p>When you meet with an experienced <? echo $School ?> Representative, he or she will learn more about your goals, likes and strengths. Together, you’ll explore the career choices that could best suit you. There’s no cost or obligation for this personalized help.</p>
           
        
        </div> 
        <div class="headings">
          <h4 class=" txt_blue">Book your Career Planning Session now</h4>
          <p>SOURCE: All job growth and salary data shown above is courtesy of Bureau of Labor Statistics, U.S. Department of Labor, Occupational Outlook Handbook, 2014-15 Edition. National long-term projections and salary averages may not reflect local and/or short-term economic or job conditions, and do not guarantee actual job growth or any particular salary.</p>
           
        
        </div> 
        </div>
        <div class="col-md-12 blue_block">
          <h4>You’ll never find a better time than right now to try <? echo $School ?>.</h4>
          <h3>Ask about our <? echo $School ?> risk-free trial! </h3>
        </div>
        <div class="arial_para clearfix">
       
          <p>For more information on our programs and their outcomes visit <? echo '<a href="http://'.$DisclosureLink.'">'.$DisclosureLink.'</a>' ?>. Programs vary by campus.
            <? echo $School ?> does not guarantee employment or career advancement.</p>
           <p>† The School cannot guarantee a student's eligibility either to take any exam or become certified, registered, or licensed. A student's eligibility may depend on his or her work experience, completion of high school or equivalent), not having a criminal record, meeting other licensure or certification requirements, or program or School itself having appropriate accreditation or licensure. Externship sites may themselves require criminal background check or medical examination.</p> 
        </div>
      </div>
      <!--left_con end--> 

      
      <!---------------> 
      
      <!--right_con -->
      <div class="col-md-5 right_con">
        <div class="form_block" id="ContactForm">
          <h1>Your FUTURE starts HERE! <span></span></h1>
          <div class="form">
            <div class="form-group"> 
              <!--<label for="exampleInputEmail1">Email address</label>-->
              <label for="FirstName"></label>
              <input type="text" class="form-control" id="FirstName" placeholder="First Name">
            </div>
            <div class="form-group"> 
              <!--<label for="exampleInputEmail1">Email address</label>-->
			  <label for="LastName"></label>
              <input type="text" class="form-control" id="LastName" placeholder="Last Name">
            </div>
            <div class="form-group"> 
              <!--<label for="exampleInputEmail1">Email address</label>-->
			  <label for="Email"></label>              
              <input type="email" class="form-control" id="Email" placeholder="Email">
            </div>
            <div class="form-group"> 
              <!--<label for="exampleInputEmail1">Email address</label>-->
 			  <label for="Phone1"></label>             
              <input type="phone" class="form-control" id="Phone1" placeholder="Phone Number">
            </div>
            <div class="select_block">
		     <input type="hidden" id="ClientId" name="ClientId" value="" />
			 <label for="CampusId"></label>	
              <select class="form-control" id="CampusId">
              </select>
              <label for="CurriculumId"></label>
              <select class="form-control" id="CurriculumId">
              </select>
            </div>
            <button type="submit" class="btn btn-success pull-right" id="SubmitButton">Submit</button>
            </div>
        </div>
        
        <div class="arial_para clearfix">
          <p>By submitting this form, I agree that Kaplan Higher Education Campuses (including TESST College and Texas School of Business) may contact me regarding educational services via email, telephone, text message or automated technology at the email address and phone numbers provided. I understand this consent is not required to attend any Kaplan institution. The Kaplan Higher Education Campuses <? echo '<a href="http://'.$PrivacyPolicyLink.'">privacy policy</a>' ?> governs the submission and handling of this data.
 *Additional academy training or education may be required for law enforcement positions. Applicants to the Criminal Justice Program in Texas will require additional TCOLE or other government agency approved training upon graduation to seek certain positions. **This is a non-credit course. For refund and complaint policies, please see the website. </p>
        </div>
      </div>
      </div>
      <!--right_con end --> 
    </div>
  </div>
</section>
</body>
</html>
