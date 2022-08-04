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

    <input type="submit" value="Ajouter un article">
    <input type="hidden" name="frmNewArticle">
</form>