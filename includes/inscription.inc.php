<?php 

if (isset($_POST['inscription'])) {
    $nom = isset($_POST['nom']) ? htmlentities(trim($_POST['nom'])) : "";
    $prenom = isset($_POST['prenom']) ? htmlentities(trim($_POST['prenom'])) : "";
    $email = isset($_POST['email']) ? htmlentities(trim($_POST['email'])) : "";
    $mdp1 = isset($_POST['mdp1']) ? htmlentities(trim($_POST['mdp1'])) :  "";
    $mdp2 = isset($_POST['mdp2']) ? htmlentities(trim($_POST['mdp2'])) :  "";
    $cgu = isset($_POST['cgu']) ? $_POST['cgu'] :  "";


    $erreurs = array();

    if (mb_strlen($nom) === 0)
        array_push($erreurs, "Veuillez saisir votre nom");

    if (mb_strlen($prenom) === 0)
        array_push($erreurs, "Veuillez saisir votre prénom");

    if (mb_strlen($email) === 0)
        array_push($erreurs, "Veuillez saisir une adresse mail");

    elseif (!(filter_var($email, FILTER_VALIDATE_EMAIL)))
        array_push($erreurs, "Veuillez saisir une adresse mail conforme");

    if (mb_strlen($mdp1) === 0 || mb_strlen($mdp2) === 0)
        array_push($erreurs, "Veuillez saisis deux fois votre mot de passe");

    elseif ($mdp1 !== $mdp2)
        array_push($erreurs, "Vos mots de passe ne sont pas identiques");

    if (empty($_POST['cgu']))
        array_push($erreurs,  "Vous n'êtes pas d'accord avec les conditions de service");

    if (count($erreurs) > 0) {
        $messageErreurs = "<ul>";

        for ($i = 0; $i < count($erreurs); $i++) {
            $messageErreurs .= "<li>";
            $messageErreurs .= $erreurs[$i];
            $messageErreurs .= "</li>";
        }

        $messageErreurs .= "</ul>";

        echo $messageErreurs;

        require_once './includes/inscription.inc.php';
    } else {
        if (verifierUtilisateur($email)) {
            echo "Vous êtes déjà inscrit";
        } else {
            if (inscrireUtilisateur($nom, $prenom, $email, $mdp1))
                $message = "Vous avez été inscrit avec succés !";
            else
                $message = "Erreur";

            echo $message;

            echo "<script>window.location.replace('http://localhost:8886/evaluation-php-rachid?index.php=accueil')</script>";
        }
    }
} else {
    $nom = $prenom = $email = $cgu = "";
    require_once './includes/inscription.inc.php';
}

?>

<h1>Inscription</h1>

<form action="index.php?page=inscription" method="post">
    <div>
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" value="<?=$nom?>" />
    </div>
    <div>
        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" value="<?=$prenom?>" />
    </div>
    <div>
        <label for="email">E-mail :</label>
        <input type="text" id="email" name="email" value="<?=$email?>" />
    </div>
    <div>
        <label for="mdp1">Mot de passe :</label>
        <input type="password" id="mdp1" name="mdp1" />
    </div>
    <div>
        <label for="mdp2">Vérification mot de passe :</label>
        <input type="password" id="mdp2" name="mdp2" />
    </div>
    <div>
        <input type="checkbox" name="cgu" id="cgu" value="1"<?=isset($_POST['cgu'])?"checked":'';?> /><label for="cgu" >J'accepte les <a href="index.php?page=cgu" target="_blank">Conditions Générales d'Utilisation</a></label>
    </div>
    <div>
        <input type="reset" value="Effacer" />
        <input type="submit" value="Envoyer" />
    </div>
    <input type="hidden" name="inscription" />
</form>
