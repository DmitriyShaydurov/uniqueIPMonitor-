# Unique IP quantity calculation script
PHP script to monitor visitors  with unique IP and saving IPs to DB

## Installation
* clone this project
* run

```
composer install
``` 
* import db (filkos.sql) from db/
* change db settings in bootstrap/app.php

## Usage
```
$ipSaver->SaveUserIp(); // to save unique IP to db

$ipSaver->getUserQuantity(); // to get number of unique users for current date

```
demo usage in public/index.php