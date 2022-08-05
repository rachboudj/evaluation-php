<h1>Les utilisateurs</h1>

<?php 

$sql = "SELECT * FROM utilisateurs ORDER BY created_at DESC";
$query = pdo()->prepare($sql);
$query->execute();
$utilisateurs = $query->fetchAll();

?>