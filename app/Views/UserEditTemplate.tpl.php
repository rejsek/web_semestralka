<?php
    global $tplData;

    require_once(DIRECTORY_VIEWS . "/Templates.class.php");
    $templates = new Templates();
?>

<?php

    // Hlavnicka stranky //
    $templates->getHeader($tplData['title']);
    
    // Obsah stranky //
    $res = "<div class='detail_profile'>";

    $res .= "<i class='fa fa-user-circle'></i>";

    if(array_key_exists("profile_detail", $tplData)) {
        foreach($tplData["profile_detail"] as $data) {
            $res .= '<h1>Editace profilu: ' . $data['uz_jmeno'] . "</h1>";
        }
    }
    
    $res .= "</div>";

    echo $res;

    require_once(DIRECTORY_VIEWS . "/user_edit_form.html");

    // Paticka stranky //
    $templates->getFooter();
?>