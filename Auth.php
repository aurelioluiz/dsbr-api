<?php
require 'Config.php';
require 'DSBRAPISoapClient.php';

DSBRAPISoapClient::$_Server = new SoapClient($config['wsdl_url'], [
  'stream_context' => stream_context_create([
    'ssl' => [
      'verify_peer' => false,
      'verify_peer_name' => false,
      'allow_self_signed' => true
    ]
  ])
]);

$AuthType = new AuthType();
$AuthType->client_name = $config['client_name'];
$AuthType->auth_token = $config['auth_token'];
