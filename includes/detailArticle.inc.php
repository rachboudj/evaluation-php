<h1>Détails de l'article</h1>
<?php 

if(!empty($_GET['id']) && is_numeric($_GET['id'])) 
{
    $id = $_GET['id'];
    $sql = "SELECT * FROM articles WHERE id_article = :id_article";
    $query = $pdo=pdo()->prepare($sql);
    $query->bindValue(':id_article',$id, PDO::PARAM_INT);
    $query->execute();
    $article = $query->fetch();
    if(empty($article)) {
        die('Erreur 404');
    }
} else {
    die('Erreur 404');
}

$sql = "SELECT * FROM commentaires WHERE id_article = :id_article";
$query = $pdo=pdo()->prepare($sql);
$query->bindValue(':id_article',$id,PDO::PARAM_INT);
$query->execute();
$commentaires = $query->fetchAll();

$errors = [];
if(!empty($_POST['submitted'])) {
    $auteur = trim(strip_tags($_POST['auteur']));
    $description = trim(strip_tags($_POST['description']));
    $errors = validationTexte($errors,$auteur,'auteur',3, 40);
    $errors = validationTexte($errors,$description,'description',3,2000);
    if(count($errors) == 0) {
        $sql = "INSERT INTO commentaires (id_article,description, auteur, created_at,modified_at,status)
            VALUES (:id_article,:description,:auteur,NOW(),NOW(),'new')";
        $query = $pdo=pdo()->prepare($sql);
        $query->bindValue(':auteur',$auteur,PDO::PARAM_STR);
        $query->bindValue(':description',$description,PDO::PARAM_STR);
        $query->bindValue(':id_article',$id,PDO::PARAM_INT);
        $query->execute();
        // exit();
    }
}

?>

<div class="container">
    <h2><?php echo ucfirst($article['titre']); ?></h2>
    <p><?php echo nl2br($article['description']); ?></p>
    <p>Date: <?php echo date('d/m/Y à H:i:s', strtotime($article['created_at'])); ?></p>

    <h2>Ajouter un commentaire</h2>
    <form action="" method="post">
        <label for="auteur">Auteur *</label>
        <input type="text" id="auteur" name="auteur" value="<?= getValue('auteur'); ?>">
        <span class="error"><?php if (!empty($errors['auteur'])) {echo $errors['auteur'];} ?></span>

        <label for="description">Commentaire *</label>
        <textarea name="description"><?= getValue('description'); ?></textarea>
        <span class="error"><?php if (!empty($errors['description'])) {echo $errors['description'];} ?></span>

        <input type="submit" name="submitted" value="Ajouter">
    </form>

    <?php if(!empty($commentaires)) { ?>
        <h2>Les commentaires</h2>
        <?php foreach ($commentaires as $commentaire) { ?>
            <div class="commentaires">
                <p>Auteur : <?= $commentaire['auteur']?></p>
                <p>Content : <?= $commentaire['description']?></p>
            </div>
        <?php } ?>
    <?php } ?>
</div>