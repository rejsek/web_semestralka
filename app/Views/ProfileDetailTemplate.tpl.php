<?php
    global $tplData;

    require_once(DIRECTORY_VIEWS . "/Templates.class.php");
    $templates = new Templates();
?>

<?php

    // Hlavnicka stranky //
    $templates->getHeader($tplData['title']);
    
    // Obsah stranky //
    $res = "";

    if(array_key_exists("profile_detail", $tplData)) {
        foreach($tplData["profile_detail"] as $data) {
            $res .= '<h1>' . $data['uz_jmeno'] . "</h1>";
        }
    }
    
    echo $res;

    require_once(DIRECTORY_VIEWS . "/profile_detail.html");

    // Paticka stranky //
    $templates->getFooter();
?>