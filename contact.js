$(document).ready(function() {
	$("#submit").click(function() {
		var name = $("#name").val();
		var email = $("#email").val();
		var message = $("#message").val();
		var contact = $("#contact").val();
		$("#returnmessage").empty(); // To empty previous error/success message.
// Checking for blank fields.
		if (name == '' || email == '') {
			alert("Please Fill Required Fields");
		} else {
// Returns successful data submission message when the entered information is stored in database.
			$.post("contact_form.php", {
				name1: name,
				email1: email,
				message1: message,
				contact1: contact
			}, function(data) {
				$("#returnmessage").append(data); // Append returned message to message paragraph.
				if (data == "Your Query has been received, We will contact you soon.") {
				$("#form")[0].reset(); // To reset form fields on success.
				}
			});
		}
	});

	$("input").focus(function(){
		$(this)
			.parent()
				.addClass("curFocus")
			.children("div")
				.toggle();
	})
	$("input").blur(function(){
		$(this)
			.parent()
				.removeClass("curFocus")
			.children("div")
				.toggle();
	})
	$('<div class="tl"></div><div class="tr"></div><div class="bl"></div><div class="br"></div>').appendTo("div.single-field");

});