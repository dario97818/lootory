<?php

// PARAMETRI DA MODIFICARE
$WEBHOOK_URL = 'https://lootory.herokuapp.com/register.php';
$BOT_TOKEN = '590290307:AAEQ_UeP1Jz6g-ZE9M7NR1pYb8zlszqQPlY';

// NON APPORTARE MODIFICHE NEL CODICE SEGUENTE
$API_URL = 'https://api.telegram.org/bot' . $BOT_TOKEN .'/';
$method = 'setWebhook';
$parameters = array('url' => $WEBHOOK_URL);
$url = $API_URL . $method. '?' . http_build_query($parameters);
$handle = curl_init($url);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 5);
curl_setopt($handle, CURLOPT_TIMEOUT, 60);
$result = curl_exec($handle);
print_r($result);
