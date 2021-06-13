<?php $auth = 0; 
    include 'lib/includes.php'; 
    include 'template/header.php'; 


    if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['mail'])) {
        if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['nom']) && !empty($_POST['prenom'])  && !empty($_POST['mail'] )) {
            $username = $_POST['username'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $mail = $_POST['mail'];
            $password = sha1($_POST['password']);
            $reponse = $db->query('SELECT * FROM comptes');
            while ($donnees = $reponse->fetch()) {
                if ($donnees['username'] == $username) {
                    setFlash('Le login est déjà utilisé !', 'danger');
                    header ('Location:'.WEBROOT.'inscription.php');
                    die();
                }elseif ($donnees['mail'] == $mail) {
                    setFlash("L'e-mail est déjà utilisé !", 'danger');
                    header ('Location:'.WEBROOT.'inscription.php');
                    die();
                }else {
                    $test = true;
                }
            }
            $reponse->closeCursor();
            if ($test == true) 
            {
                $req = $db->prepare('INSERT INTO comptes(username, password, nom, prenom, mail) VALUES(:login, :mdp, :nom, :prenom, :mail)');
                $req->execute(array(
                    'login'     => $username,
                    'mdp'       => $password,
                    'nom'       => $nom,
                    'prenom'    => $prenom,
                    'mail'    => $mail
                    ));
                $_SESSION['Auth']['username'] = $username;
                $_SESSION['Auth']['password'] = $password;
                $_SESSION['Auth']['nom'] = $nom;
                $_SESSION['Auth']['prenom'] = $prenom;
                $_SESSION['Auth']['mail'] = $mail;

                setFlash('Le compte a bien été ajouté !');
                header ('Location:'.WEBROOT.'index.php'); 
                die();
            }
        }
    }
?>

<form action="#" method="post" class="fond">
    <div class="form-group">
        <label for="nom">Nom</label>
        <?= input('nom'); ?>
    </div>
    <div class="form-group">
        <label for="prenom">Prénom</label>
        <?= input('prenom'); ?>
    </div>
    <div class="form-group">
        <label for="username">Nom d'utilisation</label>
        <?= input('username'); ?>
    </div>
    <div class="form-group">
        <label for="password">Mot de passe</label>
        <input type="password" name="password" class="form-control" id="password">
    </div>
    <div class="form-group">
        <label for="mail">Mail</label>
        <?= inputSpe('mail', 'email'); ?>
    </div>
    <button type="submit" class="btn btn-default">Se connecter</button>
</form>

<?php include 'template/footer.php'; ?>