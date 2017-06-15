<?php
$access_token = 'gLcRV6o4L/xy4ipUoH4lAxeuN6WrFa1piofMuCpPOqR6QVcjNNZb32/01+aV3lbpBF17g9PElkTeR2cLpPp4svgnh8PH/KKAbI+z6ccsTk19PmehF5LE112wESkaaso0voZ2Dfqb8JrAfglCIPe+HwdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;