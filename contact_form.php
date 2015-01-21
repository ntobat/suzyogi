<?php
// Fetching Values from URL.
$name = $_POST['name1'];
$email = $_POST['email1'];
$message = $_POST['message1'];
$contact = $_POST['contact1'];

$to = "sag3xt@virginia.edu";
$subject = "New Message";

mail ($to, $subject, $message, "From: " . $name);
echo "Your Message has been sent.";

$email = filter_var($email, FILTER_SANITIZE_EMAIL); // Sanitizing E-mail.
// After sanitization Validation is performed
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
	if (!preg_match("/^[0-9]{10}$/", $contact)) {
		echo "<span>* Please Enter Valid Phone Number *</span>";
	} else {
		$subject = $name;
// To send HTML mail, the Content-type header must be set.
		$headers = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From:' . $email. "\r\n"; // Sender's Email
		$headers .= 'Cc:' . $email. "\r\n"; // Carbon copy to Sender
		$template = '<div style="padding:50px; color:white;">Hello ' . $name . ',<br/>'
		. '<br/>Thank you...! For Contacting Us.<br/><br/>'
		. 'Name:' . $name . '<br/>'
		. 'Email:' . $email . '<br/>'
		. 'Contact No:' . $contact . '<br/>'
		. 'Message:' . $message . '<br/><br/>'
		. 'This is a Contact Confirmation mail.'
		. '<br/>'
		. 'We will contact you as soon as possible.</div>';
		$sendmessage = "<div style=\"background-color:#7E7E7E; color:white;\">" . $template . "</div>";
		// Message lines should not exceed 70 characters (PHP rule), so wrap it.
		$sendmessage = wordwrap($sendmessage, 70);
		// Send mail by PHP Mail Function.
		mail("sag3xt@virginia.edu", $subject, $sendmessage, $headers);
		echo "Your Query has been received, We will contact you soon.";
	}
} else {
	echo "<span>* invalid email *</span>";
}

?>

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

<?php if($error == true) { ?>
			<p class="error">There was a missing field on the form.</p>
			<?php } if($sent == true) { ?>
			<p class="sent">Thanks, your message has been sent successfully.</p>
			<?php } ?>