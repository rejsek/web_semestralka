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

    switch($_SESSION['login_role']) {
        case 1:
            $res .= "<thead>
                        <tr>
                        <th scope='col'></th>
                        <th scope='col'>Název článku</th>
                        <th scope='col'>Recenzent</th>
                        <th scope='col'>Hodnocení</th>
                        <th scope='col'>Editovat</th>
                        </tr>
                    </thead>";
                    
            break;

        case 2:
            $res .= "<thead>
                        <tr>
                        <th scope='col'></th>
                        <th scope='col'>Název článku</th>
                        <th scope='col'>Autor</th>
                        <th scope='col'>Hodnocení</th>
                        <th scope='col'>Editovat</th>
                        </tr>
                    </thead>";

            break;

        case 3:
            $res .= "<thead>
                        <tr>
                        <th scope='col'></th>
                        <th scope='col'>Název článku</th>
                        <th scope='col'>Autor</th>
                        <th scope='col'>Hodnocení</th>
                        <th scope='col'>Recenzent</th>
                        <th scope='col'>Editovat</th>
                        </tr>
                    </thead>";
        
            break;
    }
    
    if(array_key_exists('articles', $tplData)) {
        foreach($tplData['articles'] as $article) {
            $res .= "<tbody><tr>";
            
            $res .= "<th scope='row'><li class='fa fa-file'></li></th>";

            $res .= "<th scope='row'>";
            $res .= '<a href="index.php?page=detail_clanku&id=' . $article["id_clanku"] .'">' . $article['titulek'] . '</a>';
            $res .= "</th>";

            switch($_SESSION['login_role']) {
                case 1:
                    if(!empty($article['recenzent'])) {
                        $res .= "<th scope='row'>" . $article['recenzent'] . "</th>";
                    } else {
                        $res .= "<th scope='row'>-není recenzován-</th>";
                    }

                    break;

                case 2:
                case 3:
                    $res .= "<th scope='row'>" . $article['autor'] . "</th>";

                    break;
            }

            $res .= "<th scope='row'>" . $templates->show_starts(intval($article["hodnoceni"])) . "</th>";

            if($_SESSION['login_role'] == 3) {
                if(!empty($article['recenzent'])) {
                    $res .= "<th scope='row'>" . $article['recenzent'] . "</th>";
                } else {
                    $res .= "<th scope='row'>-není recenzován-</th>";
                }
            }

            $res .= "<th scope='row'>";
            $res .= '<a id="edit_icon" href="index.php?page=editace_clanku&id=' . $article["id_clanku"] . '">';
            $res .= "<li class='fa fa-edit'></li></th>";

            $res .= "</tr></tbody>";
        }
    }

    $res .= "</table>";
    $res .= "</div>";

    echo $res;

    // Paticka stranky //
    $templates->getFooter();
?>