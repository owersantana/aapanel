<?php
require __DIR__.'/../vendor/autoload.php';

const AAPANEL_SERVER_URL = '';
const AAPANEL_SERVER_KEY = ''; 
use DevOpsSantana\AAPanel\AAPanelLogs;

$aapanel = new AAPanelLogs();

/** Painel Info */
$aapanel->GetLogs(15); 
