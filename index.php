$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'location') {
			// Get text sent
			$latitude = $event['message']['latitude'];
			$longitude = $event['message']['longitude'];

			$strUrl = "https://api.line.me/v2/bot/message/push";
			 
			$arrHeader = array();
			$arrHeader[] = "Content-Type: application/json";
			$arrHeader[] = "Authorization: Bearer {$strAccessToken}";
			 
			$arrPostData = array();
			$arrPostData['to'] = "Cd7d57caa22a05878f99a922646f37f6d";
			$arrPostData['messages'][0]['type'] = "text";
			$arrPostData['messages'][0]['text'] = "Lat:" + $latitude + "Lon:" + $longitude;
			 
			 
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL,$strUrl);
			curl_setopt($ch, CURLOPT_HEADER, false);
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrPostData));
			curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			$result = curl_exec($ch);
			curl_close ($ch);
		}
	}
}
