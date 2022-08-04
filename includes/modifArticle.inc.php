<?php
$errors = array();
if(!empty($_GET['articleId']) && is_numeric($_GET['articleId'])) {
    $id = $_GET['articleId'];
    $sql = "SELECT * FROM articles WHERE id_article = :id_article";
    $query = $pdo=pdo()->prepare($sql);
    $query->bindValue(':id_article',$id, PDO::PARAM_INT);
    $query->execute();
    $article = $query->fetch();
    if (empty($article)) {
        // die();
    }

    if (!empty($_POST['submitted'])) 
    {
        $titre = trim(strip_tags($_POST['titre']));
        $description = trim(strip_tags($_POST['description']));
        $auteur = trim(strip_tags($_POST['auteur']));
        $status = trim(strip_tags($_POST['status']));

        $errors = validationTexte($errors,$titre,'titre',3,100);
        $errors = validationTexte($errors,$description,'description',10,1000);
        $errors = validationTexte($errors,$auteur,'auteur',3,100);
        $errors = validationTexte($errors,$status,'status',3,100);

        if(count($errors) === 0) 
        {
            $sql = "UPDATE articles SET titre= :titre, description= :description, auteur= :auteur, status= :status WHERE id_article= :id_article"; // requête de l'INSERT INTO
            $query = $pdo=pdo()->prepare($sql);
            $query->bindValue(':titre',$titre, PDO::PARAM_STR);
            $query->bindValue(':description',$description, PDO::PARAM_STR);
            $query->bindValue(':auteur',$auteur, PDO::PARAM_STR);
            $query->bindValue(':status',$status, PDO::PARAM_STR);
            $query->bindValue(':id_article',$id, PDO::PARAM_INT);
            $query->execute();
            echo "<script>window.location.replace('http://localhost:8886/evaluation-php-rachid/index.php?page=articlesAdmin')</script>";
        }
    }
} else {
    // die();
}
?>


<h1>Les articles</h1>
<form action="" method="post">
    <label for="titre">Titre</label>
    <input type="text" name="titre" id="titre" value="<?= getValue('titre', $article['titre']) ?>">
    <span class="error"><?php if (!empty($errors['titre'])) {echo $errors['titre'];} ?></span>

    <label for="description">Contenu</label>
    <textarea name="description" id="description" cols="30" rows="10"><?= getValue('description', $article['description']) ?></textarea>
    <span class="error"><?php if (!empty($errors['description'])) {echo $errors['description'];} ?></span>

    <label for="auteur">Auteur</label>
    <input type="text" name="auteur" id="auteur" value="<?= getValue('auteur', $article['auteur']) ?>">
    <span class="error"><?php if (!empty($errors['auteur'])) {echo $errors['auteur'];} ?></span>

    <label for="status">Status de l'article</label>

    <?php
        $status = array(
            'draft' => 'Brouillon',
            'publish' => 'Publié'
        );

        ?>


        <select name="status">
            <option value="">Choisir le status</option>
            <?php foreach ($status as $key => $value) {
                $selected = '';
                if(!empty($_POST['status'])) {
                    if($_POST['status'] == $key) {
                        $selected = ' selected="selected"';
                    }
                }elseif($article['status'] == $key) {
                    $selected = ' selected="selected"';
                }
                ?>
                <option value="<?php echo $key; ?>"<?php echo $selected; ?>><?php echo $value; ?></option>
            <?php } ?>
        </select>
        <span class="error"><?php if(!empty($errors['status'])) { echo $errors['status']; } ?></span>

    <input type="submit" name="submitted" value="Ajouter un article">
</form>