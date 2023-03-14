<?php
require __DIR__.'/../vendor/autoload.php';

const AAPANEL_SERVER_URL = '';
const AAPANEL_SERVER_KEY = '';  

use DevOpsSantana\AAPanel\AAPanelBackup;

$aapanel = new AAPanelBackup();

/** List */
$aapanel->List(); 

/** Create */
$aapanel->Create('[your site id]');

/** Delete */
$aapanel->Delete('[your site id]');