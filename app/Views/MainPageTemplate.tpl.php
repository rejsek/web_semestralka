<?php
    global $tplData;

    require_once(DIRECTORY_VIEWS . "/Templates.class.php");
    $templates = new Templates();
?>

<?php
    
    // Hlavnicka stranky //
    $templates->getHeader($tplData['title']);

    $res = "";
    $res .= '<div class="grid_div">';

    require_once(DIRECTORY_VIEWS . "/main_page.html");

    if(array_key_exists("articles", $tplData)) {
        foreach($tplData["articles"] as $data) {
            $res .= '<a href="index.php?page=detail_clanku&id=' . $data["id_clanku"] . '">';
            $res .= "<div class=grid_item>";
            
            if (!empty($data["obrazek"])) {
                $res .= '<img src="data:image/jpeg;base64,' . base64_encode($data["obrazek"]) . '">'; // Zde přidáme obrázek, pokud existuje
            }

            $res .= "<h2>$data[titulek]</h2>";
            $res .= '<p id="content_of_article">' . substr($data["text"], 0, 150) . '...</p>';

            $res .= '<div class="footer_of_article">';
                
            $res .= '<p id="rating_of_article">';

            $res .= $templates->show_starts(intval($data["hodnoceni"]));
            
            $res .= '</p>';

            $res .= '<p id="autor_of_article">' . '<i class="fa fa-user"></i> : ' . $data["autor"] . '</p>';

            $res .= '</div>';

            $res .= '</div>';
            $res .= '</a>';
        }
    } else {
        $res .= "<h2>Clanky nenalezeny</h2>";
    }
    
    $res .= "</div>";
    echo $res;

    // Paticka stranky //
    $templates->getFooter();
?>