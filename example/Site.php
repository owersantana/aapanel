<?php


require __DIR__.'/../vendor/autoload.php';

const AAPANEL_SERVER_URL = '';
const AAPANEL_SERVER_KEY = ''; 

use DevOpsSantana\AAPanel\AAPanelSite;

$aapanel = new AAPanelSite();

/** List All Sites */
$aapanel->List(); 

/** Size Site Dir */
$aapanel->Size('yourdomain.com');

/** Get Index  */
$aapanel->GetIndex('[your site id]'); 

/** Anti Xss */
$aapanel->BaseDir('[your site id]', 'yourdomain.com');