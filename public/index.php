<?php

$app = require_once __DIR__.'/../bootstrap/app.php';

use lib\IpSaver;
use lib\UserDb;

$ipSaver = new IpSaver(new UserDb, $_SERVER);
$ipSaver->SaveUserIp();


echo 'The number os unique users today is ' . $ipSaver->getUserQuantity();
