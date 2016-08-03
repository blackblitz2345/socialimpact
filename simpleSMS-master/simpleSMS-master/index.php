<?php
 
// ==== Control Vars =======
$strFromNumber = "+13479839120";
$strToNumber = "+13475232273";
$strMsg = "Good job. Your submission has been reviewed and added into the app. Please continue to support us by adding more and spreading the world"; //Olivier accidentally pulled up a porn site on a projector 
$aryResponse = array();
 

    // include the Twilio PHP library - download from 
    // http://www.twilio.com/docs/libraries/
    require_once ("inc/Services/Twilio.php");
 
    // set our AccountSid and AuthToken - from www.twilio.com/user/account
    $AccountSid = "AC761b76fe6fbbff977820a659c64727fe";
    $AuthToken = "c8601e17f1d66bc40763c4ef9f1f1ad1";
 
    // ini a new Twilio Rest Client
    $objConnection = new Services_Twilio($AccountSid, $AuthToken);


    // Send a new outgoinging SMS by POSTing to the SMS resource */
    $bSuccess = $objConnection->account->sms_messages->create(
        
        $strFromNumber, 	// number we are sending From 
        $strToNumber,           // number we are sending To
        $strMsg			// the sms body
    );

		
    $aryResponse["SentMsg"] = $strMsg;
    $aryResponse["Success"] = true;
    
    
    echo json_encode($aryResponse);
