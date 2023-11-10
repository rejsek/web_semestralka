<?php
    //////////////////////////////////////////////////////////////////
    ///////////////////// Hlavni soubor aplikace /////////////////////
    //////////////////////////////////////////////////////////////////

    // Nacteni nastavovaciho souboru //
    require_once("settings.inc.php");

    // Nacteni tridy spoustejici aplikaci //
    require_once("app/ApplicationStart.class.php");

    $app = new ApplicationStart();
    $app->appStart();
?>