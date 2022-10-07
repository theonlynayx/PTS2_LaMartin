<?php

$name = ($_GET['name']) ? $_GET['name'] : $_POST['name'];
$email = ($_GET['email']) ?$_GET['email'] : $_POST['email'];
$website = ($_GET['website']) ?$_GET['website'] : $_POST['website'];
$comment = ($_GET['comment']) ?$_GET['comment'] : $_POST['comment'];

if ($_POST) $post=1;

if (!$name) $errors[count($errors)] = 'Please enter your name.';
if (!$email) $errors[count($errors)] = 'Please enter your email.'; 
if (!$comment) $errors[count($errors)] = 'Please enter your comment.'; 

if (!$errors) {

	//recipient - change this to your name and email
	$to = 'Nayx <xavpeil69@gmail.com>';	
	//sender
	$from = $name . ' <' . $email . '>';
	
	//subject and the html message
	$subject = 'Comment from ' . $name;	
	$message = '
	<!DOCTYPE html >
	<head></head>
	<body>
	<table>
		<tr><td>Name</td><td>' . $name . '</td></tr>
		<tr><td>Email</td><td>' . $email . '</td></tr>
		<tr><td>Website</td><td>' . $website . '</td></tr>
		<tr><td>Comment</td><td>' . nl2br($comment) . '</td></tr>
	</table>
	</body>
	</html>';

	
	$result = sendmail($to, $subject, $message, $from);

	if ($_POST) {
		if ($result) echo 'Thank you! We have received your message.';
		else echo 'Sorry, unexpected error. Please try again later';

	} else {
		echo $result;	
	}


} else {
	for ($i=0; $i<count($errors); $i++) echo $errors[$i] . '<br/>';
	echo '<a href="form.php">Back</a>';
	exit;
}



function sendmail($to, $subject, $message, $from) {
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
	$headers .= 'From: ' . $from . "\r\n";
	
	$result = mail($to,$subject,$message,$headers);
	
	if ($result) return 1;
	else return 0;
}
?>
