<?php

if (isset($_GET['q'])) {
    $query = htmlspecialchars($_GET['q']);
    echo "<h1>Search Results for: $query</h1>";
} else {
    echo "<h1>No search term provided.</h1>";
}
?>
