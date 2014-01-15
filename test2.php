<?php
	$name = $REQUEST['name'];
	$email = $REQUEST['email'];
	$message = $REQUEST['message'];

	if ($name) {
		if ($email) { // FIXME check existense of "@" sign
			// FIXME: do other necessary validations
			//        If everything looked ok, send the contact form content by email to a defined address
			// BONUS: PHP) add some very basic logging system;
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Task for Hire</title>
	<link href="style.css" media="all" rel="stylesheet" type="text/css" />
</head>
<body>
	<h1>Example</h1>

	<?php // BONUS: JS) make the transition between sections look really nice ?>
	<div>
		<ul id="menu">
			<li class="round-corner-10"><a href="#about">about</a></li>
			<li class="round-corner-10"><a href="#services">services</a></li>
			<li class="round-corner-10"><a href="#customers">customers</a></li>
			<li class="round-corner-10"><a href="#contacts">contacts</a></li>
		</ul>
	</div>

	<p>&nbsp;</p>

	<?php // BONUS - DESIGN/CSS) improve how the section contents looks ?>
	<div id="about" class="hidden">
		about lorem<!-- // -->
	</div>
	<div id="services" class="hidden">
		services lorem<!-- // -->
	</div>
	<div id="customers" class="hidden">
		customers lorem<!-- // -->
	</div>
	<div id="contacts" class="hidden">
		contacts lorem<!-- // -->
	</div>

	<?php
	if (false) {
		// FIXME when url === #contacts,
		// Display a form with three parameters:
				// - Name (Text Input, 25 chars max),
				// - Email(Text Input, 25 chars with obligatory @ sign),
				// - Message (Text Area, 255 chars)
		// Add simple antispam protection (anyone you propose // please explain why)
		// If parameters are wrong, the form must be pre-populated with submitted data
		// BONUS - JS/CSS) make the form look awesome
	}
	?>

	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript" src="script.js"></script>
</body>
</html>
