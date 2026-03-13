<?php
$db = new mysqli('localhost', 'root', '', 'portfolio_ci3');
$res = $db->query("SHOW COLUMNS FROM testimonials");
while($row = $res->fetch_assoc()) {
    echo $row['Field'] . "\n";
}
