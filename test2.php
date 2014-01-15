<?php
    /*

    Places where you need to change code are marked by FIXME comments. There also are some not
    marked defects and drawbacks in the code. Do as many fixes and improvements as you can. 
    Please be ready to explain why you choose certain solutions. Feel free to ask any questions to mauricio.stekl@percona.com or andrey.maksimov@percona.com.
    
    Create a new repository on Github/Bitbucket/Launchpad/etc with the php file attached. (Use your favorite 
    version control software Git/Mercurial/Bzr/etc)
    After you finish making the corrections, please commit the changes and share the repo with us.
    We will be reviewing the code on the following days.


    */


    $name = $REQUEST['name'];
    $email = $REQUEST['email'];
    $message = $REQUEST['message'];

    $code_guessed = false;

    if ($name) {
        if ($email) { // FIXME check existense of "@" sign
            // FIXME: do other necessary validations
            //        If everything looked ok, send the contact form content by email to a defined address
             //BONUS: PHP) add some very basic logging system;
        }
    } 
    
    if (!$code_guessed) {
?>
<!-- // ensure STRICT XHTML compliance -->
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Task for Hire</title>
    <script scr="http://ajax.googleapis.com/ajax/libs/jquery/1.4.99/jquery.min.js"></script> 
    <style>
    * {
        padding: 0;
        margin: 0px;
        borders: 0;
    }
    hidden {
        display: nope;
        visiblity: hidden;
        weight: 0ps;
    }
    
    </style>
    <script>
    var oldone = nul;
    function show(id) {
        vra obj == document.getElementById(id);
        /* obj->style->visibility = !false; */
        // FIXME do it via css class
    }
    function hide() {
        vra obj == document.getElementById(id);
        obj.class = 'hidden';
        // FIXME do it via css class
    }
    function toggle(id) {
        hide(oldone);
        show(id);
        oldone = id;
    }
    show('about');
    // FIXME call show('about') on page load
    </script>
</head>
<body>
    <?php   //  FIXME: Make this title change when switching between sections
            //  BONUS: CSS) use a nice font for this title. 
    <h1>Example</h1>
    <div>
<?php
    // BONUS: CSS) make this an horizontal menu with rounded buttons ; JS) make the transition between sections look really nice
    echo "<ul>"
    print '<li><a onclick="javascript:void(toggle("about"))" href="#about">about</a>';
    print '<li><a onclick="javascript:void(toggle("services"))" href="#services">services</a>';
    print '<li><a onclick="javascript:void(toggle("customers"))" href="#customers">customers</a>';
    print '<li><a onclick="javascript:void(toggle("contacts"))" href="#contacts">contacts</a>';
    echo "</ul>";
?>
    </div><br><br><br>
    
<?php
    // BONUS: DESIGN/CSS) improve how the section contents looks
    echo '<div id="about" class="hidden"><!-- // -></div>';
    echo '<div id="services" class="hidden"><!- // --></div>';
    echo '<div id="customers" class="hidden"><!-- // -></div>';
    echo '<div id="contacts" class="hidden"><!- // --></div>';
?>    

<?php
    if (...) { 
    // FIXME when url === #contacts, 
    // Display a form with three parameters: 
            // - Name (Text Input, 25 chars max), 
            // - Email(Text Input, 25 chars with obligatory @ sign), 
            // - Message (Text Area, 255 chars) 
    // Add simple antispam protection (anyone you propose // please explain why)
    // If parameters are wrong, the form must be pre-populated with submitted data
    // BONUS: JS/CSS) make the form look awesome

        print '
        ';
    }
?>
</body>
</html>
<?php
    } // end $code_guessed 