<?php
if($_POST['submit']) {
	if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['message'])) {
		$error = true;
	} else {

		$to = "sag3xt@virginia.edu";

		$name = trim($_POST['name']);
		$email = trim($_POST['email']);
		$message = trim($_POST['message']);

		$subject = "Contact Form";

		$messages = "Name: $name \r\n Email: $email \r\n Message: $message";
		$headers = "From:" . $name;
		$mailsent = mail($to, $subject, $messages, $headers);

		if($mailsent) {
			$sent = true;
		}
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@suzyogi</title>

    <link href="contact.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Julius+Sans+One' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300italic' rel='stylesheet' type='text/css'>

    <script src="contact.js"></script>

</head>

<body>

<header>
	<div class="topbar">
	<div class="name">
		<a href="index.html">suzy gordon</a>
	</div>

	<nav>
		<ul>
			<li class="about"><a href="about.html">about</a></li>
			<li class="schedule"><a href="schedule.html">schedule</a></li>
			<li class="contact"><a href="contact.html">contact</a></li>
		</ul>
	</nav>
	</div>
</header>

<div class="contact-form">

	<div id="mainform">

			<?php if($error == true) { ?>
			<p class="error">There was a missing field on the form.</p>
			<?php } if($sent == true) { ?>
			<p class="sent">Thanks, your message has been sent successfully.</p>
			<?php } ?>

		<form id="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="contact">
			<h2>Send me a Message!</h2>
			<h3>Your email address will not be published. Required fields are marked <span>*</span>.</h3>
			<p id="returnmessage"></p>
			<div class="input-field">
				<label for="name">Name: <span>*</span></label>
				<input name="name" type="text" id="name" placeholder="Name"/>
			</div>
			<div class="input-field">
				<label for="email">Email: <span>*</span></label>
				<input name="email" type="email" id="email" placeholder="Email"/>
			</div>
			<div class="input-field">
				<label for="phone">Phone: </label>
				<input name="contact" type="text" id="contact" placeholder="10 digit phone number"/>
			<div class="input-field">
				<label for="message">Message:</label>
				<textarea id="message" placeholder="Message....."></textarea>
				<input name="message" type="submit" id="submit" value="Send Message"/>
			</div>
		</form>
	</div>
</div>

</body>

</html>