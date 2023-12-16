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
            if(!empty($_SESSION['login_role']) and $_SESSION['login_role'] > 1) {
                $res .= '<button type="button" class="btn btn-danger">Smazat článek</button>';
            }

            $res .= '<div class="detail_of_article">';
            
            $res .= '<h1>' . $data["titulek"] . '</h1>';
            $res .= '<h2>' . $data["autor"] . '</h2>';

            if (!empty($data["obrazek"])) {
                $res .= '<img src="data:image/jpeg;base64,' . base64_encode($data["obrazek"]) . '">'; // Zde přidáme obrázek, pokud existuje
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