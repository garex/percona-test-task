<?php
	$name = $REQUEST['name'];
	$email = $REQUEST['email'];
	$message = $REQUEST['message'];

	if ($name) {
		if ($email) { // FIXME check existense of "@" sign
			// FIXME: do other necessary validations
			//        If everything looked ok, send the contact form content by email to a defined address
			//BONUS: PHP) add some very basic logging system;
		}
	}
?>
<!-- // ensure STRICT XHTML compliance -->
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Task for Hire</title>
	<link href="style.css" media="all" rel="stylesheet" type="text/css" />
</head>
<body>
	<?php   //  FIXME: Make this title change when switching between sections
			//  BONUS: CSS) use a nice font for this title.
	?>
	<h1>Example</h1>
	<div>
<?php
	// BONUS: CSS) make this an horizontal menu with rounded buttons ; JS) make the transition between sections look really nice
	echo "<ul>";
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
	if (false) {
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

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="script.js"></script>
</body>
</html>
