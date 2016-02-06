/**
 * Created by Radley.Anaya on 7/20/2015.
 */


updatePrograms();


$('#CampusId').change(function () {
   updatePrograms();
});

// =================================================================================================//
//                            UPDATES THE ADDRESS AND PHONE NUMBER                                  //
//                    ***** call this method in the update programs *****                           //
// =================================================================================================//
function updateAddress(campus) {
    // Get the content html that needs changing
    // Vars that change
    var address = $('.address');
    var school_name = $('#school_name');
    var address1 = $('#address1');
    var address2 = $('#address2');
    var phone_num = $('.phone_num');
    var phone_num_a = $('#phone_number_a');

    switch(campus){
        case 'Minneapolis, MN':
            address.fadeOut('fast', function () {
                school_name.html('Minneapolis Media Institute');
                address1.html('4100 West 76th St.');
                address2.html('Edina, MN 55435');
                phone_num.html('1-866-701-1310');
                address.fadeIn('fast');
            });
            phone_num_a.attr('href', 'tel:1-844-265-8383'); //dynamic href attribute to call ** SAME ATM
            break;
        case 'Madison, WI':
            address.fadeOut('fast', function () {
                school_name.html('Madison Media Institute');
                address1.html('2702 Agriculture Drive');
                address2.html('Madison, WI 53718');
                phone_num.html('1-800-236-4997');
                address.fadeIn('fast');
            });
            phone_num_a.attr('href', 'tel:1-844-265-8383'); //dynamic href attribute to call ** SAME ATM
            break;
        default:

    }

}

function updatePrograms() {
    var campus = $('#CampusId option:selected').html();
    var curriculum = $("#CurriculumId");
    switch (campus) {
        case 'Minneapolis, MN':
            curriculum.empty(); //empty the curriculum list
            curriculum.append("<option name='CurriculumId' value=''>Select a Program</option>");
            curriculum.append("<option name='CurriculumId' value='24A728CB-9A99-450F-ADAC-3AFB32390055'>Animation and Game Design</option>");
            curriculum.append("<option name='CurriculumId' value='12ABB152-1780-43CC-866B-CCBFC73D7DEA'>Audio and Recording Arts</option>");
            curriculum.append("<option name='CurriculumId' value='33D8C586-A298-4827-84FF-303EFC0E3A59'>Graphic Design</option>");
            //curriculum.append("<option name='CurriculumId' value='878A0898-00F4-4605-B6CF-236076688665'>Business in Media</option>");
            //curriculum.append("<option name='CurriculumId' value='97AF9E29-2E7C-4874-912F-4F2366BE1954'>Mobile App Development Cert</option>");

            updateAddress('Minneapolis, MN');

            break;
        case 'Madison, WI':
            curriculum.empty(); //empty the curriculum list
            curriculum.append("<option name='CurriculumId' value=''>Select a Program</option>");
            //curriculum.append("<option name='CurriculumId' value='3AEE0EC5-E984-42F2-88AD-C4BBD5C484FA'>Associate Entertainment and Media Business</option>");
            curriculum.append("<option name='CurriculumId' value='3DF55BD8-1828-4FFE-A5B6-DD76FC56F12B'>Digital Art and Design</option>");
            //curriculum.append("<option name='CurriculumId' value='6FE0C552-5EC1-421D-B5D8-C57C572E11F0'>Electronic and A/V Systems</option>");
            //curriculum.append("<option name='CurriculumId' value='58A5CE0B-9FB3-4EFD-AAE1-56404206461F'>Entertainment and Media Bus.</option>");
            curriculum.append("<option name='CurriculumId' value='714DE80C-F0FC-4123-B6FC-77C692004DAA'>Game Art and Animation</option>");
            //curriculum.append("<option name='CurriculumId' value='0088CC10-E9AA-4961-BF5E-2EECDE480B2B'>Independent Digital Film</option>");
            curriculum.append("<option name='CurriculumId' value='D391CA4D-6C73-4414-8B84-EC6E5685DCAF'>Video and Motion Graphics</option>");
            curriculum.append("<option name='CurriculumId' value='A3D6CE5E-5AEF-47B8-B501-9680DAD5A0C2'>Recording and Music Tech.</option>");

            updateAddress('Madison, WI');

            break;
        default:
            curriculum.empty(); //empty the curriculum list
    } // end switch
    updatePageContent(); // change the dynamic content
}

