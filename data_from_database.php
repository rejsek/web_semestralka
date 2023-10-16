<?php
    define("servername", "localhost");
    define("username", "root");
    define("password", "");
    define("dbname", "test");

    function connection() {
        $conn = new mysqli(servername, username, password, dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        return $conn;
    }
    
    function show_articles() {
        /**
         * Vypise z databaze obsah clanku
         */

        echo '<div class="grid_div">';

        $conn = connection();

        $sql = "SELECT * FROM clanky";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<a href="detail.php?id=' . $row["id_clanku"] . '">';
                echo '<div class=grid_item>';
                
                if (!empty($row["obrazek"])) {
                    echo '<img src="data:image/jpeg;base64,' . base64_encode($row["obrazek"]) . '">'; // Zde přidáme obrázek, pokud existuje
                }

                echo '<h2>' . $row["titulek"] . '</h2>';

                echo '<p id="content_of_article">' . substr($row["text"], 0, 150) . '...</p>';
                
                echo '<div class="footer_of_article">';
                
                echo '<p id="rating_of_article">';

                show_starts(intval($row["hodnoceni"]));
                
                echo '</p>';

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
    }

    function show_detail_of_article() {
        /**
         * Zobrazi detail clanku
         */

        $articleId = $_GET['id'];   //id rozkliknuteho clanku

        $conn = connection();
    
        $sql = "SELECT * FROM clanky WHERE id_clanku=" . $articleId;
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="detail_of_article">';
                echo '<h1>' . $row["titulek"] . '</h1>';
                echo '<h2>' . $row["autor"] . '</h2>';
        
                if (!empty($row["obrazek"])) {
                    echo '<img src="data:image/jpeg;base64,' . base64_encode($row["obrazek"]) . '">'; // Zde přidáme obrázek, pokud existuje
                }
        
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
    }   

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