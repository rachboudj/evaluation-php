<h1>Ajouter un article</h1>

<?php
$errors = array();
if(!empty($_POST['frmNewArticle'])) {
    $titre = trim(strip_tags($_POST['titre']));
    $description = trim(strip_tags($_POST['description']));
    $auteur = trim(strip_tags($_POST['auteur']));
    $status = trim(strip_tags($_POST['status']));

    $errors = validationTexte($errors,$titre,'titre',2,100);
    $errors = validationTexte($errors,$description,'description',10,1000);
    $errors = validationTexte($errors,$auteur,'auteur',2,100);
    $errors = validationTexte($errors,$status,'status',3,20);

    if(count($errors) === 0) {
        $requeteNewArticle = "INSERT INTO articles(titre,description,auteur,created_at,modified_at,status)VALUES (:titre,:description,:auteur,NOW(),NOW(),:status)";
        // die($requeteNewArticle);
        $query = pdo()->prepare($requeteNewArticle);
        $query->bindValue(':titre',$titre, PDO::PARAM_STR);
        $query->bindValue(':description',$description, PDO::PARAM_STR);
        $query->bindValue(':auteur',$auteur, PDO::PARAM_STR);
        $query->bindValue(':status',$status, PDO::PARAM_STR);
        $query->execute();
    }
}
?>

<form action="index.php?page=newArticle" method="post">
    <label for="titre">Titre</label>
    <input type="text" name="titre" id="titre" value="<?php if (!empty($_POST['titre'])) {echo $_POST['titre'];} ?>">
    <span class="error"><?php if (!empty($errors['titre'])) {echo $errors['titre'];} ?></span>

    <label for="description">Description</label>
    <textarea name="description" id="description" cols="30" rows="10"><?php if (!empty($_POST['description'])) {echo $_POST['description'];} ?></textarea>
    <span class="error"><?php if (!empty($errors['description'])) {echo $errors['description'];} ?></span>

    <label for="auteur">Auteur</label>
    <input type="text" name="auteur" id="auteur" value="<?php if (!empty($_POST['auteur'])) {echo $_POST['auteur'];} ?>">
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
                }
                ?>
                <option value="<?php echo $key; ?>"<?php echo $selected; ?>><?php echo $value; ?></option>
            <?php } ?>
        </select>
    <span class="error"><?php if (!empty($errors['status'])) {echo $errors['status'];} ?></span>

    <input type="submit" name="frmNewArticle" value="Ajouter un article">
</form>