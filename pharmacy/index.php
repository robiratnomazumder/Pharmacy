<?php

require_once "functions/functions.php";

   
$oParts = new Parts();
$oParts->addHeader();
$oParts->addBanner();
//$oParts->addSidebar();
//$oParts->addPage("addProjects.php");
$oParts->addSlid();
$oParts->addServices();
$oParts->addFooter();


