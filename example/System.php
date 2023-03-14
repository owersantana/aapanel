<?php

require __DIR__.'/../vendor/autoload.php';

const AAPANEL_SERVER_URL = '';
const AAPANEL_SERVER_KEY = '';  

use DevOpsSantana\AAPanel\AAPanelSystem;

$aapanel = new AAPanelSystem();

/** Painel Info */
$aapanel->Info(); 

/** Disk Info */
$aapanel->Disk();

/** Network Info  */
$aapanel->Network(); 

/** Size Info  */
$aapanel->Size();