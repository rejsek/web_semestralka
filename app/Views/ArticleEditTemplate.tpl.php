<?php
    global $tplData;

    require_once(DIRECTORY_VIEWS . "/Templates.class.php");
    $templates = new Templates();
?>

<?php
    function showRole1() {
        $res = '<div class="submit_button">';
        $res .= '<button type="submit" name="action" value="update" class="btn btn-success btn-lg" tabindex="4">Upravit článek</button>';
        $res .= '<button id="delete_button" type="submit" name="action" value="delete" class="btn btn-danger btn-lg" tabindex="3">Smazat článek</button>';

        echo $res;
    }

    function showRole2($rating) {
        $res = '<div class="col-auto">
                <label for="quantity">Hodnocení zadávejte mezi 1 až 5:</label>
                <input type="number" value="' . $rating . '" id="quantity" name="rating" min="1" max="5">
                </div>
                <div class="submit_button">';
        
        $res .= '<button type="submit" name="action" value="publish" class="btn btn-primary btn-lg" tabindex="4">Publikovat článek</button>';
        $res .= '<button type="submit" name="action" value="unpublish" class="btn btn-primary btn-lg" tabindex="4">Zrušit publikování článku</button>';

        echo $res;
    }

    function showRole3($rating) {        
        $res = '<div class="col-auto">
                <label for="quantity">Hodnocení zadávejte mezi 1 až 5:</label>
                <input type="number" value="' . $rating . '" id="quantity" name="rating" min="1" max="5">
                </div>
                <div class="submit_button">';
        
        $res .= '<button type="submit" name="action" value="update" class="btn btn-success btn-lg" tabindex="4">Upravit článek</button>';
        $res .= '<button type="submit" name="action" value="publish" class="btn btn-primary btn-lg" tabindex="4">Publikovat článek</button>';
        $res .= '<button type="submit" name="action" value="unpublish" class="btn btn-primary btn-lg" tabindex="4">Zrušit publikování článku</button>';
        $res .= '<button id="delete_button" type="submit" name="action" value="delete" class="btn btn-danger btn-lg" tabindex="3">Smazat článek</button>';

        echo $res;
    }

    // Hlavnicka stranky //
    $templates->getHeader($tplData['title']);

    // Obsah stranky //
    if(array_key_exists("article_detail", $tplData)) {
        foreach($tplData["article_detail"] as $data) {
            $rating = $data['hodnoceni'];
        }
    }
    require_once(DIRECTORY_VIEWS . "/article_edit_form.html");

    if(!empty($_SESSION['login_user'])) {

        switch($_SESSION['login_role']) {
            case 1:
                showRole1();
                
                break;

            case 2:
                showRole2($rating);
                
                break;

            case 3:
                showRole3($rating);
                
                break;
        }
    }

    echo '</div></form></div>';

    // Paticka stranky //
    $templates->getFooter();
?>