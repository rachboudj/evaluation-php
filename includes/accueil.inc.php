<h1>Accueil</h1>

<?php 

$sql = "SELECT * FROM articles WHERE status = 'publish' ORDER BY created_at LIMIT 10";
$query = pdo()->prepare($sql);
$query->execute();
$articles = $query->fetchAll();

?>


