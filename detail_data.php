<?php
    $articleId = $_GET['id'];   //id rozkliknuteho clanku

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM clanky WHERE id_clanku=" . $articleId;
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo '<div class="detail_of_article">';

            echo '<h1>' . $row["titulek"] . '</h1>';
            echo '<h2>' . $row["autor"] . '</h2>';
            echo '<p id="detail_text">' . $row["text"] . '</p>';
            
            echo '<div class="detail_rating">';
            echo show_starts(intval($row["hodnoceni"]));
            echo '</div>';

            echo '</div>';
        }
    } else {
        echo "0 results";
    }

    $conn->close();

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