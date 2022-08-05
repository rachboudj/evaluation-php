<?php
$errors = array();
if(!empty($_GET['usersId']) && is_numeric($_GET['usersId'])) {
    $id = $_GET['usersId'];
    $sql = "SELECT * FROM utilisateurs WHERE id_utilisateur = :id_utilisateur";
    $query = $pdo=pdo()->prepare($sql);
    $query->bindValue(':id_utilisateur',$id, PDO::PARAM_INT);
    $query->execute();
    $utilisateur = $query->fetch();
    if (empty($utilisateur)) {
        // die();
    }

    if (!empty($_POST['submitted'])) 
    {
        $nom = trim(strip_tags($_POST['nom']));
        $prenom = trim(strip_tags($_POST['prenom']));
        $email = trim(strip_tags($_POST['email']));
        $mdp = trim(strip_tags($_POST['mdp']));
        $role = trim(strip_tags($_POST['role']));

        $errors = validationTexte($errors,$nom,'nom',3,100);
        $errors = validationTexte($errors,$prenom,'prenom',10,1000);
        $errors = validationTexte($errors,$email,'email',3,100);
        $errors = validationTexte($errors,$mdp,'mdp',3,100);
        $errors = validationTexte($errors,$role,'role',3,100);

        if(count($errors) === 0) 
        {
            $sql = "UPDATE utilisateurs SET nom= :nom, prenom= :prenom, email= :email, mdp= :mdp, role= :role WHERE id_utilisateur= :id_utilisateur";
            $query = $pdo=pdo()->prepare($sql);
            $query->bindValue(':nom',$titre, PDO::PARAM_STR);
            $query->bindValue(':prenom',$description, PDO::PARAM_STR);
            $query->bindValue(':email',$auteur, PDO::PARAM_STR);
            $query->bindValue(':mdp',$status, PDO::PARAM_STR);
            $query->bindValue(':role',$role, PDO::PARAM_STR);
            $query->bindValue(':id_article',$id, PDO::PARAM_INT);
            $query->execute();
            echo "<script>window.location.replace('http://localhost:8886/evaluation-php-rachid/index.php?page=utilisateur')</script>";
        }
    }
} else {
    // die();
}
?>