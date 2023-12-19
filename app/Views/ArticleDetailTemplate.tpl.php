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

    if(array_key_exists("detail", $tplData)) {
        foreach($tplData["detail"] as $data) {
            $res .= '<div class="detail_of_article">';
            
            $res .= '<h1>' . $data["titulek"] . '</h1>';
            $res .= '<h2>' . $data["uz_jmeno"] . '</h2>';

            if (!empty($data["obrazek"])) {
                $res .= '<img src="' . $data["obrazek"] .'">';
            }

            $res .= '<p id="detail_text">' . $data["text"] . '</p>';
        
            $res .= '<div class="detail_rating">';
            $res .= $templates->show_starts(intval($data["hodnoceni"]));
            $res .= '</div>';

            $res .= '</div>';
        }
    }
    
    echo $res;

    // Paticka stranky //
    $templates->getFooter();
?>