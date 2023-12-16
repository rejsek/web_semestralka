<?php
    global $tplData;

    require_once(DIRECTORY_VIEWS . "/Templates.class.php");
    $templates = new Templates();
?>

<?php
    // Hlavicka stranky //
    $templates->getHeader($tplData['title']);

    $res = "<div class='administration'>";
    $res .= "<h1>Správa článků</h1>";
    $res .= "<table class='table table-hover table-bordered'>";

    $res .= "<thead>
                <tr>
                <th scope='col'></th>
                <th scope='col'>Název článku</th>
                <th scope='col'>Autor</th>
                <th scope='col'>Hodnocení</th>
                <th scope='col'>Publikovat</th>
                </tr>
            </thead>";    
    
    if(array_key_exists('articles', $tplData)) {
        foreach($tplData['articles'] as $article) {
            $res .= "<tbody><tr>";
            
            $res .= "<th scope='row'><li class='fa fa-file'></li></th>";

            $res .= "<th scope='row'>";
            $res .= '<a href="index.php?page=detail_clanku&id=' . $article["id_clanku"] .'">' . $article['titulek'] . '</a>';
            $res .= "</th>";

            $res .= "<th scope='row'>" . $article['autor'] . "</th>";

            $res .= '<th scope="row"><output id="rating_output" for="lb_rating">1</output><input type="range" min="1" max="5" value="1" class="slider" id="lb_rating" oninput="rating_output.value = parseInt(lb_rating.value);"></th>';

            $res .= '<th scope="row"><input type="checkbox" id="check" name="check" value="1"></th>';
            
            $res .= "</tr></tbody>";
        }
    }

    $res .= "</table>";
    $res .= "</div>";

    echo $res;

    // Paticka stranky //
    $templates->getFooter();
?>