// =================================================================================================//
//                    UPDATES ALL THE DYNAMIC CONTENT ON THE PAGE WITH FADE EFFECT                  //
//                          ***** call this method last on the page *****                           //
// =================================================================================================//
function updatePageContent() {
    var cur = $('#CurriculumId option:selected').html();
    var program_title = $('#program_title');
    var banner_text = $('.banner_text');
    var bluecta = $('.cta_blue');
    var formcta = $('#form_cta');
    var header_img = $('#header_img');
    // Vars for description
    var first_block = $('#first_block');
    var points= $('#points');
    var second_block = $('#second_block');
    console.log(cur);
    switch (cur) {
        // =================================================================================================//
        //                                         Generic Program Description                              //
        // =================================================================================================//
        case 'Select a Program':
            // PROGRAM TITLE
            program_title.fadeOut('fast', function () {
                program_title.html('Get Started Today!');                                 // TITLE TEXT
                program_title.fadeIn('fast');
            });
            // BANNER TEXT - ENROLL
            banner_text.fadeOut('fast', function () {
                banner_text.html('ENROLL');                                               // BANNER TEXT
                banner_text.fadeIn('fast');
            });
            // FORM HEAD CTA
            formcta.fadeOut('fast', function () {
                formcta.html('Sound Interesting? Learn More!');                           // FORM TEXT
                formcta.fadeIn('fast');
            });
            // BLUE CTA
            bluecta.fadeOut('fast', function () {
                bluecta.html('TURN YOUR PASSION INTO YOUR CAREER! APPLY TODAY!');         // BLUE TEXT
                bluecta.fadeIn('fast');
            });

            // Header Image
            header_img.fadeOut('fast', function () {
                header_img.attr('src', 'images/StudentsFrontFull.jpg');
                header_img.fadeIn('fast');
            });
            // ======== COURSE DESCRIPTION TEXT =======//
            // First Block
            first_block.fadeOut('fast', function () {
                first_block.html("If you're searching for a media school where you can receive " +
                "<span class='stand_out_blue'>hands-on</span> career training, look no further. At MMI, the Madison or Minneapolis Media Institute, we've got the equipment, facilities, and industry professionals to help prepare you for " +
                "<span class='stand_out_blue'>professional success</span>. We offer programs* in a variety of media studies, designed for creative individuals looking to " +
                "<span class='stand_out_blue'>start a career path</span> involving new media. At the Media Institute, you can get the education you'll need to work in:");                          // BLUE TEXT
                first_block.fadeIn('fast');
            });
            // Points
            points.fadeOut('fast', function () {
                points.html('<li>Graphic Design</li>' +
                    '<li>Web Design</li>' +
                    '<li>Music Production</li>' +
                    '<li>Audio Recording</li>' +
                    '<li>Game Design</li>' +
                    '<li>Animation</li>' +
                    '<li>Video Production</li>' +
                    '<li>Talent Management</li>' +
                    '<li>Audiovisual Systems</li>'
                );
                points.fadeIn('fast');
            });
            // Second Block
            second_block.fadeOut('fast', function () {
                second_block.html("We offer Associate of Applied Science, Associate of Applied Arts, and Bachelor of Science degrees. The school was established in Madison, WI, in 1969 and expanded to include a campus in Minneapolis, MN, in 2009. From the beginning our goal has been to provide you with the training, skills, and experience you'll need to become a critical part of the " +
                "<span class='stand_out_blue'>next media revolution.</span> You have to start to finish! Learn more and enroll today." +
                "<br><small><i>*Not all programs are offered at both campuses.</i></small>");                          // BLUE TEXT
                second_block.fadeIn("fast");
            });
            break;
        // =================================================================================================//
        //                                         *Animation and Game Design*                              //
        // =================================================================================================//
        case 'Animation and Game Design':
            // PROGRAM TITLE
            program_title.fadeOut('fast', function () {
                program_title.html('Animation & Game Design');                           // TITLE TEXT
                program_title.fadeIn('fast');
            });
            // BANNER TEXT
            banner_text.fadeOut('fast', function () {
                banner_text.html('ENROLL');                                             // ENROLL TEXT
                banner_text.fadeIn('fast');
            });
            // FROM HEAD CTA
            formcta.fadeOut('fast', function () {
                formcta.html('Sound Interesting? Learn More!');                           // FORM TEXT
                formcta.fadeIn('fast');
            });
            // BLUE CTA
            bluecta.fadeOut('fast', function () {
                bluecta.html('BECOME SKILLED IN ANIMATION AND GAME DESIGN!');         // BLUE TEXT
                bluecta.fadeIn('fast');
            });
            // Header Image
            header_img.fadeOut('fast', function () {
                header_img.attr('src', 'images/AnimationGameDesignFull.jpg');
                header_img.fadeIn('fast');
            });
            // ======== COURSE DESCRIPTION TEXT =======//
            // First Block
            first_block.fadeOut('fast', function () {
                first_block.html("The Media Institute's Animation and Game Design program is an intensive, 75-week course that will teach you to " +
                "<span class='stand_out_blue'>create assets for animation</span> or game projects. We provide a wide variety of " +
                "<span class='stand_out_blue'>hands-on learning</span> projects, so that no matter where your animation or " +
                "<span class='stand_out_blue'>game design career</span> takes you, you'll be well prepared. Through the program, you'll receive training on important fundamentals, including:");                          // BLUE TEXT
                first_block.fadeIn('fast');
            });
            // Points
            points.fadeOut('fast', function () {
                points.html('<li>Traditional 2D and 3D animation design</li>' +
                    '<li>Level design</li>' +
                    '<li>3D modeling</li>' +
                    '<li>Video game design principles</li>' +
                    '<li>Interactivity scripting</li>'
                );
                points.fadeIn('fast');
            });
            // Second Block
            second_block.fadeOut('fast', function () {
                second_block.html("Gain valuable experience with the standard software for your field, such as Autodesk Maya, Autodesk ZBrush, Autodesk Motion Builder, the Unity Game Engine, the Adobe Creative Cloud, Blender, and Mudbox. You’ll also " +
                "<span class='stand_out_blue'>enhance your understanding of animation</span> in our motion-capture studio. ");                          // BLUE TEXT
                second_block.fadeIn("fast");
            });

            break;
        // =================================================================================================//
        //                                         *Graphic Design*                              //
        // =================================================================================================//
        case 'Graphic Design':
            // PROGRAM TITLE
            program_title.fadeOut('fast', function () {
                program_title.html('Graphic Design');                           // TITLE TEXT
                program_title.fadeIn('fast');
            });
            // BANNER TEXT
            banner_text.fadeOut('fast', function () {
                banner_text.html('ENROLL');                                             // ENROLL TEXT
                banner_text.fadeIn('fast');
            });
            // FROM HEAD CTA
            formcta.fadeOut('fast', function () {
                formcta.html('Sound Interesting? Learn More!');                           // FORM TEXT
                formcta.fadeIn('fast');
            });
            // BLUE CTA
            bluecta.fadeOut('fast', function () {
                bluecta.html('BECOME A SKILLED GRAPHIC DESIGNER!');         // BLUE TEXT
                bluecta.fadeIn('fast');
            });
            // Header Image
            header_img.fadeOut('fast', function () {
                header_img.attr('src', 'images/GraphicDesign.jpg');
                header_img.fadeIn('fast');
            });
            // ======== COURSE DESCRIPTION TEXT =======//
            // First Block
            first_block.fadeOut('fast', function () {
                first_block.html("If you're searching for a media school and program where you can receive <span class='stand_out_blue'>hands-on career training</span>, look no further." +
                "Graphic designers work for clients, either as <span class='stand_out_blue'>freelancers or as employees</span> of agencies and corporations, and while they continue to improve their craft throughout their careers, a basic level of skills is required in many <span class='stand_out_blue'>creative positions.</span><br>" +
                "Upon successful completion of the Graphic Design program, students could seek or obtain entry-level employment in a Graphic Design and/or Graphic Design-related field(s).<br>" +
                "Upon successful completion of this program, graduates should be able to:" +
                "" +
                "" +
                "");                          // BLUE TEXT
                first_block.fadeIn('fast');
            });
            // Points
            points.fadeOut('fast', function () {
                points.html('<li>Visualize and outline potential design solutions to client needs</li>' +
                    '<li>Identify demographic audiences, and design for them</li>' +
                    '<li>Develop finished designs through the appropriate us of line, shape, color, image and typography</li>' +
                    '<li>Use standard software packages to support the design process</li>' +
                    '<li>Output finished designs in the formats and resolutions appropriate for their intended uses</li>' +
                    '<li>Be proactive in discussing design choices with clients and potential clients</li>' +
                    '<li>Be proactive in continuing to expand and refine their skills as graphic designers</li>'
                );
                points.fadeIn('fast');
            });
            // Second Block
            second_block.fadeOut('fast', function () {
                second_block.html("Graduates of this program could enter the professional world with confidence—thanks to mentorship from instructors who are well versed in the industry and hands-on training with <span class='stand_out_blue'>professional-grade</span> technology and equipment." +
                "");                          // BLUE TEXT
                second_block.fadeIn("fast");
            });

            break;
        // =================================================================================================//
        //                                         Business in Media                                        //
        //                                        ** not an option **                                       //
        // =================================================================================================//
        //case 'Business in Media':
        //    // PROGRAM TITLE
        //    program_title.fadeOut('fast', function () {
        //        program_title.html('Business in Media');                                  // TITLE TEXT
        //        program_title.fadeIn('fast');
        //    });
        //    // BANNER TEXT
        //    banner_text.fadeOut('fast', function () {
        //        banner_text.html('ENROLL');                                                // ENROLL TEXT
        //        banner_text.fadeIn('fast');
        //    });
        //    // FROM HEAD CTA
        //    formcta.fadeOut('fast', function () {
        //        formcta.html('Sound Interesting? Learn More!');                           // FORM TEXT
        //        formcta.fadeIn('fast');
        //    });
        //    // BLUE CTA
        //    bluecta.fadeOut('fast', function () {
        //        bluecta.html('TURN YOUR PASSION INTO YOUR CAREER! APPLY TODAY!');         // BLUE TEXT
        //        bluecta.fadeIn('fast');
        //    });
        //
        //    // ======== COURSE DESCRIPTION TEXT =======//
        //    // First Block
        //    first_block.fadeOut('fast', function () {
        //        first_block.html("Need to get course description");                          // BLUE TEXT
        //        first_block.fadeIn('fast');
        //    });
        //    // Points
        //    points.fadeOut('fast', function () {
        //        points.html('<li>Get em</li>'
        //        );
        //        points.fadeIn('fast');
        //    });
        //    // Second Block
        //    second_block.fadeOut('fast', function () {
        //        second_block.html("Need to get course description");                          // BLUE TEXT
        //        second_block.fadeIn("fast");
        //    });
        //    break;
        // =================================================================================================//
        //                                Associate Entertainment and Media Business                        //
        //                                           ** not an option **                                    //
        // =================================================================================================//
        //case 'Associate Entertainment and Media Business':
        //    // PROGRAM TITLE
        //    program_title.fadeOut('fast', function () {
        //        program_title.html('Associate Entertainment and Media Business');         // TITLE TEXT
        //        program_title.fadeIn('fast');
        //    });
        //    // BANNER TEXT
        //    banner_text.fadeOut('fast', function () {
        //        banner_text.html('ENROLL');                                                // ENROLL TEXT
        //        banner_text.fadeIn('fast');
        //    });
        //    // FROM HEAD CTA
        //    formcta.fadeOut('fast', function () {
        //        formcta.html('Sound Interesting? Learn More!');                           // FORM TEXT
        //        formcta.fadeIn('fast');
        //    });
        //    // BLUE CTA
        //    bluecta.fadeOut('fast', function () {
        //        bluecta.html('TURN YOUR PASSION INTO YOUR CAREER! APPLY TODAY!');         // BLUE TEXT
        //        bluecta.fadeIn('fast');
        //    });
        //
        //    // ======== COURSE DESCRIPTION TEXT =======//
        //    // First Block
        //    first_block.fadeOut('fast', function () {
        //        first_block.html("Need to get course description");                          // BLUE TEXT
        //        first_block.fadeIn('fast');
        //    });
        //    // Points
        //    points.fadeOut('fast', function () {
        //        points.html('<li>Get Em</li>'
        //        );
        //        points.fadeIn('fast');
        //    });
        //    // Second Block
        //    second_block.fadeOut('fast', function () {
        //        second_block.html("Need to get course description");                          // BLUE TEXT
        //        second_block.fadeIn("fast");
        //    });
        //
        //    break;
        // =================================================================================================//
        //                                       Independent Digital Film                                   //
        //                                         ** not an option **                                      //
        // =================================================================================================//
        //case 'Independent Digital Film':
        //    // PROGRAM TITLE
        //    program_title.fadeOut('fast', function () {
        //        program_title.html('Independent Digital Film');                           // TITLE TEXT
        //        program_title.fadeIn('fast');
        //    });
        //    // BANNER TEXT
        //    banner_text.fadeOut('fast', function () {
        //        banner_text.html('ENROLL');                                                // ENROLL TEXT
        //        banner_text.fadeIn('fast');
        //    });
        //    // FROM HEAD CTA
        //    formcta.fadeOut('fast', function () {
        //        formcta.html('Sound Interesting? Learn More!');                           // FORM TEXT
        //        formcta.fadeIn('fast');
        //    });
        //    // BLUE CTA
        //    bluecta.fadeOut('fast', function () {
        //        bluecta.html('TURN YOUR PASSION INTO YOUR CAREER! APPLY TODAY!');         // BLUE TEXT
        //        bluecta.fadeIn('fast');
        //    });
        //
        //    // ======== COURSE DESCRIPTION TEXT =======//
        //    // First Block
        //    first_block.fadeOut('fast', function () {
        //        first_block.html("Need to get course description");                          // BLUE TEXT
        //        first_block.fadeIn('fast');
        //    });
        //    // Points
        //    points.fadeOut('fast', function () {
        //        points.html('<li>Get Em</li>'
        //        );
        //        points.fadeIn('fast');
        //    });
        //    // Second Block
        //    second_block.fadeOut('fast', function () {
        //        second_block.html("Need to get course description");                          // BLUE TEXT
        //        second_block.fadeIn("fast");
        //    });
        //
        //    break;
        // =================================================================================================//
        //                                     *Mobile App Development Cert*                                //
        // =================================================================================================//
        //case 'Mobile App Development Cert':
        //    // PROGRAM TITLE
        //    program_title.fadeOut('fast', function () {
        //        program_title.html('Mobile App Development');                         // TITLE TEXT
        //        program_title.fadeIn('fast');
        //    });
        //    // BANNER TEXT
        //    banner_text.fadeOut('fast', function () {
        //        banner_text.html('ENROLL');                                                // ENROLL TEXT
        //        banner_text.fadeIn('fast');
        //    });
        //    // FROM HEAD CTA
        //    formcta.fadeOut('fast', function () {
        //        formcta.html('Sound Interesting? Learn More!');                           // FORM TEXT
        //        formcta.fadeIn('fast');
        //    });
        //    // BLUE CTA
        //    bluecta.fadeOut('fast', function () {
        //        bluecta.html('BECOME SKILLED IN MOBILE APP DEVELOPMENT!');         // BLUE TEXT
        //        bluecta.fadeIn('fast');
        //    });
        //    // Header Image
        //    header_img.fadeOut('fast', function () {
        //        header_img.attr('src', 'images/MobileAppDevelopmentFull.jpg');
        //        header_img.fadeIn('fast');
        //    });
        //
        //    // ======== COURSE DESCRIPTION TEXT =======//
        //    // First Block
        //    first_block.fadeOut('fast', function () {
        //        first_block.html("Begin your job search after graduation with a well-rounded app portfolio. Throughout the program, you will " +
        //        "<span class='stand_out_blue'>design, code, test,</span> polish, and complete several " +
        //        "<span class='stand_out_blue'>professional applications</span> and games that will be ready for release to the public. Build career-ready skills as you learn: ");                          // BLUE TEXT
        //        first_block.fadeIn('fast');
        //    });
        //    // Points
        //    points.fadeOut('fast', function () {
        //        points.html('<li>Java and Objective C programming</li>' +
        //            '<li>Development processes for Android and iOS devices</li>' +
        //            '<li>Standards and sharing for desktops, iPads, iPhones, Androids, and Facebook </li>' +
        //            '<li>Game design and user interface</li>' +
        //            '<li>Graphics creation with Adobe Master Suite </li>'
        //        );
        //        points.fadeIn('fast');
        //    });
        //    // Second Block
        //    second_block.fadeOut('fast', function () {
        //        second_block.html("Your portfolio will show the world that you understand the strengths of different devices and the needs of different users. It can " +
        //        "<span class='stand_out_blue'>get you in the door</span> of large development firms and smaller start-ups, and showcase your work to potential clients interested in hiring you as an " +
        //        "<span class='stand_out_blue'>independent contractor.</span>");                          // BLUE TEXT
        //        second_block.fadeIn("fast");
        //    });
        //
        //    break;
        // =================================================================================================//
        //                                       *Audio and Recording Arts*                                 //
        // =================================================================================================//
        case 'Audio and Recording Arts':
            // PROGRAM TITLE
            program_title.fadeOut('fast', function () {
                program_title.html('Audio & Recording Arts');                         // TITLE TEXT
                program_title.fadeIn('fast');
            });
            // BANNER TEXT
            banner_text.fadeOut('fast', function () {
                banner_text.html('ENROLL');                                                // ENROLL TEXT
                banner_text.fadeIn('fast');
            });
            // FROM HEAD CTA
            formcta.fadeOut('fast', function () {
                formcta.html('Sound Interesting? Learn More!');                           // FORM TEXT
                formcta.fadeIn('fast');
            });
            // BLUE CTA
            bluecta.fadeOut('fast', function () {
                bluecta.html('BECOME A SKILLED AUDIO ENGINEER!');         // BLUE TEXT
                bluecta.fadeIn('fast');
            });
            // Header Image
            header_img.fadeOut('fast', function () {
                header_img.attr('src', 'images/AudioRecordingArtsFull.jpg');
                header_img.fadeIn('fast');
            });
            // ======== COURSE DESCRIPTION TEXT =======//
            // First Block
            first_block.fadeOut('fast', function () {
                first_block.html("Minneapolis Media Institute’s Audio and Recording Arts program is an intensive, 60-week program that prepares you for " +
                "<span class='stand_out_blue'>careers in the audio industry.</span> You’ll have the chance to learn all aspects of audio production:");                          // BLUE TEXT
                first_block.fadeIn('fast');
            });
            // Points
            points.fadeOut('fast', function () {
                points.html('<li>Recording</li>' +
                    '<li>Mixing and editing</li>' +
                    '<li>Post production</li>' +
                    '<li>Live sound</li>' +
                    '<li>DJ and programming skills</li>' +
                    '<li>Communication skills</li>' +
                    '<li>Basic entertainment law</li>' +
                    '<li>Career management</li>'
                );
                points.fadeIn('fast');
            });
            // Second Block
            second_block.fadeOut('fast', function () {
                second_block.html("Over the course of your education, you’ll have the opportunity to learn from " +
                "<span class='stand_out_blue'>Grammy-winning audio industry professionals</span>. You can graduate from this program with a portfolio or “demo reel” of your best work, as well as experience networking with industry contacts.");                          // BLUE TEXT
                second_block.fadeIn("fast");
            });

            break;
        // =================================================================================================//
        //                                       *Digital Art and Design*                                   //
        // =================================================================================================//
        case 'Digital Art and Design':
            // PROGRAM TITLE
            program_title.fadeOut('fast', function () {
                program_title.html('Digital Art & Design');                               // TITLE TEXT
                program_title.fadeIn('fast');
            });
            // BANNER TEXT
            banner_text.fadeOut('fast', function () {
                banner_text.html('ENROLL');                                                // ENROLL TEXT
                banner_text.fadeIn('fast');
            });
            // FROM HEAD CTA
            formcta.fadeOut('fast', function () {
                formcta.html('Sound Interesting? Learn More!');                           // FORM TEXT
                formcta.fadeIn('fast');
            });
            // BLUE CTA
            bluecta.fadeOut('fast', function () {
                bluecta.html('BECOME A SKILLED GRAPHIC DESIGNER!');                          // BLUE TEXT
                bluecta.fadeIn('fast');
            });
            // Header Image
            header_img.fadeOut('fast', function () {
                header_img.attr('src', 'images/DigitalArtDesignFull.jpg');
                header_img.fadeIn('fast');
            });
            // ======== COURSE DESCRIPTION TEXT =======//
            // First Block
            first_block.fadeOut('fast', function () {
                first_block.html('Madison Media Institute’s ' +
                '<span class="stand_out_blue">Associate of Applied Science Degree Program</span> in Digital Art & Design is well rounded, with <span class="stand_out_blue">hands-on</span> technical training, practical experience and professional skills. Students in this program develop a solid grounding in fundamental <span class="stand_out_blue">design principles,</span> using drawing, layout, color, typography, and images to create messages that both inform and <span class="stand_out_blue">persuade audiences.</span> Hone your skills using industry-standard tools, including: ');                          // BLUE TEXT
                first_block.fadeIn('fast');
            });
            // Points
            points.fadeOut('fast', function () {
                points.html('<li>Adobe Photoshop</li>' +
                             '<li>Adobe Illustrator</li>' +
                             '<li>Adobe InDesign</li>' +
                             '<li>Adobe Dreamweaver</li>' +
                             '<li>Adobe After Effects</li>' +
                             '<li>MySQL, Apache, and PHP hosting software</li>' +
                             '<li>Apple Keynote</li>' +
                             '<li>Nikon DSLR cameras</li>'
                              );
                points.fadeIn('fast');
            });
            // Second Block
            second_block.fadeOut('fast', function () {
                second_block.html("After graduation, you'll enter the workforce not only with a degree but also an " +
                "<br><span class='stand_out_blue'>eye-catching professional portfolio</span> that will put you steps ahead of the competition.");                          // BLUE TEXT
                second_block.fadeIn("fast");
            });

            break;
        // =================================================================================================//
        //                                       *Electronic and A/V Systems*                               //
        // =================================================================================================//
        //case 'Electronic and A/V Systems':
        //    // PROGRAM TITLE
        //    program_title.fadeOut('fast', function () {
        //        program_title.html('Electronic & A/V Systems');                         // TITLE TEXT
        //        program_title.fadeIn('fast');
        //    });
        //    // BANNER TEXT
        //    banner_text.fadeOut('fast', function () {
        //        banner_text.html('ENROLL');                                                // ENROLL TEXT
        //        banner_text.fadeIn('fast');
        //    });
        //    // FROM HEAD CTA
        //    formcta.fadeOut('fast', function () {
        //        formcta.html('Sound Interesting? Learn More!');                           // FORM TEXT
        //        formcta.fadeIn('fast');
        //    });
        //    // BLUE CTA
        //    bluecta.fadeOut('fast', function () {
        //        bluecta.html('BECOME A SKILLED TECHNICIAN!');                                 // BLUE TEXT
        //        bluecta.fadeIn('fast');
        //    });
        //    // Header Image
        //    header_img.fadeOut('fast', function () {
        //        header_img.attr('src', 'images/ElectronicAVSystemsFull.jpg');
        //        header_img.fadeIn('fast');
        //    });
        //    // ======== COURSE DESCRIPTION TEXT =======//
        //    // First Block
        //    first_block.fadeOut('fast', function () {
        //        first_block.html("As an Electronic & Audiovisual Systems student, you'll " +
        //        "<span class='stand_out_blue'>learn</span> about home theater installation in our commercial-grade theater, as well as how to " +
        //        "<span class='stand_out_blue'>design and build</span> high-speed data networks, AV systems, security systems, live sound reinforcement systems, and much more. You'll also study non-technical aspects of the electronic and " +
        //        "<span class='stand_out_blue'>audiovisual systems</span> business, safety standards, and breaking trends in the electronic systems industry. This program prepares you for careers in:");         // BLUE TEXT
        //        first_block.fadeIn('fast');
        //    });
        //    // Points
        //    points.fadeOut('fast', function () {
        //        points.html('<li>Commercial systems installation, from data and telephones to fire and security systems</li>' +
        //            '<li>Residential installation</li>' +
        //            '<li>Engineering sound or visuals for live events</li>' +
        //            '<li>Sales and technical support </li>' +
        //            '<li>System design and programming</li>'
        //        );
        //        points.fadeIn('fast');
        //    });
        //    // Second Block
        //    second_block.fadeOut('fast', function () {
        //        second_block.html("Graduates of this program enter the professional world with confidence—thanks to mentorship from instructors who are well versed in the industry and hands-on training with" +
        //        " <span class='stand_out_blue'>professional-grade </span>audiovisual equipment and software.");                          // BLUE TEXT
        //        second_block.fadeIn("fast");
        //    });
        //
        //    break;
        // =================================================================================================//
        //                                   *Entertainment and Media Bus.*                                 //
        // =================================================================================================//
        //case 'Entertainment and Media Bus.':
        //    // PROGRAM TITLE
        //    program_title.fadeOut('fast', function () {
        //        program_title.html('Entertainment & Media Business');                         // TITLE TEXT
        //        program_title.fadeIn('fast');
        //    });
        //    // BANNER TEXT
        //    banner_text.fadeOut('fast', function () {
        //        banner_text.html('ENROLL');                                                // ENROLL TEXT
        //        banner_text.fadeIn('fast');
        //    });
        //    // FROM HEAD CTA
        //    formcta.fadeOut('fast', function () {
        //        formcta.html('Sound Interesting? Learn More!');                           // FORM TEXT
        //        formcta.fadeIn('fast');
        //    });
        //    // BLUE CTA
        //    bluecta.fadeOut('fast', function () {
        //        bluecta.html('CREATIVE THINKERS AND ASPIRING ENTREPRENEURS WANTED!');         // BLUE TEXT
        //        bluecta.fadeIn('fast');
        //    });
        //    // Header Image
        //    header_img.fadeOut('fast', function () {
        //        header_img.attr('src', 'images/EntertainmentMediaBusinessFull.jpg');
        //        header_img.fadeIn('fast');
        //    });
        //    // ======== COURSE DESCRIPTION TEXT =======//
        //    // First Block
        //    first_block.fadeOut('fast', function () {
        //        first_block.html("If you've thought about a " +
        //        "<span class='stand_out_blue'>career in music</span>, video, film, social media marketing, touring and events, design, games, or sports, then get ready to " +
        //        "<span class='stand_out_blue'>stand out</span> in the field with an associate’s degree in Entertainment & Media Business. Our experienced faculty members teach you to apply fundamental lessons to the most current forms of " +
        //        "<span class='stand_out_blue'>marketing,</span> media, and content distribution, so you can pursue work as a: ");                          // BLUE TEXT
        //        first_block.fadeIn('fast');
        //    });
        //    // Points
        //    points.fadeOut('fast', function () {
        //        points.html('<li>Social media & digital marketing specialist</li>' +
        //            '<li>Event planner/coordinator</li>' +
        //            '<li>Publicist/Public relations specialist</li>' +
        //            '<li>Marketing director</li>' +
        //            '<li>Media buyer/planner</li>' +
        //            '<li>Artist manager</li>' +
        //            '<li>Talent buyer/promoter</li>' +
        //            '<li>Product/Project manager</li>' +
        //            '<li>Sports marketing/branding specialist</li>' +
        //            '<li>Small business owner</li>' +
        //            '<li>Studio manager</li>' +
        //            '<li>Online content manager/supervisor</li>'
        //        );
        //        points.fadeIn('fast');
        //    });
        //    // Second Block
        //    second_block.fadeOut('fast', function () {
        //        second_block.html("We'll help you understand the industry and the range of opportunities available to you. Lessons are tailored to fit the specific interests of the class. " +
        //        "<span class='stand_out_blue'>Entertainment and media is a wide field,</span> and we want to help you pursue a position suited to your strengths.");                          // BLUE TEXT
        //        second_block.fadeIn("fast");
        //    });
        //
        //    break;
        // =================================================================================================//
        //                                   *Game Art and Animation*                                       //
        // =================================================================================================//
        case 'Game Art and Animation':
            // PROGRAM TITLE
            program_title.fadeOut('fast', function () {
                program_title.html('Game Art & Animation');                         // TITLE TEXT
                program_title.fadeIn('fast');
            });
            // BANNER TEXT
            banner_text.fadeOut('fast', function () {
                banner_text.html('ENROLL');                                           // ENROLL TEXT
                banner_text.fadeIn('fast');
            });
            // FROM HEAD CTA
            formcta.fadeOut('fast', function () {
                formcta.html('Sound Interesting? Learn More!');                           // FORM TEXT
                formcta.fadeIn('fast');
            });
            // BLUE CTA
            bluecta.fadeOut('fast', function () {
                bluecta.html('LEARN GAME ANIMATION IN OUR MOTION CAPTURE STUDIO!');         // BLUE TEXT
                bluecta.fadeIn('fast');
            });
            // Header Image
            header_img.fadeOut('fast', function () {
                header_img.attr('src', 'images/GameArtAnimationFull.jpg');
                header_img.fadeIn('fast');
            });
            // ======== COURSE DESCRIPTION TEXT =======//
            // First Block
            first_block.fadeOut('fast', function () {
                first_block.html("<span class='stand_out_blue'>Bring your dreams to life</span> through key frame and hand-drawn animation, 3D animation, hard surface modeling and texturing, " +
                "<span class='stand_out_blue'>character design,</span> and VFX. You’ll also gain " +
                "<span class='stand_out_blue'>hands-on experience</span> with a professional-grade motion capture studio, giving students firsthand working knowledge of some of the most sought-after equipment in the industry. Graduates of this program can enter the professional world with confidence after being taught by industry professionals and working with current tools such as: ");                          // BLUE TEXT
                first_block.fadeIn('fast');
            });
            // Points
            points.fadeOut('fast', function () {
                points.html('<li>Cortex®</li>' +
                    '<li>Solver 2.2®</li>' +
                    '<li>ZBrush®</li>' +
                    '<li>UDK Engine</li>' +
                    '<li>Unity Engine</li>' +
                    '<li>nDo2</li>' +
                    '<li>Adobe® Creative Suite Master Collection</li>' +
                    '<li>Autodesk® suite which includes Maya®, Mud Box®, Motionbuilder®, and 3ds Max®</li>'
                );
                points.fadeIn('fast');
            });
            // Second Block
            second_block.fadeOut('fast', function () {
                second_block.html("When you graduate, you’ll be prepared to start your <span class='stand_out_blue'>career in the " +
                "game industry</span> with a demo reel that represents a complete portfolio of your work.");                          // BLUE TEXT
                second_block.fadeIn("fast");
            });

            break;
        // =================================================================================================//
        //                                   *Video and Motion Graphics*                                    //
        // =================================================================================================//
        case 'Video and Motion Graphics':
            // PROGRAM TITLE
            program_title.fadeOut('fast', function () {
                program_title.html('Video & Motion Graphics');                          // TITLE TEXT
                program_title.fadeIn('fast');
            });
            // BANNER TEXT
            banner_text.fadeOut('fast', function () {
                banner_text.html('ENROLL');                                                // ENROLL TEXT
                banner_text.fadeIn('fast');
            });
            // FROM HEAD CTA
            formcta.fadeOut('fast', function () {
                formcta.html('Sound Interesting? Learn More!');                           // FORM TEXT
                formcta.fadeIn('fast');
            });
            // BLUE CTA
            bluecta.fadeOut('fast', function () {
                bluecta.html('BECOME SKILLED IN THE VIDEO PRODUCTION WORLD!');         // BLUE TEXT
                bluecta.fadeIn('fast');
            });
            // Header Image
            header_img.fadeOut('fast', function () {
                header_img.attr('src', 'images/VideoMotionGraphics.jpg');
                header_img.fadeIn('fast');
            });
            // ======== COURSE DESCRIPTION TEXT =======//
            // First Block
            first_block.fadeOut('fast', function () {
                first_block.html("Enter the professional world with confidence after being mentored by industry professionals in Madison Media Institute’s Video & Motion Graphics Associate Degree program. They’ll help you build the skills employers are looking for, including the ability to creatively " +
                "<span class='stand_out_blue'>edit commercials,</span> documentaries, music videos, and film scenes. As a student in this program you'll learn storyboarding, " +
                "editing and production, <span class='stand_out_blue'>camera techniques,</span> live direction, and much more. You will be able to compose and create beautiful footage by using and understanding lighting design, creative camera focus, and composition. The hard skills we teach are " +
                "<span class='stand_out_blue'>videography,</span> editing, teamwork, and high-end post production. Gain hours of experience using industry-standard tools such as:");                          // BLUE TEXT
                first_block.fadeIn('fast');
            });
            // Points
            points.fadeOut('fast', function () {
                points.html('<li>Avid®</li>' +
                    '<li>Adobe Premiere®</li>' +
                    '<li>Adobe After Effects®</li>' +
                    '<li>Adobe Photoshop®</li>' +
                    '<li>Adobe Illustrator®</li>' +
                    '<li>Cinema 4D®</li>' +
                    '<li>Video editing suites</li>' +
                    '<li>Digital television control room software</li>' +
                    '<li>Professional lighting and photography equipment </li>'
                );
                points.fadeIn('fast');
            });
            // Second Block
            second_block.fadeOut('fast', function () {
                second_block.html("You’ll also delve into film history, entertainment law, and " +
                "<span class='stand_out_blue'>freelancing,</span> so you're better equipped to enter the workforce. Many of our Video & Motion Graphics graduates <span class='stand_out_blue'>work as directors,</span> videographers, editors, production assistants, and motion graphics specialists in corporate video, television and production houses, or the film industry.");                          // BLUE TEXT
                second_block.fadeIn("fast");
            });

            break;
        // =================================================================================================//
        //                                   *Recording and Music Tech.*                                    //
        // =================================================================================================//
        case 'Recording and Music Tech.':
            // PROGRAM TITLE
            program_title.fadeOut('fast', function () {
                program_title.html('Recording & Music Tech.');                          // TITLE TEXT
                program_title.fadeIn('fast');
            });
            // BANNER TEXT
            banner_text.fadeOut('fast', function () {
                banner_text.html('ENROLL');                                                // ENROLL TEXT
                banner_text.fadeIn('fast');
            });
            // FROM HEAD CTA
            formcta.fadeOut('fast', function () {
                formcta.html('Sound Interesting? Learn More!');                           // FORM TEXT
                formcta.fadeIn('fast');
            });
            // BLUE CTA
            bluecta.fadeOut('fast', function () {
                bluecta.html('BECOME A SKILLED RECORDING TECHNICIAN!');                      // BLUE TEXT
                bluecta.fadeIn('fast');
            });
            // Header Image
            header_img.fadeOut('fast', function () {
                header_img.attr('src', 'images/RecordingMusicTechnologyFull.jpg');
                header_img.fadeIn('fast');
            });
            // ======== COURSE DESCRIPTION TEXT =======//
            // First Block
            first_block.fadeOut('fast', function () {
                first_block.html("As a Recording & Music Technology student at Madison Media Institute, you'll be taught by industry professionals with years of " +
                "<span class='stand_out_blue'>real-world experience.</span> You'll study audio engineering, digital audio workstations, " +
                "<span class='stand_out_blue'>sound design,</span> studio recording, audio mixing, and electronics. In this program, you’ll gain " +
                "<span class='stand_out_blue'>hands-on</span> experience with the latest and best tools and technology (both digital and analog), including:");                          // BLUE TEXT
                first_block.fadeIn('fast');
            });
            // Points
            points.fadeOut('fast', function () {
                points.html('<li>Solid State Logic (SSL) and Trident large-format mixing consoles </li>' +
                    '<li>Isolation booths</li>' +
                    '<li>Avid Pro Tools®, native and HD systems</li>' +
                    '<li>Ableton Live®, Logic® and Reason®</li>'
                );
                points.fadeIn('fast');
            });
            // Second Block
            second_block.fadeOut('fast', function () {
                second_block.html("By graduation you'll be ready to record, edit, and mix audio for every use—from music recordings to theater, commercials to video games. Throughout the program you'll learn how to employ high-tech recording equipment to deliver great-sounding audio for your clients. Plus you'll have the opportunity to obtain Pro Tools® Operator certification to help you pursue a " +
                "<span class='stand_out_blue'>career as an audio engineer,</span> studio technician, sound designer, live sound engineer, music producer, or record producer. ");                          // BLUE TEXT
                second_block.fadeIn("fast");
            });
            break;
    }
}

$('#CurriculumId').change(function () {
    updatePageContent();
});

