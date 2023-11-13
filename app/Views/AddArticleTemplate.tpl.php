<?php
    global $tplData;

    require_once(DIRECTORY_VIEWS . "/Templates.class.php");
    $templates = new Templates();
?>

<?php
    // Hlavicka stranky //
    $templates->getHeader($tplData['title']);

    // Formular pro pridani clanku //
    require_once(DIRECTORY_VIEWS . "/add_article.html");

    // Paticka stranky //
    $templates->getFooter();
?>