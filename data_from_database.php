<?php
    echo '<div class="grid_div">';

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM clanky";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo '<a href=#>';
            echo '<div class=grid_item>';
            echo '<h2>' . $row["titulek"] . '</h2>';
            echo '<p id="content_of_article">' . substr($row["text"], 0, 200) . '...</p>';
            
            echo '<div class="footer_of_article">';
            
            echo '<div class="rating_of_article">';

            show_starts(intval($row["hodnoceni"]));
            
            echo '</div>';

            echo '<p id="autor_of_article">' . '<i class="fa fa-user"></i> : ' . $row["autor"] . '</p>';

            echo '</div>';

            echo '</div>';
            echo '</a>';
        }
    } else {
        echo "0 results";
    }

    $conn->close();

    echo '</div>';

    function show_starts($rating) {
        /**
         * Metoda slouzi pro vykresleni hodnoceni v podobe hvezdicek
        */
        
        $other = 5 - $rating;

        for($i = 0; $i < 5; $i++) {
            if ($rating > 0) {
                echo '<span class="fa fa-star checked"></span>';
                $rating = $rating - 1;
            }

            if ($other > 0 and $rating == 0) {
                echo '<span class="fa fa-star"></span>';
                $other = $other - 1;
            }
        }
    }
?>