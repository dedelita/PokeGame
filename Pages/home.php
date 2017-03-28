<?php
if (isset($_SESSION["dresseur"])) {
    header("Location:index.php?page=pokemon");
} else {
    echo "<br>";
}