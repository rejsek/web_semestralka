<?php
    function output($data) {
        // hlavicka tabulky
        $text= "<table border><tr><td>key</td><td>value</td></tr>";
        // obsah tabulky
        foreach($data as $key => $value){
            if ($key == "passwd") {
                $value = password_hash($value, PASSWORD_DEFAULT);
            }

            $text .= "<tr><td>".$key."</td><td>";
            // bud jen vypis nebo rekurze
            $text .= (is_array($value)) ? vypis($value) : $value;
            $text .= "</td></tr>";
        }
        // ukonceni tabulky
        $text.= "</table>";
        return $text;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data predana formularem</title>
</head>
<body>
    <?php
        echo output($_POST);
    ?>
</body>
</html>