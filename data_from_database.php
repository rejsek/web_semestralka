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
            echo '<div class=grid_item>';
            echo '<h2>' . $row["titulek"] . '</h2>';
            echo '<p>' . $row["autor"] . '</p>';
            echo '</div>';
        }
    } else {
        echo "0 results";
    }

    $conn->close();

    echo '</div>';
?>