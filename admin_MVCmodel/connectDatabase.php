<?php
//echo sprintf('mysql:host=%s;$dbname=%s',(servername,dbname));
// Create connection
try {
    $conn = new PDO('mysql:host=localhost;dbname=quanlibanhang_offical', username, password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
$conn->query("set charset utf8");

if (ERRMODE['release']) $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>