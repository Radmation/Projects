///**
// * Created by Radley.Anaya on 9/25/2015.
// */
//
//
//
//function UpdatePrograms() {
//
//    if ($("#CampusId").val() == "2040CA01-9110-4191-9D86-3F51BAB59A26") {  //Brightwood College - Dayton
//        $("#CurriculumId option").remove();
//        $("#CurriculumId").append('<option selected="selected" value="0" label="Select Program">');
//        $("#CurriculumId").append('<option value="C843EA23-035A-4051-955F-134C59CFA51C">Dental Assistant</option>');
//        $("#CurriculumId").append('<option value="5F2A562C-35AD-41F1-909C-FCE8BFED164A">Electrical Technician</option>');
//        $("#CurriculumId").append('<option value="C50A39F3-5CD7-483F-B83E-4F3199D6420F">Heating, Ventilation, Air Conditioning and Refrigeration</option>');
//        $("#CurriculumId").append('<option value="C91B28AB-B1A7-46A5-A6DD-F8E50986C6E2">Kaplan Architecture and Engineering Education</option>');
//        $("#CurriculumId").append('<option value="49ED5D8E-3405-471D-876F-518544B4E214">Medical Assistant</option>');
//        $("#CurriculumId").append('<option value="015D067E-2E4B-4C0C-AFC7-313AAFF7B1AF">Nursing</option>');
//        $("#CurriculumId").append('<option value="5E5A43EC-9430-404C-84E5-D2CF245B47FE">Pharmacy Technician</option>');
//        $("#CurriculumId").append('<option value="F81E4CB9-3EF0-4786-A885-F7F8A410DC46">Phlebotomy Technician</option>');
//        $("#CurriculumId").append('<option value="14E1C421-E32E-4148-8414-6B0E7B111E40">Photographic Technology: Commercial Photography</option>');
//        $("#CurriculumId").append('<option value="8DFF36B0-3644-4E4E-96F5-BC8D0303CB79">Photographic Technology: General Applied Photography</option>');
//        $("#CurriculumId").append('<option value="3B436448-8771-419D-92B9-E259823769C8">Photographic Technology: Portrait Photography</option>');
//        $("#CurriculumId").append('<option value="18F8D780-958F-46DC-BADF-1597F687B32E">State Tested Nursing Assistant</option>');
//        //Brightwood College - Dayton
//    }
//
//    if ($("#CampusId").val() == "8A9A6E8E-35A2-4CAB-8F99-F4B92AC71F87") { //Brightwood Career Institute - Pittsburgh
//        $("#CurriculumId option").remove();
//        $("#CurriculumId").append('<option selected="selected" value="0" label="Select Program">');
//        $("#CurriculumId").append('<option value="7CBE2FE6-51EF-47E4-B80A-489ADD696C23">Business Administration</option>');
//        $("#CurriculumId").append('<option value="C2275684-087F-4B3F-AB3B-4B80BEF66B69">Computer Numerical Control Machinist</option>');
//        $("#CurriculumId").append('<option value="938EAFC8-5067-4A05-A135-415608F482DA">Criminal Justice</option>');
//        $("#CurriculumId").append('<option value="0EAB5041-1F87-460E-802E-370A4B6066C8">Electrical Technician</option>');
//        $("#CurriculumId").append('<option value="9B009261-7573-4D55-A741-C34395DBB446">Federal, State, and Local Payroll Tax Workshop</option>');
//        $("#CurriculumId").append('<option value="B6ABD16D-25D8-4BF8-AF98-E0F1AE667D9E">Heating, Ventilation, Air Conditioning and Refrigeration</option>');
//        $("#CurriculumId").append('<option value="F3408738-95B1-496A-9D83-43B1A6A72AC0">Medical Assisting</option>');
//        $("#CurriculumId").append('<option value="5CDC5C6B-45C1-4DC9-A7B7-63978D45C2D2">Medical Billing and Coding</option>');
//        $("#CurriculumId").append('<option value="E75FD997-A246-40DE-95F0-3AE671CAE06A">Medical Office Assistant</option>');
//        $("#CurriculumId").append('<option value="5EBF6FE5-3EC9-48BB-B790-0BE3C7765406">Occupational Therapy Assistant</option>');
//        $("#CurriculumId").append('<option value="9AD95615-954F-464B-B721-5C1091A8FD06">Practical Nursing</option>');
//        //Brightwood Career Institute - Pittsburgh
//    }
//
//    if ($("#CampusId").val() == "0") {
//        $("#CurriculumId option").remove();
//        $("#CurriculumId").append('<option selected="selected" value="0" label="Select Program">');
//    }
//}
//
//
//
//function UpdateContent(brand, campus, program) {
//    alert(brand + " " +  campus + " " + program);
//    //BRAND SWITCH
//    switch(brand) {
//        case 'BC':
//            break;
//        case 'BCI':
//            break;
//        default:
//    }
//    // CAMPUS SWITCH
//    switch(campus) {
//        case 'dayton':
//            break;
//        case 'pittsburgh':
//            break;
//    }
//    //PROGRAM SWITCH
//    switch(program) {
//
//    }
//    $('#copy').empty();
//    $('#copy').append('<h3>Electrical Technician (Diploma)</h3> <h5 class="dark_gray">Kaplan College - Dayton, OH</h5>'+
//
//
//    '<h4>Electrical Technician (Diploma)</h4>'+
//    '<p>Electricity is essential for light, power, air conditioning, refrigeration, and so many of the conveniences we take for granted every day. Electrical technicians install, connect, test, and maintain electrical systems that bring electricity from power generating plants to our homes, offices, schools, and places of business. In our electrical technician diploma program, you could acquire the knowledge, technical skills, and work habits you need to start a promising new career and become a qualified electrical technician. </p>'+
//       '<h4>A Hands-On Curriculum</h4>' +
//        '<p>Your training will emphasize compliance with National Electrical Codes and Occupational Safety and Health Administration (OSHA), as well as provide an overview of the basic fundamentals of electricity. In addition, specific electrical technician courses will focus on the following:</p>'+
//        '<ul>'+
//            '<li>How to add electrical capacity to meet growth requirements of a building </li>'+
//            '<li>Replacement of old systems and how to conduct periodic maintenance and repair of various systems and components </li>'+
//            '<li>Copper and aluminum cabling </li>'+
//            '<li>Residential, commercial, and industrial wiring, layout, motors, and controls </li>'+
//            '<li>Service mains and multiphase power </li>'+
//        '</ul>'+
//        '<p>'+
//        'With the constant building, restoration, and general maintenance needs in the construction industry, there is a need for qualified electricians. If you are looking to position yourself as a candidate for these jobs, then you have come to the right place.'+
//        '</p>'+
//        '<p>'+
//        'Electrical technicians generally specialize in construction, maintenance work, or both. Construction work provides the knowledge and technical skills such as installing wiring systems in new homes, businesses, and factories or rewiring or upgrading existing electrical systems. Maintenance work involves maintaining and upgrading existing electrical systems and repairing electrical equipment. Nearly two-thirds of electrical technicians are employed in the construction industry and the rest work as maintenance electricians in other industries or are self-employed.'+
//        '</p>'+
//        '<h4>Job Prospects for Electrical Technicians</h4>'+
//        '<p>'+
//        'Electrical services are required everywhere, so positions in the electrical field exist in all parts of the country. Many electrical technicians work as apprentices to gain the experience they need to get their careers started. At our school, you will get plenty of hands-on training in our labs, which simulate real-world work environments. Earning a diploma can give you the credentials that signify to employers that you have the electrical training and skills required to become a qualified electrical technician.'+
//        '</p>');
//
//
//}