<?php
 
$strAccessToken = "gLcRV6o4L/xy4ipUoH4lAxeuN6WrFa1piofMuCpPOqR6QVcjNNZb32/01+aV3lbpBF17g9PElkTeR2cLpPp4svgnh8PH/KKAbI+z6ccsTk19PmehF5LE112wESkaaso0voZ2Dfqb8JrAfglCIPe+HwdB04t89/1O/w1cDnyilFU=";
 
$strUrl = "https://api.line.me/v2/bot/message/push";
 
$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer {$strAccessToken}";
 
$arrPostData = array();
$arrPostData['to'] = "Cd7d57caa22a05878f99a922646f37f6d";
$arrPostData['messages'][0]['type'] = "text";
$arrPostData['messages'][0]['text'] = "นี้คือการทดสอบ Push Message";
 
 
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
 
?>
