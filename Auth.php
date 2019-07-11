<?php
require 'Config.php';
require 'DSBRAPISoapClient.php';

DSBRAPISoapClient::$_WsdlUri = $config['wsdl_url'];
$AuthType = new AuthType();
$AuthType->client_name = $config['client_name'];
$AuthType->auth_token = $config['auth_token'];
