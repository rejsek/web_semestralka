<?php
    global $tplData;

    require_once(DIRECTORY_VIEWS . "/Templates.class.php");
    $templates = new Templates();
?>

<?php
    // Hlavicka stranky //
    $templates->getHeader($tplData['title']);

    $res = "<div class='administration'>";
    $res .= "<h1>Správa uživatelů</h1>";
    $res .= "<table class='table table-hover table-bordered'>";

    $res .= "<thead>
                <tr>
                <th scope='col'></th>
                <th scope='col'>Uživatelské jméno</th>
                <th scope='col'>Email</th>
                <th scope='col'>Role</th>
                <th scope='col'>Editovat</th>
                </tr>
            </thead>";    
    
    if(array_key_exists('users', $tplData)) {
        foreach($tplData['users'] as $user) {
            $res .= "<tbody><tr>";
            
            if($user['role'] == 1) {
                $res .= "<th scope='row'><li class='fa fa-male'></li></th>";
            } else {
                $res .= "<th scope='row'><li class='fa fa-comment'></li></th>";
            }

            $res .= "<th scope='row'>" . $user['uz_jmeno'] . "</th>";
            $res .= "<th scope='row'>" . $user['email'] . "</th>";
            $res .= "<th scope='row'>" . $user['role'] . "</th>";
            $res .= "<th scope='row'>";
            $res .= '<a id="edit_icon" href="index.php?page=editace_uzivatele&name=' . $user["uz_jmeno"] . '">';
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