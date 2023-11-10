<?php
    global $tplData;

    require_once(DIRECTORY_VIEWS . "/Templates.class.php");
    $templates = new Templates();
?>

<?php
    // Hlavicka stranky //
    $templates->getHeader($tplData['title']);

    // Prihlasovaci formular //
    require_once(DIRECTORY_VIEWS . "/registration_form.html");

    // Paticka stranky //
    $templates->getFooter();
?>