<h1>Tous les articles</h1>

<?php 

$sql = "SELECT * FROM articles WHERE status = 'publish' ORDER BY created_at DESC";
$query = pdo()->prepare($sql);
$query->execute();
$articles = $query->fetchAll();

?>