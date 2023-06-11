<?php
/*
This example works only for those users which are using Cloud Service and do not want to run
client application on their end.


You just need to Start the Cloud Service from the Dashboard and Scan QR Code.
When WhatsApp gets ready, then you can start sending messages.

*/
$phone_number=$_POST['pnum'];
$msg=$_POST['msg'];
// $group_name=$_POST['groupname'];
$phone_number='+91'.$phone_number;

include('WhatsappAPI.php'); // include given API file


$wp = new WhatsappAPI("4492", "11ab3ace760c55f8a9bba517ae557aa3a1d71e43"); // create an object of the WhatsappAPI class with your user id and api key

$number = $phone_number; // NOTE: Phone Number should be with country code
$message = $msg; // You can use WhatsApp Code to compose text messages like *bold*, ~Strikethrough~, ```Monospace```
$media_url = 'http://www.africau.edu/images/default/sample.pdf'; // Direct global accessible URL of the file, image, docs etc.
 // Max file size should be 10MB otherwise you may get error.
$group_name = "Project Attendance ";
$caption = 'Its my life'; // For media files



/*

  UNCOMMENT YOUR REQUIRED FUNCTIONS FROM BELOW

*/

// Send Text Message to number
 $status = $wp->sendText($number, $message);

// Send PDF, Documents, File, Images etc  Message to number
// $status = $wp->sendFromURL($number, $media_url, $caption);

// Send Text message in Group
// $status = $wp->sendTextInGroup($group_name, $message);
// Send Media message in Group
// $status = $wp->sendFromURLInGroup($group_name, $media_url, $caption);

$status = json_decode($status);

if($status->status == 'error'){
    echo $status->response;
}elseif($status->status == 'success'){
    echo 'Success <br />';
    echo $status->response;
}else{
  print_r($status);
}
?>
