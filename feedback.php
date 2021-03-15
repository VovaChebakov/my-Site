<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" http-equiv="content-type" content="text/html">
		<meta author="Chebakov Vladimir 6G Gymnasium №94">
		<title>Feedback</title>
	<link rel="stylesheet" type="text/css" href="CSS1/Site on convention.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready (function () {
			$("#done").click (function () {
				$('#messageShow').hide ();
				let name = $("#Name").val ();
				let email = $("#Email").val ();
				let topic = $("#Topic").val ();
				let message = $("#Message").val ();
				let fail = "";
				if (name.length < 3) 
					fail = "Name is at least three characters";
				else if (email.split ('@').length - 1 == 0 || email.split ('.').length 
					- 1 == 0) fail = "You introduced incorrect email";
				else if (topic.length < 5) 
					fail = "Subject of message is not least five characters";
				else if (message.length < 5) 
					fail = "Message is not least twenty characters";
				if (fail != "") {
					$('#messageShow').html (fail + "<div class=''clear><br></div>");
					$('#messageShow').show ();
					return false;
				}
				$.ajax ({
					url: '/ajax/Feedback.php',
					type: 'POST',
					cache: false,
					data: {'Name': name, 'Email': email, 'Topic': topic, 'Message':
					message},
					datatype: 'html',
					success: function (data) {
						if(data == 'Your message is sent') {
							$('#messageShow').html (data + "<div class='clear'><br></div>");
							$('#messageShow').show ();
						} 
					}
				});
			});
		});
	</script>
</head>
<body>
	<?php require "Blocks/header.php"; ?>
		<div id="wrapper">
			<div id="leftCol">
				<input type="text" name="Name" placeholder="Name" id="Name"><br>
				<input type="text" name="Email" placeholder="Email" id="Email"><br>
				<input type="text" name="Topic of message" placeholder="Topic" id="Topic"><br>
				<textarea name="Message" id="Message" placeholder="Write in this
textarea your message"></textarea><br>
				<div id="messageShow"></div>
				<input type="button" name="done" id="done" value="Send">
				<img src="IMG2/картинка на страничку обратная связь.jpg">
				<img src="IMG2/картинка на страничку обратная связь 2.jpg" style="
				float: left; width: 256px;">
			</div>
		<?php require "Blocks/rightCol.php"; ?>
	</div>
	<?php require "Blocks/footer.php"; ?>
</body>
</html>