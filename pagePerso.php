<?php
$auth = 0;
  include 'lib/image.php';
  include 'lib/includes.php';

  include 'template/header.php';
  if (isset($_POST['mail'])) {
    $mail = $db->quote($_POST['mail']);
    $id = $db->quote($_SESSION['Auth']['username']);
    $db->query("update comptes set mail=$mail where username=$id");
    $_SESSION['Auth']['mail'] = $_POST['mail'];
    setFlash('Votre mail à bien été modifié');
    header('Location:'.WEBROOT.'pagePerso.php');
    die();
  }

?>

<div class="starter-template">
  <div class="container fond">
    <h1>Bienvenue <?= $_SESSION['Auth']['prenom'] . ' ' . $_SESSION['Auth']['nom']; ?></h1>
  </div>
</div>

<div class="fond">
  <h2>Informations personnelles</h2>
  <?php if (empty($_SESSION['Auth']['mail'])): ?>
    <h4>Vous n'avez pas encore d'adresse e-mail d'enregistrée</h4>
    <form action="" method="post">
      <div class="form-group">
        <label for="mail">Ajouter un e-mail</label>
        <?= inputSpe('mail', 'email') ?>
      </div>
      <button type="submit" class="btn btn-success">Ajouter</button>
    </form>
  <?php else: ?>
    <h4>Votre adresse e-mail actuelle est : <?= $_SESSION['Auth']['mail']; ?></h4>
    <form action="" method="post">
      <div class="form-group">
        <label for="mail">Modifier votre e-mail</label>
        <?= inputSpe('mail', 'email') ?>
      </div>
      <button type="submit" class="btn btn-success">Modifier</button>
    </form>    
  <?php endif ?>
  
</div>

    
<?php require_once 'template/footer.php'; ?>

