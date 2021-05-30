<?php
$to = $_POST['email'];
$sub = $_POST['subject'];
$msg = $_POST['message'];
$send=mail($to,$subject,$msg);
If ($send)
echo "Mail Sent.";
else
echo "error in sending mail";
?>