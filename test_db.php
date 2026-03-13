<?php
$db = new PDO('mysql:host=localhost;dbname=portfolio', 'root', '');
$stmt = $db->query('DESCRIBE about');
$cols = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($cols as $c) {
    echo $c['Field'] . " - " . $c['Type'] . "\n";
}
